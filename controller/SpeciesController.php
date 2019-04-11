<?php

function species()
{
	$SpeciesInfo = getAllSpecies();
	render("hospital/species", array(
		'directory' => "hospital",
		'species' => $SpeciesInfo)
	);
}

function create()
{
	$SpeciesInfo = getSpecies();
	$Geslachts = getGeslachts();
	render("hospital/create", array(
	'directory' => "hospital",
	'species' => $SpeciesInfo,
	'geslachts' => $Geslachts
	));
}

function createNewSpecies()
{
	//var_dump($_POST);
	if (createSpecies()) {
		header("location:" . URL . "hospital/species");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function editSpeciesPage($idS)
{
	$species = getSpecie($idS);
	render("hospital/edit" , array(
		'specie' => $species,
		'speciePage' => true
	));
}

function editSpecies($idC)
{
	if (editspecie($idC)) {
		header("location:" . URL . "hospital/species");
		exit();
	} else {
		var_dump($_POST);
	}
}

function deleteSpecies($idS)
{
	if (deleteSpecie($idS)) {
		header("location:" . URL . "hospital/species");
		exit();
	} else {
		var_dump($_POST);
	}
}