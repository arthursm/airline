<?php
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

echo $rand;
?>