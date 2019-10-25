<?php
session_start();
require_once '../class/Emp.php';

$emp = new Emp;

if(isset($_POST["swrk"])){
	$empID = $_POST["empID"];
	$pass = $_POST["pass"];
	$punch = "swrk";

    $message = $emp->checkID($empID, $pass, $punch);
    if($message){
        $_SESSION["message"] = $message;
        header("Location: ../index.php"); 
    }

}else if(isset($_POST["ewrk"])){
	$empID = $_POST["empID"];
	$pass = $_POST["pass"];
	$punch = "ewrk";
    
    $message = $emp->checkID($empID, $pass, $punch);
    if($message){
        $_SESSION["message"] = $message;
        header("Location: ../index.php"); 
    }
    
}else if(isset($_POST["sbrk"])){
    $empID = $_POST["empID"];
	$pass = $_POST["pass"];
	$punch = "sbrk";

    $message = $emp->checkID($empID, $pass, $punch);
    if($message){
        $_SESSION["message"] = $message;
        header("Location: ../index.php"); 
    } 

}else if(isset($_POST["ebrk"])){
	$empID = $_POST["empID"];
	$pass = $_POST["pass"];
	$punch = "ebrk";

    $message = $emp->checkID($empID, $pass, $punch);
    if($message){
        $_SESSION["message"] = $message;
        header("Location: ../index.php"); 
    }

}else{
    $message  ='<br><br>';
    if($message){
        $_SESSION["message"] = $message;
        header("Location: ../index.php"); 
    }
}
								


?>