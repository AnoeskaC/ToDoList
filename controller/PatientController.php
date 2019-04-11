<?php 

function index(){
	$PatientsInfo = getAllPatients();
	render("hospital/index", array(
		'directory' => "hospital",
		'patients' => $PatientsInfo)
	);
}

function create()
{
	
	$PatientsInfo = getPatients();
	render("hospital/create", array(
	'directory' => "hospital",
	'patients' => $PatientsInfo,
	));
}

function createNewPatient()
{
	//var_dump($_POST);
	if (createPatient()) {
		header("location:" . URL . "hospital/index");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function editPatients($idP)
{	
	if (editPatient($idP)) {
		header("location:" . URL . "hospital/index");
		exit();
	} else {
		var_dump($_POST);
	}
}
