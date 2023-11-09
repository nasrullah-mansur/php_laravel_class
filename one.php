
<?php 

// require_once 'app/three.php';

require_once '../two.php';

class Three 
{
    use Two;
    
}

class One 
{
    use Three;

    public $test = 'test';
}

$run = new One;

echo $run->test;