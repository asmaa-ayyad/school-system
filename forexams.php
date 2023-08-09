<?php

declare(strict_types=1);

class mathFunctions { 
  const PI = '3.14159265'; 
  const E = '2.7182818284'; 
  const EULER = '0.5772156649'; 
 }
 $m = new mathFunctions();
 echo $m::PI; //echo $m->PI;
 echo mathFunctions::PI;












class asmaa{
  private $name;

public $x=0;
  public function setname($name)
{
$this->name=$name;


}

public function getname (){
  echo $this->name;
}

}



 $a = new asmaa();

 $x = $a->setname("hhh");

 $y = $a->getname();

/*
 echo $y;
 echo $a->name;
 */
class Book { 
  private $title; 
  private $isbn; 
  private $copies; 
  public $c="befor";
  public $e="after";
  function __construct($isbn) { 
  echo "<p>Book class instance created.</p>"; 
  } 

   


 function __destruct() { 
  echo "<p>Book class instance destroyed.</p>"; 

  } 

  } 
  $book = new Book("0615303889"); 
 echo $book->c;
  echo $book->e ."<br />";

  
  class Visitor { 
    private static $visitors = 0; 
    function __construct() { self::$visitors++; } 
    static function getVisitors() { return Visitor::$visitors; } 
    } 
    $visits = new Visitor(); 
    echo Visitor::getVisitors()."<br />"; // class name
    $visits2 = new Visitor(); 
    echo Visitor::getVisitors()."<br />";
    echo $visits::getVisitors()."<br />"; // object name
    $visits2 = new Visitor(); // what happend
    echo $visits->getVisitors()."<br />"; 




    class Fruit {
      public $name;
      public $color;
      public function __construct($name, $color) {
      $this->name = $name;
     $this->color = $color;
      }
      protected function intro() {
      echo "The fruit is {$this->name} and the color is {$this->color}.";
      }
     }
     class Strawberry extends Fruit {
      public function message() {
      echo "Am I a fruit or a berry? ";
     $this -> intro();
      }
     }
     $strawberry = new Strawberry("Strawberry", "red"); // OK. __construct() is public
     $strawberry->message(); // OK. message() is public and it calls intro() (which is protected) from 
   
     //$Fruit->intro()."<br/>";  
      echo $strawberry->name."<br/>";
      
      //echo $Fruit->name."<br/>";

    $cars = array(1,2,3,4);
$arrlength = count($cars);

foreach ($cars as $k=>$v){
echo "{$k}=>{$v}";

print_r($cars);}

echo "<hr/>";
echo "<hr/>";
echo "<hr/>";

 $fords = ['falcon', 'mustang','hhu'];
 $cars = ['civic', 'smart', ...$fords, 'tuson'];
 var_dump($cars);

 echo "<hr/>";
 echo "<hr/>";
 echo "<hr/>";
 $myBook = array( 'title' => 'Beginning PHP 5.3','author' => 'John','pubYear' =>2008 );
$myBookSlice = array_slice( $myBook, 1, 2 );
echo $myBookSlice['author'];
Print_r($myBookSlice);

echo "<hr/>";
echo "<hr/>";
echo "<hr/>";
/*
$x="abs1";
$y="2";
echo $x+$y;*/


$a=2.3;
$b=1;
echo $a . $b . "<br/>";



$a="asmaa";
$b="ayyad";
echo '$a' . "$b"."<br/>";

echo "<hr/>";
echo "<hr/>";
echo "<hr/>";

define( 'GREETING', "Welcome to W3Schools.com!");
echo GREETING ;

echo "<hr/>";
echo "<hr/>";
echo "<hr/>";


$x=3;
$y=2;
echo $x ** $y . "<br/>";
//echo 3**3 . 7;
$r=3;
$r/="3";
echo $r ."<br>";

$y=2;
echo $x ** $y."<br>";

$y=2;
echo $y--."<br>"; //2
echo $y."<br>";//1

$e='0';
$w="0";
if($e===$w){
echo "lolo";//1
}
echo "<hr/>";
echo "<hr/>";
echo "<hr/>";

$a = "A"; $b = "a";
$result = $a <=> $b;
if( $result ===0) {
 print "Both are equal";
} else if( $result ===1) {
 print "$a is greater than $b";
} else {
 print "$b is greater than $a";
}


$num = 3;
do {
echo"Execution number: $num<br>";
$num++;
} while ( $num > 200 && $num < 400 );

for ($i = 1; $i <= 10; $i++) {
  echo "\$i = $i <br>";
 }
 for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
  break;
  }
  echo "The number is: $x <br>";
  }
  for ($i = 1; ; $i++) {
    if ($i > 10) {
    break;
    }
    echo "$i"."<br>";
   }

   for ($i = 0; $i < 5; ++$i) {
    if ($i == 2)
    continue;
    print "$i<br>";
   }
   echo "<hr/>";
echo "<hr/>";
echo "<hr/>";echo "<hr/>";
echo "<hr/>";
echo "<hr/> <h1>function </h1>";
function o($first, $s="ayyad"){
  print $first.$s;
}
o(s:"ayyad",first:"asmaa");
function su(...$n){
  $sum=0;
  foreach($n as $num){
$sum+=$num;

  }
  return $sum;
}

echo su(1,2,3,4);

echo "<hr/>";

$r="hi";
function hi(){
  global $r;

  echo $r."<br>";
}

echo$r."<br>";
hi();

$z=2;
$u=6.7;
echo $z+$u."<br>";
   function typee(float $f, float $s){
    return $f+$s;
   }

   echo typee(2,3);
   echo "<hr/>";
   echo "<hr/>";
   echo "<hr/>";

   function adder(&$x)  
   {  
   $x .= ' This is Call By Reference ';  
   }  
   $y = 'Hello PHP.';  
   adder($y);  
   echo $y;
?>