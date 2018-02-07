<?php

interface Car {
  public function __construct($model);
}

class SedanCar implements Car {
  public function __construct($model) {
    
  }
}

class HachbackCar implements Car {
  public function __construct($model) {
    
  }
}

class CarFactory {
  public function createCar($name, $type) : Car {
    if ('sedan' == $type) {
      return new SedanCar();
    }
    if ('hachback' == $type) {
      return new HachbackCar();
    }
    
    throw new Exception;
  }
}

class CarStaticFactory {
  public static 
}







$factory = new CarFactory();
$cars = [];
for($i = 0; $i < 100; $i++) {
  $cars[] = $factory->createCar('Honda');
}