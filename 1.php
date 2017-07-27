<?php
session_start();


$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();


$a = $_SESSION['favcolor'];
echo $a;