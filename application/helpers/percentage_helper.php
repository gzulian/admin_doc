<?php

function calculate($total, $part) {

	if ($part == 0 || $total == 0) {
		return 0.0;
	}
	//echo $part."* 100 /".$total;

	return number_format(($part*100/$total), 0, ',', '.');
}

?>