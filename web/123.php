<?php
class Animal{
  public $name;
  public $age = 0;
   function sayHello($word){
    echo $word;
   }
}

$cat = new Animal();
$dog = new Animal();
$cat->name = 'Мурзик';
$dog->name = 'Тузик';
$cat->sayHello('Мяу');
$dog->sayHello('гав');

?>
