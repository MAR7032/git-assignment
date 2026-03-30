<?php
class Collatz {
    private $start;
    
    public function __construct($start) {
        $this->start = $start;
    }
    
    public function calculate($start, $end) {
        $results = [];
        for ($i = $start; $i <= $end; $i++) {
            $n = $i;
            $steps = 0;
            $max = $n;
            
            while ($n != 1) {
                $n = ($n % 2 == 0) ? $n / 2 : 3 * $n + 1;
                $steps++;
                if ($n > $max) $max = $n;
            }
            
            $results[$i] = ['steps' => $steps, 'max' => $max];
        }
        return $results;
    }
    // Version 2 change

    // Version 3 change
    public function stats($start, $end) {
        $data = $this->calculate($start, $end);
        
        $maxSteps = $minSteps = $maxVal = $start;
        
        foreach ($data as $num => $info) {
            if ($info['steps'] > $data[$maxSteps]['steps']) $maxSteps = $num;
            if ($info['steps'] < $data[$minSteps]['steps']) $minSteps = $num;
            if ($info['max'] > $data[$maxVal]['max']) $maxVal = $num;
        }
        
        return [
            'max_steps' => [$maxSteps, $data[$maxSteps]['steps']],
            'min_steps' => [$minSteps, $data[$minSteps]['steps']],
            'max_value' => [$maxVal, $data[$maxVal]['max']]
        ];
    }
}
?>