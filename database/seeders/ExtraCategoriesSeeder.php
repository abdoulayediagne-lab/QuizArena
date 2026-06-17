<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;

class ExtraCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $q = Question::create(['content'=>'Quel est le nom de la chouette de Harry Potter ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Hedwige','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Choupi','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Alba','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luna','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quelle rue vit Harry Potter chez les Dursley ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Privet Drive','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Baker Street','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Diagon Alley','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Knockturn Alley','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le prénom du professeur Dumbledore ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Albus','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Godric','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Merlin','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Cornelius','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle le rat de Ron Weasley ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Croûtard','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pattenrond','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nagini','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Norbert','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel train emmène les élèves à Poudlard ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Poudlard Express','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Magie Express','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sorcier Express','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Hogwarts Rail','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel bâtiment est la bibliothèque des sorciers dans Diagon Alley ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Gringotts','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ollivanders','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pré-au-Lard','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Flourish & Blotts','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle est la couleur des cheveux de Drago Malfoy ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Blond','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Brun','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Noir','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Roux','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle maison est connue pour sa loyauté et son travail ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Poufsouffle','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gryffondor','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Serdaigle','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Serpentard','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le surnom de Sirius Black chez les Maraudeurs ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Patmol','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Moony','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Cornedrue','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Queudver','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel objet permet de voyager dans le temps dans HP ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Retourneur de Temps','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Miroir du Riséd','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Pierre de Résurrection','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Pensieve','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom de Lord Voldemort en anglais ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Tom Riddle','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tom Potter','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tom Gaunt','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tom Slytherin','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle créature garde les cachots d\'Azkaban ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Les Détraqueurs','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Les Aurors','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Les Trolls','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Les Boggarts','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel sort permet de voir ses pires peurs prendre forme ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Riddikulus','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lumos','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Expecto Patronum','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Alohomora','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel objet Voldemort a-t-il utilisé comme premier Horcruxe ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Journal de Tom Jedusor','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Bague de Gaunt','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Médaillon de Serpentard','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Coupe de Poufsouffle','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui est le professeur de Défense contre les Forces du Mal en année 1 ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Quirinus Quirrell','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gilderoy Lockhart','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Remus Lupin','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Alastor Maugrey','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle l\'elfe de maison de la famille Malfoy ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Dobby','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Winky','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kreatur','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Hokey','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel objet donne la vie éternelle dans HP ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'La Pierre Philosophale','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Retourneur de Temps','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Baguette de Sureau','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Médaillon de Serpentard','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel animal fantastique est une croix entre cheval et aigle ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'L\'Hippogriffe','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Thestral','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Griffon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Chimère','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel personnage est professeur de Botanique à Poudlard ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Professeur Chourave','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Professeur Trelawney','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Professeur Flitwick','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Professeur Vector','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle est la formule du Serment Immuable ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Il n\'existe pas de formule - c\'est un geste rituel','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Promissa Vinculum','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Vinculum Semper','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Oath Eternis','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel nom porte la baguette de Voldemort ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'If avec une plume de phénix','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chêne avec cheveu de licorne','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sureau avec os de dragon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Saule avec fibre de cœur de dragon','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel tome apparaît pour la première fois la Coupe de Feu ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Tome 4','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tome 3','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tome 5','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tome 2','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui est la directrice de Poudlard après la retraite de Dumbledore ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Dolores Ombrage (brièvement)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Minerva McGonagall','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pomona Chourave','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sybille Trelawney','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel Horcruxe est détruit en premier dans la série ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Journal de Tom Jedusor (tome 2)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Bague de Gaunt','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Médaillon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Coupe de Poufsouffle','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le surnom de Remus Lupin chez les Maraudeurs ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Moony','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Patmol','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Cornedrue','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Queudver','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle école de sorcellerie est la rivale de Poudlard au tournoi ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Beauxbâtons et Durmstrang','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Salem et Castelobruxo','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mahoutokoro et Ilvermorny','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Uagadou et Castelobruxo','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle la mère de Harry Potter ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Lily Potter','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Molly Potter','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Petunia Potter','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luna Potter','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie \'Lumos\' ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Allumer la lumière au bout de la baguette','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ouvrir une porte','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Rendre invisible','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Désarmer l\'adversaire','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le prénom du père de Harry Potter ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'James','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Albus','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sirius','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Remus','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel compartiment Harry rencontre-t-il Ron pour la première fois ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Dans le Poudlard Express','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sur le quai 9¾','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'À Gringotts','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dans la salle commune','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel pays est née Shakira ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Colombie','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Venezuela','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mexique','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Argentine','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel chanteur est surnommé \'The Weeknd\' ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Abel Tesfaye','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Drake','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bryson Tiller','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Frank Ocean','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui a joué Hermione Granger dans les films Harry Potter ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Emma Watson','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Emma Stone','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Emma Roberts','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Keira Knightley','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel rappeur américain est surnommé \'Drizzy\' ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Drake','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lil Wayne','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kanye West','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'J. Cole','is_correct'=>false]);

        $q = Question::create(['content'=>'De quel pays vient la star K-pop BTS ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Corée du Sud','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Japon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chine','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Thaïlande','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel acteur joue dans \'Fast & Furious\' et est aussi chanteur ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Vin Diesel','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dwayne Johnson','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'John Cena','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tyrese Gibson','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle chanteuse a sorti l\'album \'Renaissance\' en 2022 ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Beyoncé','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Rihanna','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Adele','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'SZA','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel footballeur a été transféré du PSG au Barça en 2024 ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Kylian Mbappé au Real Madrid','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Neymar au Barça','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Verratti à Al-Arabi','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Marquinhos à Chelsea','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel acteur joue le rôle de Batman dans \'The Dark Knight\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Christian Bale','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ben Affleck','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Michael Keaton','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Robert Pattinson','is_correct'=>false]);

        $q = Question::create(['content'=>'En quelle année Whitney Houston a-t-elle sorti \'I Will Always Love You\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'1992','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'1989','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1995','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1985','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel rappeur français a sorti l\'album \'La Même\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Gradur (feat. Awa Imani)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Booba','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ninho','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jul','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle actrice joue Katniss dans \'Hunger Games\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Jennifer Lawrence','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Emma Stone','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Shailene Woodley','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kristen Stewart','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel sportif détient le record du monde du 100m ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Usain Bolt (9.58s)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Asafa Powell','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tyson Gay','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Noah Lyles','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quelle ville est né le rappeur Ninho ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Paris','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lyon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Marseille','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bordeaux','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai prénom de \'Stromae\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Paul','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Thomas','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nicolas','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'David','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui a composé la musique du film \'Interstellar\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Hans Zimmer','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'John Williams','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ennio Morricone','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'James Horner','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel groupe a chanté \'Bohemian Rhapsody\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Queen','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Led Zeppelin','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'The Rolling Stones','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'The Beatles','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom de la rappeuse \'Aya Nakamura\' ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Aya Danioko','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Aya Coulibaly','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Aya Konaté','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Aya Diallo','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle année Ronaldo a-t-il remporté son premier Ballon d\'Or ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'2008','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'2011','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'2013','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'2016','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle chanteuse a joué dans \'A Star is Born\' de 2018 ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Lady Gaga','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Beyoncé','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Adele','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Selena Gomez','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel acteur français a joué dans \'Intouchables\' ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Omar Sy','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jamel Debbouze','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dany Boon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gad Elmaleh','is_correct'=>false]);

        $q = Question::create(['content'=>'En quelle année Elvis Presley est-il décédé ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'1977','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'1975','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1980','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1982','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom de \'Doja Cat\' ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Amala Ratna Zandile Dlamini','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Onika Maraj','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Belcalis Almanzar','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Melissa Jefferson','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film a valu un Oscar à Leonardo DiCaprio ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'The Revenant','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Titanic','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Inception','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'The Wolf of Wall Street','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel chanteur est derrière le tube \'Shape of You\' ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ed Sheeran','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sam Smith','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Harry Styles','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Justin Bieber','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel rappeur est connu pour son titre \'SICKO MODE\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Travis Scott','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lil Baby','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'21 Savage','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gunna','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel acteur joue James Bond dans \'Casino Royale\' (2006) ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Daniel Craig','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pierce Brosnan','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sean Connery','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Roger Moore','is_correct'=>false]);

        $q = Question::create(['content'=>'De quelle ville vient la chanteuse Aya Nakamura ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Aulnay-sous-Bois','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Saint-Denis','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bobigny','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Montreuil','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel chanteur français est derrière \'Formidable\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Stromae','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Maître Gims','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Soprano','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Vianney','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel comédien joue dans la série \'The Office\' (version US) ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Steve Carell','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jim Carrey','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Will Ferrell','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Adam Sandler','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque fabrique les chaussures Air Max ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Nike','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Adidas','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Puma','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'New Balance','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le slogan d\'Apple ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Think Different','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Just Do It','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Innovation','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Think Big','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque est derrière la boisson \'Fanta\' ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Coca-Cola','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'PepsiCo','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nestlé','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Red Bull','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel logo représente une pomme croquée ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Apple','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Amazon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Android','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Applebee\'s','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque de jeans est identifiée par son logo \'éclair rouge\' ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Levi\'s','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Wrangler','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lee','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'G-Star','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle voiture de sport italienne a pour emblème un cheval cabré ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ferrari','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lamborghini','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Maserati','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Alfa Romeo','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque de téléphone produit les Galaxy ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Samsung','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Huawei','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'OnePlus','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Xiaomi','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque de luxe est connue pour ses sacs \'Birkin\' ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Hermès','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Louis Vuitton','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gucci','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chanel','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque de voiture a inventé la \'Polo\' ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Volkswagen','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Seat','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Renault','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Peugeot','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le nom du célèbre personnage mascotte de McDonald\'s ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ronald McDonald','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Burger King','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Colonel Sanders','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Wendy','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque fabrique les montres \'Submariner\' ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Rolex','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Omega','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tag Heuer','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Breitling','is_correct'=>false]);

        $q = Question::create(['content'=>'En quelle année a été fondé Amazon ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'1994','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'1998','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1991','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'2000','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque est derrière le service de streaming \'Disney+\' ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'The Walt Disney Company','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Universal','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Warner Bros','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sony Pictures','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel constructeur automobile a créé la \'Mustang\' ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ford','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chevrolet','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dodge','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chrysler','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque fait les baskets \'Stan Smith\' ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Adidas','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nike','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Reebok','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Vans','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque suédoise de mode rapide est connue pour ses prix bas ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'H&M','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Zara','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Primark','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Uniqlo','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque d\'énergie sponsorise la F1 via l\'équipe Red Bull Racing ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Red Bull','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Monster','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Rockstar','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Burn','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque a introduit le \'MacBook\' en 2006 ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Apple','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'IBM','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'HP','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dell','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel pays a été fondée la marque Rolex ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Suisse','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'France','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Angleterre','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Italie','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque est à l\'origine du terme \'Photoshop\' ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Adobe','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Microsoft','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Corel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Autodesk','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le PDG de Tesla et SpaceX ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Elon Musk','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jeff Bezos','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tim Cook','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sundar Pichai','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque de cosmétiques appartient au groupe L\'Oréal ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Lancôme','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chanel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dior','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Givenchy','is_correct'=>false]);

        $q = Question::create(['content'=>'En quelle année Nike a-t-il été fondé ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'1964','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'1972','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1958','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1980','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel groupe possède la marque Porsche ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Volkswagen Group','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'BMW Group','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Daimler','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Stellantis','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque a lancé le premier iPhone en 2007 ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Apple','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Samsung','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nokia','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'BlackBerry','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle célèbre marque de soda est le rival numéro 1 de Coca-Cola ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Pepsi','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Fanta','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sprite','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'7Up','is_correct'=>false]);

        $q = Question::create(['content'=>'De quel pays vient la marque de voitures Volvo ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Suède','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Norvège','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Allemagne','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Danemark','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque est derrière le système Android ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Google','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Samsung','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Microsoft','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Meta','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque a créé la console \'Game Boy\' ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Nintendo','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sega','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Atari','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sony','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le fondateur de Meta (Facebook) ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Mark Zuckerberg','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jack Dorsey','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Evan Spiegel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kevin Systrom','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Disney met en scène une princesse à la chevelure magique ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Raiponce','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Belle au Bois Dormant','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Cendrillon','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mulan','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel film Bambi est-il le personnage principal ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Bambi (1942)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dumbo','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pinocchio','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Fantasia','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Pixar parle d\'un robot solitaire sur Terre ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'WALL-E','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Robots','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Métropolis','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bolt','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle le méchant de \'La Petite Sirène\' ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ursula','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Maléfique','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Hades','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jafar','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel film Mowgli grandit-il parmi les animaux de la jungle ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Livre de la Jungle','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tarzan','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kirikou','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bambi','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Disney se passe à Hawaï avec une petite fille et un alien ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Lilo & Stitch','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Moana','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bolt','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Treasure Planet','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Cars\', comment s\'appelle le héros voiture de course ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Flash McQueen','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Martin','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chick Hicks','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ramone','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Pixar se déroule dans un restaurant parisien ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ratatouille','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'WALL-E','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Soul','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Coco','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Toy Story 2\', quel personnage est découvert être une vraie star des années 50 ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Jessie','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Woody','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Buzz','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bullseye','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film d\'animation japoanais raconte l\'histoire d\'une apprentie sorcière livreuse ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Kiki la Petite Sorcière','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nausicaä','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Spirited Away','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Princesse Mononoké','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel film DreamWorks des pingouins s\'échappent d\'un zoo ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Madagascar','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Happy Feet','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Les Pingouins de Madagascar','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Surf\'s Up','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Pixar met en scène un vieux monsieur dont la maison s\'envole ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Là-haut (Up)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Brave','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Soul','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luca','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Mulan\', quel est le nom du dragon rouge qui accompagne Mulan ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Mushu','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sisu','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Khan','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Cri-Kee','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel film DreamWorks un panda veut devenir maître du kung-fu ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Kung Fu Panda','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Shrek','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Madagascar','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bee Movie','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le nom du génie dans \'Aladdin\' (Disney) ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Génie','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Iago','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Abu','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jafar','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Le Monde de Dory\', où Dory est-elle née ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Dans un aquarium marin (CIMF)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dans l\'océan Pacifique','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dans la Grande Barrière de Corail','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dans un lagon tropical','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Pixar parle d\'un jeune garçon mexicain dans le monde des morts ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Coco','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Soul','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Onward','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Brave','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Là-haut\', comment s\'appelle le garçon scout qui accompagne Carl ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Russell','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kevin','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dug','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Alpha','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel studio japonais a produit \'Nausicaä de la Vallée du Vent\' ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Studio Ghibli','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Toei Animation','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Madhouse','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sunrise','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Les Indestructibles 2\', qui prend le relais comme super-héros en premier ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Elastigirl (Hélène Parr)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'M. Indestructible','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Violette','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Flèche','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel film Pixar un enfant doit-il trouver l\'âme qui lui correspond avant de naître ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Soul','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Coco','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Onward','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luca','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel personnage de Toy Story dit \'Vers l\'infini et au-delà !\' ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Buzz l\'Éclair','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Woody','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Rex','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jessie','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Encanto\', quel est le don de Mirabel ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Elle n\'en a pas (c\'est son don caché)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Guérir les autres','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Voir le futur','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Parler aux animaux','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Pixar se déroule dans le monde sous-marin des dinosaures marins ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Aucun (c\'est Le Monde de Némo)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'WALL-E','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Voyage de Chihiro','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Atlantide','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Moana\', quel demi-dieu l\'accompagne dans son voyage ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Maui','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Te Kā','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tamatoa','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tui','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Pixar parle de deux frères elfes qui essaient de retrouver leur père ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Onward','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Brave','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luca','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Soul','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Raiponce\', qui sont les yeux de Flynn Rider selon la chanson ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Sa meilleure caractéristique','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Son sourire','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ses cheveux','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Son menton','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Brave\', comment s\'appelle la mère de Mérida transformée en ours ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Elinor','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Fergus','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mor\'du','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Angus','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film d\'animation se déroule sur la Côte d\'Azur italienne avec des monstres marins ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Luca','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Moana','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sinbad','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ponyo sur la falaise','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Zootopie\', comment s\'appelle le renard escroc ami de Judy ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Nick Wilde','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jack Sauvage','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Duke Wiesel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mr Big','is_correct'=>false]);
    }
}
