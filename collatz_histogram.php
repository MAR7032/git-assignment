<?php

// Parent class for Collatz Conjecture
class Collatz {

    // constants
    const EVEN_DIVISOR = 2;
    const ODD_MULTIPLIER = 3;
    const ADD_ONE = 1;

    // protected variable
    protected $number;

    // constructor
    public function __construct($number) {
        $this->number = $number;
    }

    // method to generate Collatz sequence
    public function generateSequence() {

        $x = $this->number;
        $sequence = [];

        while($x != 1) {

            $sequence[] = $x;

            if($x % self::EVEN_DIVISOR == 0) {
                $x = $x / self::EVEN_DIVISOR;
            }
            else {
                $x = self::ODD_MULTIPLIER * $x + self::ADD_ONE;
            }
        }

        $sequence[] = 1;

        return $sequence;
    }
}



// Child class (Inheritance)
class CollatzHistogram extends Collatz {

    // private variable
    private $histogram = [];

    // method to calculate histogram for interval [n;m]
    public function calculateHistogram($n, $m) {

        for($i = $n; $i <= $m; $i++) {

            $this->number = $i;

            $sequence = $this->generateSequence();

            $length = count($sequence);

            if(!isset($this->histogram[$length])) {
                $this->histogram[$length] = 0;
            }

            $this->histogram[$length]++;
        }

        return $this->histogram;
    }

    // display histogram
    public function showHistogram($n,$m) {

        $hist = $this->calculateHistogram($n,$m);

        echo "<h3>Histogram of Collatz sequence lengths</h3>";

        foreach($hist as $length => $count) {
            echo "Sequence length $length : $count numbers <br>";
        }
    }
}



// HTML form (similar to your previous assignment)

echo "<h2>Collatz Conjecture Histogram</h2>";

echo '<form method="post">
Start number (n): <input type="number" name="n" required><br><br>
End number (m): <input type="number" name="m" required><br><br>
<input type="submit" value="Calculate Histogram">
</form>';



// process input

if(isset($_POST['n']) && isset($_POST['m'])) {

    $n = $_POST['n'];
    $m = $_POST['m'];

    $obj = new CollatzHistogram($n);

    $obj->showHistogram($n,$m);
}

?>
