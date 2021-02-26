<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Movie;
use App\Entity\User;
use App\Entity\Category;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture {

    public function load(ObjectManager $manager) {

        //Creating 5 movies
        for ($i = 0; $i < 5; $i++) {
            $movieFaker = Faker\Factory::create();
            
            // User
            $user = new User();
            $user->setName("Emily");
            $user->setEmail("emily@gmail.com");
            $user->setPass("emily_gmail");
            
            $manager->persist($user);
            
            // Category
            $category = new Category();
            $category->setCategory("Comedia");
            
            $manager->persist($category);   

            // Movie
            $movie = new Movie();
            $movie->setTitle("Doctor Who");
            $movie->setSynopsis("La serie narra las aventuras de un Señor del Tiempo conocido como «el Doctor», que explora el universo en su TARDIS, una nave espacial con conciencia propia"
                    . " capaz de viajar a través del tiempo y el espacio. Por fuera, parece una cabina de policía azul, que era un elemento común de las calles del Reino Unido cuando la serie "
                    . "comenzó en 1963. Con la ayuda de distintos acompañantes, el Doctor se enfrenta a una variedad de enemigos mientras salva civilizaciones, visita tanto el pasado como el "
                    . "futuro, ayuda a gente común y corrige injusticias.");
            $movie->setPrice("10");
            $movie->setCover("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvqX0EcxwdE9g75SpvyRofmjNfmbBNghT5GA&usqp=CAU");
            $movie->addUser($user);
            $movie->addCategory($category);
            
            $manager->persist($movie);
                      
            
                    
        }
        $manager->flush();
    }
}
