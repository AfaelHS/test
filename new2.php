<?php

$data=json_decode(file_get_contents('php://input'),true);
//$json='{"cells":[4,8,11,18,19],"distance":2}';
$json='{"cells":[-3,2,9,16],"distance":3}';

$data=json_decode($json,true);

$cells=$data["cells"];
$distance=$data["distance"];

asort($cells);

$count=array();
for ($i=0; $i<100; $i++) {
	if ($i<=$distance) {
		$count[$i]=$i;
	}
	if ($i%$distance==1) {
		$count[$i]=1;
	}
	if (($i>$distance) && ($i%$distance!=1)) {
		$count[$i]=$count[$i-1]+$count[$i-$distance];
	}
}

$result=1;
for ($i=1; $i<count($cells); $i++){
	$lenght=0;
	$res=0;
	for ($k=$cells[$i-1]; $k<$cells[$i]; $k++){
		if ((abs($k-$cells[$i-1])>=$distance) && (abs($cells[$i]-$k)>=$distance)) {
			$lenght++;
		}
	}
	if ($lenght>$distance) {
		$lenght=$count[$lenght];
	}
	
	$res=$lenght;
	if ($res!=0) {
		$result=$result*$res;
	}
}

echo json_encode(array("result"=>$result));

?>