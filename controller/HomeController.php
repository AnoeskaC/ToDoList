<?php

require(ROOT . "model/ListModel.php");
require(ROOT . "model/JobModel.php");

function index() {
	render("home/index", array(
		'lists' => getAllLists()
	));
}
