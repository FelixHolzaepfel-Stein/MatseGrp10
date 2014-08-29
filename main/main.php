<?php
require('../lib/Database.class.php');
require('../lib/User.class.php');
require ('../lib/Template.class.php');

session_start(); 
$id = $_SESSION['id'];	

$tpl = new Template();
$tpl->assign( 'name',User::getNameByID($id));
$tpl->assign( 'points',User::getPointsByID($id));
$tpl->display('../templates/main.tpl');

?>