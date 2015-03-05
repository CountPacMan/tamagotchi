<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Tamagotchi.php';
    session_start();
    if (empty($_SESSION['tamagotchi'])) {
        $_SESSION['tamagotchi'] = [];
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        $_SESSION['tamagotchi'] = [];
        return $app['twig']->render('home.php');
    });

    $app->post("/creature", function() use ($app) {
        if(empty($_SESSION['tamagotchi']))
        {
            $creature = new Tamagotchi($_POST['weight']);
            $creature->save();
        }
        $creature = Tamagotchi::getCreature();
        // test to see what button was pressed
        if (key($_POST) == "food") {
            $creature[0]->feed();
        } elseif (key($_POST) == "rest") {
            $creature[0]->rest();
        } elseif (key($_POST) == "play") {
            $creature[0]->play();
        } elseif (key($_POST) == "time") {
            $creature[0]->passTime();
        } elseif (key($_POST) == "kick") {
            $creature[0]->kick();
        }

        // test to see if creature died
        if ($creature[0]->isAlive() != "alive") {
            return $app['twig']->render('died.php', array('creature' => Tamagotchi::getCreature()));
        }

        return $app['twig']->render('creature.php', array('creature' => Tamagotchi::getCreature()));
    });


    return $app;
 ?>
