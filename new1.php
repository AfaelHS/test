<?php

class SocksMachine
{
	public function countUnpaired(array $socks){
		$counts=array();
		foreach($socks as $sock){
			$counts[$sock]++;
		}
		$result=0;
		foreach($counts as $count){
			if ($count%2!=0){
				$result++;
			}
		}
		return $result;
	}
}

$obj=new SocksMachine();
echo $obj->countUnpaired([10,10,11,11]),"\n";
echo $obj->countUnpaired([10,20,11,9,10,9]),"\n";

?>