<?php

$counts=array();
foreach(explode(' ', fgets(STDIN)) as $number){
	$counts[(int)$number]++;
}
echo max($counts);

?>