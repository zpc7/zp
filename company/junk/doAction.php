<?php
include "../include.php";



$fileInfo=$_FILES['logoFile'];
$info=uploadFile($fileInfo);
echo $info;

