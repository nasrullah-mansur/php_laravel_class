<?php 

require_once 'one.php';

// public,
// private,
// protected,

class One {
    public $name = 'my name';

    public function show() {
        echo $this->name;
    }
}

$obj1 = new myOne\One();

// echo $obj1->test;


class Two extends One {
    public function showTwo() {
        echo $this->name;
    }
}


$test2 = new Two();

// echo $test2->showTwo();


$test = new One();


// print_r($test);

// echo $test->show();







class Car {
    public $dor = 'dor';
    public $window = 'window';


    public function __construct($var) {
        echo 'this is from constructor ' . $var;
    }

    public function openingDor($dor_name) {
        echo $dor_name . ' From opening dor method';
        echo '<br>';

        return $this;
    }

    public function closingWindow() {
        echo $this->window . ' From opening window method';
        echo '<br>';
    }
}



// $car1 = new Car('value name');

// echo $car1->openingDor('dor name')->closingWindow();
 


trait SendToDataBase {
    public function send($arr_from_html_form) {

    }
}



trait NameOne {
    public $nameOne = 'Name one';
}

trait NameTwo {
    public $nameTwo = 'Name two';
}

trait NameThree {
    public $nameThree = 'Name three';
}




class FinalName {
    use NameOne;
    use NameTwo;
    use NameThree;

    public $finalName = 'Final Name';
}


$obj4 = new FinalName();

echo $obj4->nameThree;






