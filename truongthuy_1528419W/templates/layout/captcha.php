<?php
	$number1 = rand(6, 10);
	$number2 = rand(1, 5);
	$ptmang = array("+","-");
	$pt = $ptmang[mt_rand(0, count($ptmang) - 1)];
	$operator = "$number1$pt$number2";
?>
	<input type="hidden" name="so1" id="so1"  value="<?= $number1 ?>" hidden="visible" />
	<input type="hidden" name="so2" id="so2"  value="<?= $number2 ?>" hidden="visible" />
	<input type="hidden" name="pt" id="pt"  value="<?=$operator?>" hidden="visible" />
	<input type="hidden" name="opt" id="opt"  value="<?=matheval($operator)?>" hidden="visible" />