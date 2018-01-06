<?php

function isAdmin() {
	$ci       = &get_instance();
	$userData = $ci->session->userdata('logged_in');
	return in_array(1, $userData['permission']);
}
function isAsistant() {
	$ci       = &get_instance();
	$userData = $ci->session->userdata('logged_in');
	return in_array(2, $userData['permission']);
}
function isSupervisor() {
	$ci       = &get_instance();
	$userData = $ci->session->userdata('logged_in');
	return in_array(3, $userData['permission']);
}

?>