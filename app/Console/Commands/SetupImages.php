<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupImages extends Command
{
    protected $signature = 'setup:images';
    protected $description = 'Copie les images depuis image-avatar/ vers storage/app/public/';

    public function handle()
    {
        $this->info('Copie des images en cours...');

        @mkdir(storage_path('app/public/avatars'), 0755, true);
        @mkdir(storage_path('app/public/items'), 0755, true);

        $avatars = ['chameau.jpeg', 'cheval.jpeg', 'ecureuil.jpeg', 'lapin.jpeg', 'pingouin.jpeg', 'panda2.jpeg', 'renard.png', 'chouette.jpeg'];
        foreach ($avatars as $image) {
            @copy("image-avatar/$image", storage_path("app/public/avatars/$image"));
        }

        $items = ['aigle-dore.jpeg', 'cerberus.png', 'chien.jpeg', 'dragon.webp', 'leopard.jpeg', 'lion.webp', 'loup.png', 'panthere.jpg', 'phoenix.png', 'serpent-dore.jpeg'];
        foreach ($items as $image) {
            @copy("image-avatar/$image", storage_path("app/public/items/$image"));
        }

        $this->info('Images copiées avec succès!');
    }
}
