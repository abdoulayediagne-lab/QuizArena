# 📘 QuizArena — Documentation du projet

> Tout ce qu'il faut savoir sur le code et les fonctionnalités, en concis.

---

## 1. C'est quoi ?

**QuizArena** est un jeu de quiz multijoueur en temps réel. Deux joueurs s'affrontent sur 10 questions, le plus rapide et le plus précis gagne des pièces (coins) qu'il dépense dans une boutique de cosmétiques. Il existe aussi un mode solo, un classement et un historique.

## 2. La stack technique

| Couche | Technologie |
|--------|-------------|
| Backend | **Laravel 13** (PHP 8.3) |
| API / Auth | **Laravel Sanctum** (tokens, stockés côté front dans `localStorage`) |
| Temps réel | **Laravel Reverb** (WebSockets, protocole Pusher) + Laravel Echo |
| Frontend | **Blade + Tailwind (CDN) + JavaScript vanilla** (pas de Vue/React, pas de build JS) |
| Base de données | Migrations Eloquent (SQLite/MySQL) |
| Tâches asynchrones | **Queues** (job `AwardCoins`) |

Le front est entièrement contenu dans des fichiers `.blade.php` qui appellent l'API REST via `fetch` et écoutent les événements temps réel via Echo.

---

## 3. Architecture en bref

```
Navigateur (Blade + JS)
   │  fetch() ──────────────►  Routes API (auth Sanctum)
   │                              └─► Controllers ─► Models (Eloquent) ─► DB
   │  Echo (WebSocket) ◄──────  Events broadcastés via Reverb
```

Le flux d'une partie multijoueur : un joueur **crée une room** → l'autre **rejoint avec un code** → vote de **catégorie** → **questions diffusées** une à une en temps réel → calcul du score → **récompenses**.

---

## 4. Les modèles (base de données)

| Modèle | Rôle | Champs clés |
|--------|------|-------------|
| **User** | Joueur | `name`, `email`, `password`, `coins`, `avatar_base_id`, `avatar_image_path` |
| **Room** | Salon de jeu | `code` (6 car.), `host_id`, `guest_id`, `status` (waiting/playing/finished), `category`, `host_category`, `guest_category`, `is_speed`, `difficulty` |
| **Game** | Une partie | `room_id` (null si solo), `winner_id`, `coins_awarded`, `category`, `difficulty`, `is_solo`, `is_speed` |
| **GameRound** | Une manche (1 question) | `game_id`, `question_id`, `player1_answer_id`, `player2_answer_id`, `player1_time`, `player2_time` |
| **Question** | Question du quiz | `content`, `category` |
| **Answer** | Réponse possible | `question_id`, `content`, `is_correct` |
| **Item** | Objet de la boutique | `name`, `type` (avatar), `image_path`, `price`, `rarity`, `locked`, `unlock_condition` |
| **UserItem** | Objet possédé par un joueur | `user_id`, `item_id`, `equipped` |
| **AvatarBase** | Avatar de base | `name`, `image_path`, `is_class_character` |
| **Transaction** | Historique de pièces | `user_id`, `amount`, `type` (earn/spend), `reason` |

**Relations principales** : un `User` possède des `UserItem`, héberge/rejoint des `Room`, gagne des `Game`, a des `Transaction`. Une `Room` a un `Game` ; un `Game` a 10 `GameRound` ; un `GameRound` pointe vers une `Question` et ses `Answer`.

---

## 5. Les fonctionnalités

### 🔐 Authentification (Sanctum)
Inscription / connexion / déconnexion via token. Le token est renvoyé par l'API et stocké dans `localStorage` côté navigateur, puis envoyé dans chaque requête protégée (`auth:sanctum`).

### 👥 Mode multijoueur (1 contre 1)
1. **Créer une room** (`POST /rooms`) : génère un code unique de 6 caractères, statut `waiting`. Options : mode **Speed** et **difficulté**.
2. **Rejoindre** (`POST /rooms/join`) avec le code : le 2e joueur devient `guest`, statut → `playing`. Événements `PlayerJoinedRoom` + `RoomReady` diffusés.
3. **Vote de catégorie** (`POST /rooms/{room}/category`) : chaque joueur vote. Si les deux votes sont identiques → cette catégorie ; sinon → **Aléatoire**. Événement `CategoryVoted`.
4. **Démarrer la partie** (`POST /games/start/{room}`) : tire 10 questions selon catégorie + difficulté, crée les manches, diffuse la 1ère question (`QuestionBroadcasted`) et `GameStarted`.
5. **Répondre** (`POST /games/{game}/answer`) : enregistre la réponse + le temps. Quand les deux ont répondu (ou en mode Speed dès la 1ère bonne réponse), le score de la manche est calculé (`RoundResult`) et la question suivante est diffusée.
6. **Fin de partie** : calcul des scores, détermination du gagnant, attribution des pièces, statut `finished`, événement `GameFinished`.

