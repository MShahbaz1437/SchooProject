<?php
session_start();
unset($_SESSION["fid"]);
header("location:facultylogin.php");

?>