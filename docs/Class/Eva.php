<?php
require_once 'Database.php';

class Eva extends Database{

    public function DemoLessonP($id){
        $sql="SELECT date, item, point, pro, con FROM evaluation WHERE emp_id = '$id' AND level = '1'"; 
        $result =$this->conn->query($sql);
        
        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function DemoLessonI($id){
        $sql="SELECT date, item, point, pro, con FROM evaluation WHERE emp_id = '$id' AND level = '2'"; 
        $result =$this->conn->query($sql);
        
        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function DemoLessonA($id){
        $sql="SELECT date, item, point, pro, con FROM evaluation WHERE emp_id = '$id' AND level = '3'"; 
        $result =$this->conn->query($sql);
        
        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function StudentVoices($id){
        $sql="SELECT comment.comment, students.stud_name FROM comment INNER JOIN students ON comment.stud_id = students.stud_id WHERE comment.emp_id = '$id'"; 
        $result =$this->conn->query($sql);
        
        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    
    }
}
?>