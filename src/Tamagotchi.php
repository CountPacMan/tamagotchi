<?php

class Tamagotchi
{
    //a value of 0 or 10 would kill the tamagotchi
    private $rest;
    private $food;
    private $mood;

    //setting food is required, rest and mood default to 5
    function __construct($food, $rest = 5, $mood = 5)
    {
        $this->food = $food;
        $this->rest = $rest;
        $this->mood = $mood;
    }

    function getRest()
    {
        return $this->rest;
    }

    function getFood()
    {
        return $this->food;
    }

    function getMood()
    {
        return $this->mood;
    }

    function rest()
    {
        $this->rest++;
        $this->food--;
    }

    function feed()
    {
        $this->food++;
        $this->rest--;
    }

    function play()
    {
        $this->mood++;
        $this->food--;
        $this->rest--;
    }

    function kick()
    {
        $this->mood -= 3;
    }

    function passTime()
    {
        $this->food--;
        $this->mood--;
        $this->rest--;
    }

    function isAlive()
    {
        if ($this->food == 0) {
            return "hunger";
        } elseif ($this->mood <= 0) {
            return "suicide";
        } elseif ($this->rest == 0) {
            return "sleep deprivation";
        } elseif ($this->food == 10) {
            return "exploded";
        } elseif ($this->rest == 10) {
            return "going into permanent coma";
        } elseif ($this->mood == 10) {
            return "exploded from happiness";
        } else {
            return "alive";
        }
    }

    function save()
    {
        array_push($_SESSION['tamagotchi'], $this);
    }

    static function getCreature()
    {
        return $_SESSION['tamagotchi'];
    }
}

 ?>
