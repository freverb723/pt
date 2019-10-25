<?php
session_start();
require_once '../class/Stud.php';

$stud = new Stud;

if(isset($_POST["ChangeStud_m"])){
    $sid = $_POST["sid"];
    $stud_name = $_POST["stud_name"];
    $gender = $_POST["gender"];
    $start_day =$_POST["start_day"];
    $end_day =$_POST["end_day"];
    $stud_birth =$_POST["stud_bday"];
    $address =$_POST["address"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    $v = $_POST["stud_v"];
    $g = $_POST["stud_g"];
    $note = $_POST["note"];

    $stud->ChangeStud_m($sid, $stud_name, $gender, $start_day, $end_day, $stud_birth, $address, $email, $course, $v, $g, $note);

}else if(isset($_POST["ChangeStud_t"])){
    
    $sid = $_POST["sid"];
    $v = $_POST["stud_v"];
    $g = $_POST["stud_g"];
    $note = $_POST["note"];

    $stud->ChangeStud_t($sid, $v, $g, $note);
   
}

?>
