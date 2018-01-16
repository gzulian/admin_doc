<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

// FECHA ESTIMADA FACTURA DE LOG A SAC

function stimateDateLogicToSac($from, $routeCode, $holyDaysDB) {
	$days = 0;
	if ($routeCode == 'C13') {
		// santiago  7 días
		$days = 7;

	} elseif ($routeCode == 'C01' || $routeCode == 'C02' || $routeCode == 'C03' || $routeCode == 'C04') {
		// Norte  16 días
		$days = 16;

	} elseif ($routeCode == 'C05' || $routeCode == 'C06' || $routeCode == 'C07') {
		// CENTRO  7 días
		$days = 7;

	} elseif ($routeCode == 'C08' || $routeCode == 'C09' || $routeCode == 'C10') {
		// sur  16 días
		$days = 16;
	} elseif ($routeCode == 'C11' || $routeCode == 'C12') {
		// eXTREMO SUR  20 días
		$days = 20;

	} elseif ($routeCode == 'C16') {
		# 30 DÍAS CENABAST
		$days = 30;
	} elseif ($routeCode == 'ISLA DE PASCUA') {
		$days = 60;
		# 60 DÍAS
	}
	$date = estimatedDate($from, $days, $holyDaysDB);
	return $date;
	//return $days;
}
#..  Fecha estimada de retorno de radicación
function stimateReturn($from, $routeCode, $holyDaysDB) {
	$days = 0;
	if ($routeCode == 'C13') {
		// santiago  3 días
		$days = 3;
	} elseif ($routeCode == 'C01' || $routeCode == 'C02' || $routeCode == 'C03' || $routeCode == 'C04') {
		// Norte  9 días
		$days = 9;

	} elseif ($routeCode == 'C05' || $routeCode == 'C06' || $routeCode == 'C07') {
		// CENTRO  9 días
		$days = 9;

	} elseif ($routeCode == 'C08' || $routeCode == 'C09' || $routeCode == 'C10') {
		// sur  9 días
		$days = 9;

	} elseif ($routeCode == 'C11' || $routeCode == 'C12') {
		// eXTREMO SUR  9 días
		$days = 9;

	} elseif ($routeCode == 'C16') {
		$days = 9;

		# 9 DÍAS CENABAST
	} elseif ($routeCode == 'ISLA DE PASCUA') {
		# 9 DÍAS
		$days = 9;

	}

	$date = estimatedDate($from, $days, $holyDaysDB);
	return $date;

}
#..  FECHA ESTIMADA FACTURA DE TLS
function stimateDateSaleCheckTls() {

}

function estimatedDate($from, $days, $holidaysBD = array()) {

	$workingDays = [1, 2, 3, 4, 5];# date format = N (1 = Monday, ...)
	$holidayDays = ['*-12-25', '*-01-01', '*-05-01', '*-05-21', '*-09-18', '*-09-19'];# variable and fixed holidays
	$holidayDays = array_merge($holidayDays, $holidaysBD);
	$estimated   = new DateTime($from->format('Y-m-d'));
	$estimated->modify('+'.$days.' day');
	$interval = new DateInterval('P1D');
	$periods  = new DatePeriod($from, $interval, $estimated);
	$daysa    = 0;
	foreach ($periods as $period) {
		if (!in_array($period->format('N'), $workingDays)) {continue;
		}
		if (in_array($period->format('Y-m-d'), $holidayDays)) {continue;
		}
		if (in_array($period->format('*-m-d'), $holidayDays)) {continue;
		}
		$daysa++;
	}
	$diffDays = $days-$daysa;
	if ($diffDays > 0) {
		while ($diffDays >= 0) {
			if (in_array($estimated->format('*-m-d'), $holidayDays) || in_array($estimated->format('Y-m-d'), $holidayDays) || in_array($estimated->format('N'), $workingDays)) {
				$diffDays--;
			}
			$estimated->modify('+1 day');

		}
	}
	return $estimated;
}
function getDays($from, $holidaysBD = array()) {

	$from = new DateTime($from);
	$workingDays = [1, 2, 3, 4, 5];# date format = N (1 = Monday, ...)
	$holidayDays = ['*-12-25', '*-01-01', '*-05-01', '*-05-21', '*-09-18', '*-09-19'];# variable and fixed holidays
	$holidayDays = array_merge($holidayDays, $holidaysBD);
	$interval = new DateInterval('P1D');
	$periods  = new DatePeriod($from, $interval, new DateTime() );
	$daysa    = 0;
	foreach ($periods as $period) {
		if (!in_array($period->format('N'), $workingDays)) {continue;
		}
		if (in_array($period->format('Y-m-d'), $holidayDays)) {continue;
		}
		if (in_array($period->format('*-m-d'), $holidayDays)) {continue;
		}
		$daysa++;
	}
	return $daysa;
}