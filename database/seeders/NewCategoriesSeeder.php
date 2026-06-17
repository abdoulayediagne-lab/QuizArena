<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;

class NewCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $q = Question::create(['content'=>'Quel est le vrai nom du Seigneur des Ténèbres ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Tom Jedusor','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Drago Malfoy','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sirius Black','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Albus Dumbledore','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quelle maison Harry Potter est-il ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Gryffondor','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Serpentard','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Serdaigle','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Poufsouffle','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle le crapaud de Neville Londubat ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Croûtard','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pattenrond','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nagini','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Norbert','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel sport se pratique sur balai dans Harry Potter ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Quidditch','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Blaxball','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Broomball','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Sorceroball','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le sort de désarmement utilisé par Harry ?','category'=>'Harry Potter','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Expelliarmus','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Avada Kedavra','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Stupefix','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Wingardium Leviosa','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle la banque des sorciers gérée par les gobelins ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Gringotts','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Azkaban','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Poudlard','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pré-au-Lard','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le patronus d\'Hermione Granger ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Une loutre','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un chat','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un cygne','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un dauphin','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle est la position de Harry dans l\'équipe de Quidditch ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Attrapeur','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gardien','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Poursuiveur','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Batteur','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui est le demi-sang ? (sous-titre du tome 6)','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Severus Rogue','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Voldemort','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dumbledore','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Harry Potter','is_correct'=>false]);

        $q = Question::create(['content'=>'Que signifie \'Morsmordre\' ?','category'=>'Harry Potter','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le sort qui invoque la Marque des Ténèbres','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un sort de transformation','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un sortilège de mort','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un sort d\'amnésie','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel objet peut ressusciter les morts selon la légende des Deathly Hallows ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'La Pierre de Résurrection','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Baguette de Sureau','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Cape d\'Invisibilité','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Horcruxe','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai prénom du professeur Ombrage ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Dolores','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Margaret','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Astoria','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Millicent','is_correct'=>false]);

        $q = Question::create(['content'=>'Combien de Horcruxes Voldemort a-t-il créés (hors Harry) ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'6','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'5','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'7','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'4','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le sortilège de la Mort Inévitable ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Avada Kedavra','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Crucio','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Imperio','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Morsmordre','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel tome Harry apprend-il à faire un Patronus ?','category'=>'Harry Potter','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Prisonnier d\'Azkaban (tome 3)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Chambre des Secrets (tome 2)','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Coupe de Feu (tome 4)','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'L\'Ordre du Phénix (tome 5)','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom de Lady Gaga ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Stefani Germanotta','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Robyn Fenty','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Belcalis Almanzar','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Destiny Hope','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel pays est né Cristiano Ronaldo ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Portugal','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Espagne','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Brésil','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'France','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le prénom de la femme d\'Elon Musk (première) ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Justine','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Grimes','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Amber','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Talulah','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui est surnommé \'The King of Pop\' ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Michael Jackson','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Elvis Presley','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Prince','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'James Brown','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom de Cardi B ?','category'=>'Célébrités','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Belcalis Almanzar','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Robyn Rihanna Fenty','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Onika Maraj','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Stefani Germanotta','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle célébrité a fondé la marque de beauté Fenty Beauty ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Rihanna','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Beyoncé','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kim Kardashian','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kylie Jenner','is_correct'=>false]);

        $q = Question::create(['content'=>'À quel âge Lionel Messi a-t-il rejoint la Masia (académie du Barça) ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'13 ans','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'10 ans','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'16 ans','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'11 ans','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom d\'Eminem ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Marshall Mathers','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Calvin Harris','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Shawn Carter','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Curtis Jackson','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quelle série Zendaya joue le rôle principal de \'Rue\' ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Euphoria','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Stranger Things','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'The Crown','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Riverdale','is_correct'=>false]);

        $q = Question::create(['content'=>'Combien de Grammys Taylor Swift a-t-elle remporté en 2024 ?','category'=>'Célébrités','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'4','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'6','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'2','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'8','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel acteur joue Tony Stark (Iron Man) dans les films Marvel ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Robert Downey Jr.','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chris Evans','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mark Ruffalo','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Chris Hemsworth','is_correct'=>false]);

        $q = Question::create(['content'=>'En quelle année Michael Jackson a-t-il sorti \'Thriller\' ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'1982','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'1980','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1985','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1979','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom de Nicki Minaj ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Onika Tanya Maraj','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Belcalis Almanzar','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Robyn Fenty','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Melissa Viviane Jefferson','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui a réalisé le film \'Inception\' avec Leonardo DiCaprio ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Christopher Nolan','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Steven Spielberg','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'James Cameron','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ridley Scott','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel rappeur français est aussi connu sous le nom de \'MHD\' et s\'appelle Mohamed Sylla ?','category'=>'Célébrités','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'MHD','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gims','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Rohff','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kaaris','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le slogan de Nike ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Just Do It','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Impossible is Nothing','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Think Different','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'I\'m Lovin\' It','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque fabrique la PlayStation ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Sony','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Microsoft','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nintendo','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Samsung','is_correct'=>false]);

        $q = Question::create(['content'=>'De quel pays vient la marque IKEA ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Suède','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Norvège','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Danemark','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Finlande','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque automobile est connue pour le logo aux trois diamants ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Mitsubishi','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Honda','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Toyota','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kia','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le logo de Twitter/X : un oiseau ou un X ?','category'=>'Marques','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Un X (depuis 2023)','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un oiseau bleu','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un T blanc','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un micro','is_correct'=>false]);

        $q = Question::create(['content'=>'En quelle année a été fondée Apple ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'1976','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'1982','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1970','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'1984','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque de vêtements est originaire de Haguenau (France) ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Coq Sportif','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Lacoste','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Aigle','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mephisto','is_correct'=>false]);

        $q = Question::create(['content'=>'Qu\'est-ce que \'LVMH\' signifie ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Louis Vuitton Moët Hennessy','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luxe Vente Mode Haute','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Louis Vuitton Marque Histoire','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luxe Vintage Mode Haute','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque japonaise fabrique les montres \'G-Shock\' ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Casio','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Seiko','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Citizen','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Orient','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel groupe possède les marques Zara, Pull&Bear, Massimo Dutti ?','category'=>'Marques','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Inditex','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'H&M','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'LVMH','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Fast Retailing','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel pays a été fondée la marque Adidas ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Allemagne','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Autriche','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Suisse','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pays-Bas','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel est le vrai nom du fondateur de McDonald\'s qui a transformé la chaîne ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Ray Kroc','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ronald McDonald','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dick McDonald','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Dave Thomas','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle marque de boisson est surnommée \'La Bière des Rois\' ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Budweiser','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Heineken','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Corona','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Stella Artois','is_correct'=>false]);

        $q = Question::create(['content'=>'Quelle est la marque mère de Google ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Alphabet','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'DeepMind','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'YouTube Corp','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Android Inc','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel constructeur auto a créé la \'Prius\', première voiture hybride commerciale mondiale ?','category'=>'Marques','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Toyota','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Honda','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Nissan','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Hyundai','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel film d\'animation un poisson-clown cherche son fils Némo ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Monde de Némo','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ratatouille','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Cars','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Toy Story','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle la sorcière dans \'La Belle au Bois Dormant\' de Disney ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Maléfique','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Ursula','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Cruella','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Reine des Neiges','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel film Simba est-il le personnage principal ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Roi Lion','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Tarzan','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'La Belle et la Bête','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Jungle Book','is_correct'=>false]);

        $q = Question::create(['content'=>'Qui chante \'Let It Go\' dans La Reine des Neiges ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Elsa','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Anna','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kristoff','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Olaf','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans quel studio a été produit le film \'Coco\' ?','category'=>'Film d\'animation','difficulty'=>'facile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Pixar','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'DreamWorks','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Disney','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Illumination','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film Pixar met en scène des émotions personnifiées dans la tête d\'une fille ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Vice-Versa','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Soul','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luca','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Elemental','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Zootopie\', quel est le métier de Judy Hopps ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Policière','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Avocate','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Détective','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Journaliste','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel personnage dit \'Hakuna Matata\' dans Le Roi Lion ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Timon et Pumbaa','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Simba et Nala','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Rafiki et Zazu','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Scar et Simba','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Ratatouille\', comment s\'appelle le rat cuisinier ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Rémy','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Gusteau','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Linguini','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Colette','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film DreamWorks met en scène un ogre vert et un âne bavard ?','category'=>'Film d\'animation','difficulty'=>'normal']);
        Answer::create(['question_id'=>$q->id,'content'=>'Shrek','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Madagascar','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Kung Fu Panda','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Bee Movie','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'WALL-E\', quel objet WALL-E collecte-t-il précieusement ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Une plante','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un rubis','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Une carte à jouer','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Un tableau','is_correct'=>false]);

        $q = Question::create(['content'=>'Comment s\'appelle le méchant dans \'Les Indestructibles\' ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Syndrome','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Omnidroid','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mirage','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Voyd','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel réalisateur a créé \'Spirited Away\' (Le Voyage de Chihiro) ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Hayao Miyazaki','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Isao Takahata','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mamoru Hosoda','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Satoshi Kon','is_correct'=>false]);

        $q = Question::create(['content'=>'Dans \'Toy Story\', quelle est la marque du jouet Buzz l\'Éclair ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Star Command / Zurg','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Mattel','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Hasbro','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Pixar Toys','is_correct'=>false]);

        $q = Question::create(['content'=>'Quel film d\'animation Pixar se passe entièrement dans le fond de l\'océan ?','category'=>'Film d\'animation','difficulty'=>'difficile']);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Monde de Dory','is_correct'=>true]);
        Answer::create(['question_id'=>$q->id,'content'=>'Le Monde de Némo','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Luca','is_correct'=>false]);
        Answer::create(['question_id'=>$q->id,'content'=>'Brave','is_correct'=>false]);
    }
}
