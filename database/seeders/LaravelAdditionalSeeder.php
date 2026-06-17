<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;

class LaravelAdditionalSeeder extends Seeder
{
    public function run(): void
    {
        $q = Question::create(['content'=>'Quel est le framework PHP dont Laravel est basé ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Symfony','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'CodeIgniter','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Zend','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Slim','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle commande crée un nouveau projet Laravel ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'composer create-project laravel/laravel','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'npm create laravel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php new laravel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'laravel new app','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel moteur de templates Laravel utilise par défaut ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Blade','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Twig','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Smarty','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mustache','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment lancer le serveur de développement Laravel ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan serve','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan start','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'npm run dev','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php -S localhost:8000','is_correct'=>false]);

        $q = Question::create(['content'=>'Où se trouve le fichier de configuration principal de Laravel ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'.env','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'config.php','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'settings.json','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'app.yaml','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle commande exécute les migrations de base de données ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan migrate','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan db:migrate','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan run:migrations','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan schema:run','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel ORM Laravel utilise-t-il par défaut ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Eloquent','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Doctrine','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Propel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'RedBeanPHP','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment accéder à une variable dans une vue Blade ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'{{ $variable }}','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'<% $variable %>','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'{% variable %}','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'{= $variable =}','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle commande crée un modèle Eloquent ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:model NomModele','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan create:model NomModele','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan new:model NomModele','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan generate:model NomModele','is_correct'=>false]);

        $q = Question::create(['content'=>'Où sont définis les routes web dans Laravel ?','category'=>'Laravel','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'routes/web.php','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'app/routes.php','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'config/routes.php','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'routes/main.php','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle méthode Eloquent retourne tous les enregistrements d\'une table ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Model::all()','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Model::get()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Model::fetch()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Model::find()','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment définir une relation hasMany dans Eloquent ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'return $this->hasMany(Modele::class);','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'return $this->manyTo(Modele::class);','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'return $this->belongsMany(Modele::class);','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'return $this->many(Modele::class);','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle commande crée un contrôleur avec toutes les méthodes CRUD ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:controller --resource','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:controller --crud','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:controller --all','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:controller --full','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel middleware protège les routes authentifiées dans Laravel ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'auth','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'authenticated','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'login','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'session','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment effectuer un rollback de migration ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan migrate:rollback','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan migrate:back','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan migrate:undo','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan rollback','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle méthode Eloquent filtre les résultats par une condition ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'where()','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'filter()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'search()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'find()','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment passer des données à une vue dans un contrôleur ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'return view(\'nom\', [\'cle\' => $valeur]);','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'return view(\'nom\')->send([\'cle\' => $valeur]);','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'return view(\'nom\')->attach([\'cle\' => $valeur]);','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'return render(\'nom\', [\'cle\' => $valeur]);','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel façade Laravel permet d\'envoyer des emails ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Mail','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Email','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mailer','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Send','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment créer une migration dans Laravel ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:migration nom_migration','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan new:migration nom_migration','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan create:migration nom_migration','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan db:make nom_migration','is_correct'=>false]);

        $q = Question::create(['content'=>'Que retourne la méthode findOrFail() si l\'enregistrement n\'existe pas ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Une exception ModelNotFoundException','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'null','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'false','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un tableau vide','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle commande vide le cache de configuration Laravel ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan config:clear','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan cache:clear','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan config:flush','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan clear:config','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel service de queue Laravel utilise-t-il par défaut dans .env ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'sync','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'redis','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'database','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'beanstalkd','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment définir une route nommée dans Laravel ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'->name(\'nom\')','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'->as(\'nom\')','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'->alias(\'nom\')','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'->label(\'nom\')','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle méthode Eloquent crée et sauvegarde en une seule ligne ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'create()','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'make()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'insert()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'store()','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment utiliser la pagination dans Eloquent ?','category'=>'Laravel','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'->paginate(15)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'->page(15)','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'->limit(15)','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'->split(15)','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel mécanisme Laravel utilise pour les événements et listeners ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Events et Listeners via EventServiceProvider','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Hooks et Actions','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Signals et Slots','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Observers seulement','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle commande génère un fichier de seeder ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:seeder NomSeeder','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan create:seeder NomSeeder','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan seed:make NomSeeder','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan make:seed NomSeeder','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle interface implémenter pour qu\'un Job puisse être mis en queue ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'ShouldQueue','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Queueable','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dispatchable','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'HasQueue','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment définir un scope local dans Eloquent ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'public function scopeNom($query) { ... }','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'public function filterNom($query) { ... }','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'public function whereNom($query) { ... }','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'public function localNom($query) { ... }','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel service provider enregistre les bindings du container IoC ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'AppServiceProvider','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'RouteServiceProvider','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'ContainerServiceProvider','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'BindingProvider','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment utiliser les transactions de base de données dans Laravel ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'DB::transaction(function() { ... })','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'DB::begin(function() { ... })','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'DB::atomic(function() { ... })','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'DB::wrap(function() { ... })','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle méthode permet de définir les données autorisées à la création en masse ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'$fillable','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'$allowed','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'$safe','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'$mass','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment accéder au container d\'injection de dépendances dans Laravel ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'app() ou App::make()','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'container() ou Container::get()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'inject() ou DI::resolve()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'resolve() seulement','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel trait permet l\'authentification sur un modèle Eloquent ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Authenticatable','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'HasAuth','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'CanLogin','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'IsUser','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle commande lance les seeders ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan db:seed','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan seed:run','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan run:seeders','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'php artisan seed','is_correct'=>false]);

        $q = Question::create(['content'=>'Que fait la méthode with() dans une requête Eloquent ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Eager loading des relations','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lazy loading des relations','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ajouter des conditions WHERE','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Charger les colonnes spécifiques','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment définir un accessor dans Eloquent ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'public function getNomAttribute($value) { ... }','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'public function accessNom($value) { ... }','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'public function getNom($value) { ... }','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'public function getAttr($nom) { ... }','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel fichier définit les policies d\'autorisation dans Laravel ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'AuthServiceProvider','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'PolicyProvider','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'GateProvider','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'PermissionProvider','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle méthode Eloquent charge les résultats et les transforme en collection ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'get()','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'collect()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'toCollection()','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'results()','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment définir la connexion DB dans le .env pour MySQL ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'DB_CONNECTION=mysql','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'DB_DRIVER=mysql','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'DB_TYPE=mysql','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'DATABASE=mysql','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel Helper Laravel génère une URL vers une route nommée ?','category'=>'Laravel','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'route(\'nom\')','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'url(\'nom\')','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'link(\'nom\')','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'path(\'nom\')','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie \'IA\' ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Technologies modernes','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Interface Automatique','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Intégration Avancée','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Information Algorithmique','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel géant tech a créé ChatGPT ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'OpenAI','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Google','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Meta','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Microsoft','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le Machine Learning ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Un sous-domaine de l\'IA où les machines apprennent à partir de données','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un langage de programmation','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un type de base de données','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un protocole réseau','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel modèle d\'IA est derrière Claude ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Anthropic','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'OpenAI','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Google DeepMind','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Meta AI','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce qu\'un réseau de neurones artificiel ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Un système inspiré du cerveau humain avec des noeuds interconnectés','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un réseau informatique sécurisé','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un algorithme de tri','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Une base de données graphique','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie GPT dans ChatGPT ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Generative Pre-trained Transformer','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'General Purpose Technology','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Global Processing Tool','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Guided Pattern Training','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel outil permet de créer des images avec l\'IA ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'DALL-E / Midjourney / Stable Diffusion','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Photoshop','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Figma','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Canva','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le Deep Learning ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'ML avec réseaux de neurones à plusieurs couches','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un type de cryptographie','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un protocole de communication','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Une méthode de compression','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie LLM ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Large Language Model','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Language Learning Machine','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Linear Logic Module','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lightweight Language Model','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel modèle Google rivalise avec GPT-4 ?','category'=>'Technologie','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Gemini','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bard','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'LaMDA','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'PaLM','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le Prompt Engineering ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'L\'art de formuler des instructions efficaces pour les LLMs','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La programmation de robots','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La conception de circuits électroniques','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le développement d\'interfaces','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le Fine-tuning d\'un modèle IA ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ré-entraîner un modèle pré-entraîné sur des données spécifiques','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Réduire la taille d\'un modèle','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Supprimer des couches du réseau','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Changer le langage de programmation','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle technique permet à un LLM de chercher des infos externes en temps réel ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'RAG (Retrieval-Augmented Generation)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Fine-tuning','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'RLHF','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Quantization','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie RLHF dans le contexte des LLMs ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Reinforcement Learning from Human Feedback','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Recursive Learning with High Frequency','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Rapid Language Handling Framework','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Real-time Learning from Human Files','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce qu\'un token dans le contexte des LLMs ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Une unité de texte (mot ou partie de mot)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un octet de données','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Une couche du réseau','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un paramètre du modèle','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel algorithme est à la base des LLMs modernes ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Transformer (Attention mechanism)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'RNN (Recurrent Neural Network)','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'CNN (Convolutional Neural Network)','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'GAN (Generative Adversarial Network)','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que la température dans un LLM ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Un paramètre qui contrôle la créativité/aléatoire des réponses','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La vitesse de traitement','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La taille du contexte','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le nombre de paramètres','is_correct'=>false]);

        $q = Question::create(['content'=>'Que fait un GAN (Generative Adversarial Network) ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Un générateur et un discriminateur s\'affrontent pour créer du contenu réaliste','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Il analyse des graphes de données','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Il trie des données par catégories','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Il compresse des fichiers','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le Transfer Learning ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Réutiliser un modèle pré-entraîné pour une nouvelle tâche','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Transférer des données entre serveurs','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Copier un modèle sur un autre appareil','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Migrer une IA vers un cloud','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel test évalue si une machine peut passer pour un humain ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Test de Turing','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Test de Lovelace','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Test de Shannon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Test de McCarthy','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le NLP (Natural Language Processing) ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le traitement automatique du langage naturel','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un protocole réseau','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un langage de programmation','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un format de données','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle bibliothèque Python est la plus populaire pour le Deep Learning ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'PyTorch / TensorFlow','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Django','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'NumPy','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pandas','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que la window context (fenêtre de contexte) d\'un LLM ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'La quantité de texte que le modèle peut traiter en une fois','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La résolution d\'affichage','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La mémoire RAM utilisée','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le nombre d\'utilisateurs simultanés','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui a inventé le concept de \'réseau de neurones artificiel\' dans les années 40 ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Warren McCulloch et Walter Pitts','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Alan Turing','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'John McCarthy','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Marvin Minsky','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie AGI ?','category'=>'Technologie','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Artificial General Intelligence','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Advanced Generative Intelligence','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Automated Graph Interface','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Algorithmic General Inference','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie l\'overfitting d\'un modèle IA ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le modèle mémorise les données d\'entraînement et généralise mal','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le modèle est trop lent','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le modèle manque de données','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le modèle a trop de couches','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que la quantization d\'un modèle IA ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Réduire la précision des poids pour diminuer la taille du modèle','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Augmenter le nombre de paramètres','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Entraîner sur des données quantitatives','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Diviser le modèle en plusieurs parties','is_correct'=>false]);

        $q = Question::create(['content'=>'Que fait le mécanisme d\'attention (Self-Attention) dans les Transformers ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Pondérer l\'importance de chaque token par rapport aux autres','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Filtrer les données d\'entraînement','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Choisir les hyperparamètres','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Compresser le texte en entrée','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que LoRA dans le contexte du Fine-tuning ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Low-Rank Adaptation - technique légère de fine-tuning','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Large Output Regularization Algorithm','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Linear Optimization for RAG Applications','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Loss Reduction Approach','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle métrique mesure la qualité de génération de texte par comparaison à une référence ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'BLEU score','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'F1 score','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'AUC-ROC','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'MAE','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que l\'embedding dans les LLMs ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Une représentation vectorielle dense du sens des mots/tokens','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'L\'intégration d\'une IA dans une application','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La compression du modèle','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le nom des couches intermédiaires','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie CoT (Chain of Thought) dans le prompting ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Inciter le modèle à raisonner étape par étape','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chaîner plusieurs modèles ensemble','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Utiliser plusieurs prompts en séquence','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Connecter l\'IA à des outils externes','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle architecture a remplacé les RNNs pour le NLP ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Transformer','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'CNN','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Autoencoder','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Perceptron','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui a publié le papier \'Attention is All You Need\' en 2017 ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Des chercheurs de Google Brain','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'OpenAI','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Meta FAIR','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'DeepMind','is_correct'=>false]);

        $q = Question::create(['content'=>'Que fait le dropout dans un réseau de neurones ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Désactiver aléatoirement des neurones pour éviter l\'overfitting','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Supprimer les données mal étiquetées','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Réduire le learning rate','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Arrêter l\'entraînement prématurément','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le BERT de Google ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Bidirectional Encoder Representations from Transformers','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Basic Encoder for Rapid Text','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Binary Evaluation of Recursive Trees','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Balanced Embedding Representation Technique','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle technique d\'entraînement utilise des paires de données positives/négatives ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Contrastive Learning','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Supervised Learning','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Reinforcement Learning','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Self-supervised Learning','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que la distillation de modèle ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Entraîner un petit modèle à imiter un grand modèle','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Purifier les données d\'entraînement','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Extraire les couches inutiles','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Réduire le vocabulaire du modèle','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel modèle open source de Meta est très utilisé pour le fine-tuning ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'LLaMA','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'GPT-J','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'BLOOM','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Falcon','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que le Vector Store dans une architecture RAG ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Une base de données qui stocke des embeddings pour la recherche sémantique','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un serveur de cache','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un format de fichier pour les LLMs','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Une couche du réseau de neurones','is_correct'=>false]);

        $q = Question::create(['content'=>'Que mesure la perplexité dans l\'évaluation d\'un LLM ?','category'=>'Technologie','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'À quel point le modèle est incertain/surpris par le texte de test','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La complexité du modèle','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le nombre de paramètres','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La vitesse de génération','is_correct'=>false]);
    }
}
