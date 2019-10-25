<?php
require_once 'Database.php';

class Stud extends Database{
   public function StudentsInfo($today){
     $sql="SELECT * from students WHERE start_date <= '$today' AND end_date >= '$today' ORDER BY start_date, stud_id";
     $result = $this->conn->query($sql);

     $rows = array();
         while ($row = $result->fetch_assoc()){
         $rows[] = $row;
        }

        $sql="SELECT * from students WHERE start_date > '$today' ORDER BY start_date, stud_id";
        $result = $this->conn->query($sql);
   
            while ($row = $result->fetch_assoc()){
            $rows[] = $row;
           }

       $sql="SELECT * from students WHERE end_date < '$today' ORDER BY start_date, stud_id";
       $result = $this->conn->query($sql);
   
            while ($row = $result->fetch_assoc()){
            $rows[] = $row;
           }
   

     return $rows;

   }

   public function StudentInfo($sid){
    $sql="SELECT * from students WHERE stud_id = '$sid'";
    $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
       
    return $row;

  }

  public function ChangeStud_m($sid, $stud_name, $gender, $start_day, $end_day, $stud_birth, $address, $email, $course, $v, $g, $note){
    $sql="UPDATE students SET stud_name = '$stud_name', stud_gender = '$gender', start_date = '$start_day', end_date ='$end_date',
    address = '$address', stud_email = '$email', stud_birth = '$stud_birth', stud_course = '$course', stud_v ='$v', stud_g ='$g', note = '$note'
    WHERE stud_id = '$sid'";
    $result = $this->conn->query($sql);
        if($result){
            header("Location: ../UI/students.php"); 
        }
  }

  public function ChangeStud_t($sid, $v, $g, $note){
    $sql="UPDATE students SET stud_v ='$v', stud_g ='$g', note = '$note' WHERE stud_id = '$sid'";
    $result = $this->conn->query($sql);
        if($result){
            header("Location: ../UI/students.php"); 
        }
  }
}
?>