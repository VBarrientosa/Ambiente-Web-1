<?php
$temperatura = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
//$a = array_filter($temperatura);
$average = array_sum($temperatura)/count($temperatura);
echo "Average Temperature is : " . $average;
echo "\n";
sort($temperatura);
$temperatura = array_unique($temperatura);
$temperatura = array_values($temperatura);
$top = $argv[1];


echo "List of five lowest temperatures : ";
    for($i = 0; $i < $top; $i++)
    {
        echo "$temperatura[$i] ";
    }
    
echo "\n";
echo "List of five highest temperatures : ";       
    for($i = count($temperatura) - $top; $i <= count($temperatura) - 1; $i++)
    {
        echo "$temperatura[$i] ";
    }
    
    echo "\n";
?>