### ⚡ Mode Speed
La manche se termine **dès qu'un joueur répond correctement** (l'autre est marqué « passé », temps = -1). Si les deux se trompent, on passe à la suite.

### 🎯 Difficultés et récompenses
Multiplicateur de pièces selon la difficulté : **facile ×1**, **normal ×2**, **difficile ×3**. Chaque bonne réponse rapporte (1 × multiplicateur) pièces ; le gagnant reçoit **+10** pièces bonus.

### 🧍 Mode solo
`POST /games/solo` : 10 questions, le joueur 2 est « neutralisé ». Réponses via `POST /games/{game}/answer-solo` qui renvoie immédiatement la bonne réponse. Les pièces sont créditées à l'affichage du résultat (score × multiplicateur de difficulté).

### 🛒 Boutique
`GET /shop/items` liste les objets triés par rareté (common → rare → epic → legendary), en marquant ceux déjà possédés. `POST /shop/buy/{item}` : vérifie que l'objet n'est pas verrouillé, que le joueur a assez de pièces et ne le possède pas déjà, débite les pièces, ajoute l'objet et crée une `Transaction`.

### 🎨 Avatars
`POST /avatar/select` choisit un avatar de base. `POST /avatar/upload` permet d'uploader une image personnalisée (jpeg/png/gif, max 2 Mo) ; l'ancienne est supprimée.

### 👤 Profil
`GET /profile` renvoie le joueur avec son avatar et ses objets. `PUT /profile` met à jour le pseudo, l'avatar et les **objets équipés** (un seul équipé à la fois par mise à jour).

### 🏆 Classement & historique
`GET /leaderboard` (public) classe les joueurs par nombre de victoires. `GET /games/history` liste les parties du joueur connecté avec scores et pièces gagnées.

---

## 6. Les événements temps réel (Reverb / Echo)

| Événement | Quand | Sert à |
|-----------|-------|--------|
| `PlayerJoinedRoom` | Un joueur rejoint | Prévenir l'hôte |
| `RoomReady` | Room pleine | Lancer la phase de vote |
| `CategoryVoted` | Un vote de catégorie | Mettre à jour l'UI du vote |
| `GameStarted` | Partie lancée | Rediriger vers l'écran de jeu |
| `QuestionBroadcasted` | Nouvelle question | Afficher la question + réponses |
| `RoundResult` | Manche terminée | Montrer qui a eu juste |
| `GameFinished` | Partie finie | Afficher le résultat final |

---

## 7. Les pages (vues Blade)

| Route | Vue | Rôle |
|-------|-----|------|
| `/` | `welcome` | Accueil, connexion/inscription, créer/rejoindre une room |
| `/lobby/{room}` | `lobby` | Salle d'attente + vote de catégorie |
| `/game/{game}` | `game` | Écran de jeu multijoueur (temps réel) |
| `/result/{game}` | `result` | Résultat d'une partie multijoueur |
| `/solo` | `solo` | Configuration d'une partie solo |
| `/solo/{game}` | `solo-game` | Jeu en solo |
| `/solo-result/{game}` | `solo-result` | Résultat solo |
| `/shop` | `shop` | Boutique |
| `/avatar` | `avatar` | Personnalisation d'avatar |
| `/leaderboard` | `leaderboard` | Classement |
| `/history` | `history` | Historique des parties |

---

## 8. Contenu (seeders)

Au démarrage, la base est remplie par des seeders : banque de questions, catégories, objets de boutique et avatars.

**Catégories de questions** : Animés, Coupe du Monde, Histoire de France, Jeux Vidéos, Sport (+ « Aléatoire » qui pioche dans tout). **Raretés d'objets** : common, rare, epic, legendary.

---

## 9. Lancer le projet

```bash
composer setup     # install + clé + migrations + assets
composer dev       # serveur + queue + logs + Vite en parallèle
```

Le mode `dev` lance simultanément le serveur PHP, l'écoute des queues (pour `AwardCoins`), les logs (Pail) et Vite. Reverb doit aussi tourner (`php artisan reverb:start`) pour le temps réel.

---

## 10. Points d'attention dans le code

- **Identité des joueurs** : « player1 » = hôte (`host`), « player2 » = invité (`guest`). À garder en tête partout dans `GameController`.
- **`player_time = -1`** signifie « manche passée » en mode Speed (utilisé pour marquer le perdant qui n'a pas eu le temps de répondre).
- **Attribution des pièces** : centralisée dans `finishGame()` (multi) et `show()` (solo) ; le job `AwardCoins` existe pour créditer de façon asynchrone via la queue.
- **Sécurité des actions** : chaque endpoint de jeu vérifie que l'utilisateur est bien hôte ou invité de la room avant d'accepter une réponse.
