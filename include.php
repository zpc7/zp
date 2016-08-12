<?php 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('prc');//解决时区问题
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'string.func.php';
require_once 'upload.func.php';
require_once 'image.func.php';
require_once 'page.func.php';
require_once 'configs.php';
require_once 'user.inc.php';
require_once 'company.inc.php';
require_once 'personal.inc.php';
require_once 'admin.inc.php';
require_once 'search.inc.php';

$tp=connect();

function alertMes($mes,$url){
	echo "<script>alert('{$mes}');</script>";
	echo "<script>window.location='{$url}';</script>";
}

// echo "<script src='js/jquery.min.js'></script>";