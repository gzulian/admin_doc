<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// FECHA ESTIMADA FACTURA DE LOG A SAC


function stimateDateLogicToSac($saleCheckDate,$routeCode){

	if ($routeCode == 'C13') {
	// santiago  7 días

	}elseif($routeCode == 'C01' || $routeCode == 'C02' || $routeCode == 'C03' || $routeCode == 'C04') {
	// Norte  16 días

	}elseif($routeCode == 'C05' || $routeCode == 'C06' || $routeCode == 'C07'){
	// CENTRO  7 días


	}elseif ($routeCode == 'C08' || $routeCode == 'C09' || $routeCode == 'C10') {
		// sur  16 días
	}elseif ($routeCode == 'C11' || $routeCode == 'C12') {
		// eXTREMO SUR  20 días

	}elseif ($routeCode == 'C16') {
		# 30 DÍAS CENABAST
	}elseif ($routeCode == 'ISLA DE PASCUA') {
		# 60 DÍAS 
	}
}

#..  FECHA ESTIMADA FACTURA DE TLS 
function stimateDateSaleCheckTls(){

}
