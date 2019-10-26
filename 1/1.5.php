<?php
    $a = 9;
    $b = 8;

    //[$a,$b] = [$b,$a];

    $a = $b - $a + ($b = $a);

    echo $a."<br>";
    echo $b;
    
?>
