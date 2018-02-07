<?php

interface Person {
  public function getAllNames();
}

class MilitaryPerson implements Person {
  
  private $name;
  private $title;
  private $boss;
  public $subordinates = [];
  
  public function __construct($name, $title) {
    $this->name  = $name;
    $this->title = $title;
    $this->boss  = $this;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function setBoss(Person $boss) {
    $this->boss = $boss;
  }
  
  public function add(Person $person) {
    $person->setBoss($this);
    $this->subordinates[] = $person;
    
  }
  
  public function getAllNames() {
    echo $this->name . ", звание: " . $this->title . ", босс: " . $this->boss->getName() . PHP_EOL;
    
    foreach ($this->subordinates as $person) {
      $person->getAllNames();
    }
  }
}

$general    = new MilitaryPerson('Vasya', 'General');
$polkovnik1 = new MilitaryPerson('Sasha', 'Polkovnik');
$polkovnik1->add(new MilitaryPerson('Oleg', 'Litenant'));
$polkovnik1->add(new MilitaryPerson('Evgen', 'Litenant'));
                 
$polkovnik2 = new MilitaryPerson('Petya', 'Polkovnik');
$polkovnik2->add(new MilitaryPerson('Slava', 'Litenant'));
$polkovnik2->add(new MilitaryPerson('Ilya', 'Litenant'));  
                 
$general->add($polkovnik1);  
$general->add($polkovnik2);
                 
$general->getAllNames();
                 

