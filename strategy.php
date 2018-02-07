<?php

interface CompareStrategy {
  public function compare($a, $b);
}

class Sorter {
  
  private $collection;
  private $strategy;
  
  public function __construct($collection) {
    $this->collection = $collection;
  }
  
  public function sort() {
    uasort($this->collection, [$this->strategy, 'compare']);
  }
  
  public function setStrategy(CompareStrategy $strategy) {
    $this->strategy = $strategy;
  }
  
  public function getCollection() {
    return $this->collection;
  }
}

class AgeCompareStrategy implements CompareStrategy {
  public function compare($a, $b) {
    return $a['age'] <=> $b['age'];
  }
}

class NameCompareStrategy implements CompareStrategy {
  public function compare($a, $b) {
    return $a['name'] <=> $b['name'];
  }
}

$users = [
  ['id' => 1, 'name' => 'Dima', 'age' => 33],
  ['id' => 2, 'name' => 'Sasha', 'age' => 40],
  ['id' => 3, 'name' => 'Evgen', 'age' => 20],
  ['id' => 4, 'name' => 'Oleg', 'age' => 36],
  ['id' => 5, 'name' => 'Ilya', 'age' => 25],
];

$sorter = new Sorter($users);
$sorter->setStrategy(new NameCompareStrategy);
$sorter->sort();
print_r($sorter->getCollection());