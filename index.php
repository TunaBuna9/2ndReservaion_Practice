<?php

declare(strict_types=1);

class Reservation
{
    public static int $nextId = 1;

    public int $id;
    public string $name;
    public string $date;
    public float $payment;
    public float $cost;

    public function __construct(string $name, string $date, float $payment, float $cost)
    {
        $this->id = self::$nextId;
        self::$nextId++;

        $this->name = $name;
        $this->date = $date;
        $this->payment = $payment;
        $this->cost = $cost;
    }

    // Checks if party has been paid for already and prints proper statments + totals.
    public function ispayed() : string
    {
        if ($this->payment == $this->cost){
            return "Party has been payed for.";
        }

        if ($this->payment > $this->cost){
            $differnce = $this->payment - $this->cost;
            return "Party paid " . $differnce . " extra.";
        }

        else{
            $differnce = $this->cost - $this->payment;

            return "Party still needs to make payments. " . $differnce . " is still owed";
        } 
    }

    // Checks for MR. FROGMAN~
    public function isVip() : bool{
        if ($this->name == "Frogman"){
            return true;
        }
        else{
            return false;
        }

    }

    public function summary() : string{
        return "#: {$this->id} Name: {$this->name} Date: {$this->date} Amount Payed: {$this->payment} Amount Due: {$this->cost} ";
    }

}


$test1 = new Reservation("Luna", "9:12", 21.15, 4.14);
$test2 = new Reservation("Frogman", "9:16", 4.14, 20.15);
$test3 = new Reservation("Tuna", "9:31", 50.25, 50.25);

// print_r($test1);
// print_r($test2);
// print_r($test3);

// var_dump($test1-> ispayed());
// var_dump($test2-> ispayed());
// var_dump($test3-> ispayed());

// var_dump($test1->isVip());
// var_dump($test2->isVip());
// var_dump($test3->isVip());

echo ($test1->summary() . $test1->ispayed() . " VIP: " . $test1->isVip());
echo ($test2->summary() . $test2->ispayed() . " VIP: " . $test2->isVip());
echo ($test3->summary() . $test3->ispayed() . " VIP: " . $test3->isVip());

// YIPEEE