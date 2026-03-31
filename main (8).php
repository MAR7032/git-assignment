<?php
include 'collatz_class.php';

$calc = new Collatz(1);

// Test with smaller interval
$s = 25;
$e = 30;
$stats = $calc->stats($s, $e);

echo "Interval: $s to $e\n";
echo "Max Steps: Number {$stats['max_steps'][0]} - {$stats['max_steps'][1]} steps\n";
echo "Min Steps: Number {$stats['min_steps'][0]} - {$stats['min_steps'][1]} steps\n";
echo "Max Value: Number {$stats['max_value'][0]} - Value {$stats['max_value'][1]}\n\n";

// Test with requested interval
$s2 = 25;
$e2 = 24658;
$stats2 = $calc->stats($s2, $e2);

echo "Interval: $s2 to $e2\n";
echo "Max Steps: Number {$stats2['max_steps'][0]} - {$stats2['max_steps'][1]} steps\n";
echo "Min Steps: Number {$stats2['min_steps'][0]} - {$stats2['min_steps'][1]} steps\n";
echo "Max Value: Number {$stats2['max_value'][0]} - Value {$stats2['max_value'][1]}\n";
?>