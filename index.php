

<?php 

$test = 'this is test';
// $test = Array(10, 20, 30);
// $test = [10, 20, 30];

// print_r( $test );


// $test.toUpperCase();

strtoupper($test);

echo strtoupper($test);


function functionName() {
    echo 'this is our function';
}

functionName();

echo '<br>';

$arr = [10, 20, 30, 40, 50];

for ($i = 0; $i <= count($arr) - 1; $i++) { 
    echo $arr[$i] . "<br>";
}

for ($i = 1; $i <= count($arr); $i++) { 
    echo $arr[$i - 1] . "<br>";
}





// single line comment;
# single line comment;

/* 


*/


$var1 = 1;

$number = 0;

function test() {

    static $number = 0;

    echo $number;

    $number++;
}

test();
test();
test();
test();
test();
test();

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';



$arr2 = [
    'name' => 'nasrullah',
    'class' => 10,
    'address' => 'dhaka'
];

foreach ($arr2 as $item) {
    echo $item;
    echo '<br>';
}


// $arr3 = [
//     '0' => 'nasrullah', 
//     '1' => 10, 
//     '2' => 'dhaka'
// ];

$arr3 = ['nasrullah',10, 'dhaka'];

print_r($arr3);

echo '<br>';

echo $arr2['name'];




class Test {


    public $test = 'this is test property';

    public function first() {
        echo 'this is our first object';
    }
}


$obj1 = new Test();

echo $obj1->first();
echo $obj1->test;







?>


<script>


    
    function test() {
    let num = 0;
    console.log(num);

    num++;
}


test();
test();
test();
test();
test();



let text = 'welcome to our home';

let output = text.split(' ');


</script>




