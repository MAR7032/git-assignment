<?php
// Collatz Conjecture Program
echo "<h2>Collatz Conjecture Calculator</h2>";

// HTML form to take user input
echo '<form method="post">
Enter a number: <input type="number" name="num" required>
<input type="submit" value="Calculate">
</form>';

// Check if user submitted a number
if(isset($_POST['num'])) {
    $x = $_POST['num'];
    echo "<h3>Sequence:</h3>";
    while($x != 1) {
        echo $x . " → ";
        if($x % 2 == 0) {
            $x = $x / 2;
        } else {
            $x = 3 * $x + 1;
        }
    }
    echo "1";
}
?>