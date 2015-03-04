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
            echo "Is Empty";
            $creature = new Tamagotchi($_POST['weight']);
            $creature->save();
        }

        return $app['twig']->render('creature.php', array('creature' => Tamagotchi::getCreature()));
    });


    return $app;
 ?>
