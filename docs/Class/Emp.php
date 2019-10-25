<?php
require_once 'Database.php';
date_default_timezone_set('Asia/Manila');

class Emp extends Database{
    public function NewEmp($emp_name, $emp_email, $emp_pass){
        $sql= "SELECT emp_name FROM emp WHERE emp_email = '$emp_email'";//check Email
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return 1;
        }else if($result->num_rows == 0){
            $sql = "INSERT INTO emp(emp_name, emp_email, emp_pass) VALUES ('$emp_name','$emp_email', '$emp_pass')";

            if($this->conn->query($sql)){
                $_SESSION["id"] = $row["emp_id"];
                header("Location: ../UI/signin.php"); 
            }else {
                echo "INSERT emp table ERROR".$this->conn->error();
            }
        }else{
            $content = $this->conn->error();
            $title = "Unexpected Error at NewEmp";
            $sql = "SELECT emp_email WHERE emp_status = 'SM'";
            $result=$this->conn->query($sql);
            $row = $result->fetch_assoc();
            mb_send_mail($row["emp_email"], $title, $content);
        }
    }

    public function SignInEmp($emp_email, $emp_pass){//ログイン
        $sql = "SELECT * FROM emp WHERE emp_email = '$emp_email' AND emp_pass = '$emp_pass'";
        $result=$this->conn->query($sql);
        
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            return $row;

        }else if($result->num_rows == 0){

        }else{
            $content = $this->conn->error();
            $title = "Unexpected Error at SignInEmp";
            $sql = "SELECT emp_email WHERE emp_status = 'SM'";
            $result=$this->conn->query($sql);
            $row = $result->fetch_assoc();
            mb_send_mail($row["emp_email"], $title, $content);
        }
    }

    public function TimeRecord($id, $date){
        $sql = "SELECT * FROM timerecord WHERE emp_id = '$id' AND date = '$date'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        $breaktime = strtotime($row["date"].$row["ebrk"]) - strtotime($row["date"].$row["sbrk"]);
        $worktime = strtotime($row["date"].$row["ewrk"]) - strtotime($row["date"].$row["swrk"])-$breaktime;
                            
        $bs = $breaktime%60;
        $ws = $worktime%60;
        $bm = (($breaktime - $bs)/60)%60;
        $wm = (($worktime - $ws)/60)%60;
        $bh = ($breaktime-($bm*60)-$bs)/3600;
        $wh = ($worktime-($wm*60)-$ws)/3600;
        $worktime = sprintf('%02d', $wh).':'.sprintf('%02d', $wm).':'.sprintf('%02d', $ws);
        $breaktime = sprintf('%02d', $bh).':'.sprintf('%02d', $bm).':'.sprintf('%02d', $bs);
        //work time & break time vality check
        if((isset($row["swrk"])) && (is_null($row["sbrk"])) && (is_null($row["ebrk"])) && (isset($row["ewrk"]))){
            $breaktime = '';
        }else if((isset($row["swrk"])) && (is_null($row["sbrk"])) && (is_null($row["ebrk"])) && (is_null($row["ewrk"]))){
            $worktime = $breaktime = '';
        }else if((isset($row["swrk"])) && (isset($row["sbrk"])) && (isset($row["ebrk"])) && (is_null($row["ewrk"]))){
            $worktime = '';
        }else if((is_null($row["swrk"])) && (is_null($row["sbrk"])) && (is_null($row["ebrk"])) && (is_null($row["ewrk"]))){
            $worktime = $breaktime = '';
        }else if($wh < 0 || $wm < 0 || $ws < 0 || $bh < 0 || $bm < 0 || $bs < 0){
            $worktime = $breaktime = '<span class="text-danger">ERROR</span>';
        }
        $row["worktime"] = $worktime;
        $row["breaktime"] = $breaktime;  
        return $row;
    }

    public function ModifyTimeRecord($date, $id){
        $sql = "SELECT * FROM timerecord WHERE date = '$date' AND emp_id = '$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    
    public function ModifyTimeRecordexe($timeid, $nswrk, $nsbrk, $nebrk, $newrk, $reason){

        $sql = "INSERT INTO app(timeid, swrk, sbrk, ebrk, ewrk, reason) VALUE ('$timeid', '$nswrk', '$nsbrk', '$nebrk', '$newrk', '$reason')";
        if($this->conn->query($sql)){
                $appliedsql = "UPDATE timerecord SET status = 'W' WHERE timeid = '$timeid'";
                if($this->conn->query($appliedsql)){
                    echo "sent successfully
                          <script>
                          setTimeout(function(){
                          window.location.href = '../UI/timerecord.php';
                          }, 1*1000);
                          </script>";
                    }else{
                        echo "update Error".$this->conn->error();;
                    }

        }else{
            echo "insert Error".$this->conn->error();
        }

    }

    public function PersonalInfo($id){
        $sql="SELECT emp_email, emp_phone, emp_birth, emp_pic FROM emp WHERE emp_id = '$id'";
        $result = $this->conn->query($sql);
        $myrow = $result->fetch_assoc();
        return $myrow;
    }

    public function ChangeMyInfo($id, $name, $email, $phone, $birth){
        $sql="UPDATE emp SET emp_name = '$name', emp_email = '$email', emp_phone = '$phone', emp_birth = '$birth' WHERE emp_id = '$id'";
        $result = $this->conn->query($sql);
        if($result){
            header("Location: ../UI/profile.php"); 
        }
    }

    public function ChangeMyAvatar($id, $newfilename){
        $sql = "UPDATE emp SET emp_pic='$newfilename' WHERE emp_id = '$id'";
        $result = $this->conn->query($sql);

        if($result){
            header("Location: ../UI/profile.php");
        }
    
    }

    public function ChangeMyPass($id, $oldpass, $newpass){
        $sql="SELECT emp_pass FROM emp WHERE emp_id = '$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        $original = $row["emp_pass"];
        if($original == $oldpass){
            $sql="UPDATE emp SET emp_pass = '$newpass' WHERE emp_id = '$id'";
            $result = $this->conn->query($sql);
            if($result){
                header("Location: ../UI/profile.php"); 
            }
        }else{
            echo 'current password is not correct.';
        }
    }

    public function StaffInfo(){
        $sql="SELECT emp_name, emp_phone, emp_birth, emp_pic FROM emp";
        $result = $this->conn->query($sql);

        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function HolidayTimeRecord($id){
        $sql="SELECT date FROM timerecord LEFT OUTER JOIN holiday_data ON timerecord.date = holiday_data.holiday_date 
        WHERE timerecord.emp_id = '$id' AND timerecord.status != 'H'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function HolidayRequest($id, $h_id, $target_date, $reason){
        $sql="SELECT * FROM timerecord WHERE emp_id = '$id' AND date = '$target_date'";
        $result=$this->conn->query($sql);
        if($result->num_rows == 0){
            $sql="INSERT INTO timerecord(emp_id, date, holiday_id, status) VALUE ('$id', '$target_date', '$h_id', 'W')";
            if($this->conn->query($sql)){
                $time_id = $this->conn->insert_id;
                $requestsql = "INSERT INTO app(timeid, sub, holiday_id, reason) VALUE ('$time_id', 'H', '$h_id', '$reason')"; 
                if($this->conn->query($requestsql)){
                    echo "sent successfully
                     <script>
                     setTimeout(function(){
                     window.location.href = '../UI/timerecord.php';
                     }, 1*1000);
                     </script>";
                    }else{
                        $sql="DELETE FROM timerecord WHERE timeid = '$time_id'";
                        $result=$this->conn->query($sql);
                        echo 'insert error to app table.'.$this->conn->error();
                    }
            }else{
                echo "insert Error".$this->conn->error();
            }
        }else{echo "you already applied on the day.";}
        
    }

    public function Opinion($op_subject, $op_content){
        $sql = "INSERT INTO opinions(op_subject, op_content) VALUE ('$op_subject', '$op_content')";
        if($this->conn->query($sql)){
                    echo "Thank you for your opinion. Sent successfully. 
                          <script>
                          setTimeout(function(){
                          window.location.href = '../UI/opinion.php';
                          }, 1*1000);
                          </script>";
                    }else{
                        echo "insert Error".$this->conn->error();
                    }

    }

    public function Application(){
        $sql="SELECT app.app_ID,
                     app.sentday,
                     app.swrk AS nswrk,
                     app.sbrk AS nsbrk,
                     app.ebrk AS nebrk,
                     app.ewrk AS newrk,
                     app.reason,
                     app.signed_ID,
                     timerecord.timeid,
                     timerecord.emp_id,
                     timerecord.date,
                     timerecord.swrk,
                     timerecord.sbrk,
                     timerecord.ebrk,
                     timerecord.ewrk,
                     timerecord.status,
                     emp.emp_name AS signedby
                     FROM app INNER JOIN timerecord
                     ON app.timeid = timerecord.timeid LEFT OUTER JOIN emp
                     ON app.signed_ID = emp.emp_id
                     WHERE app.sub='T' ORDER BY app.sentday ASC";
        $result=$this->conn->query($sql);

        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function ShowHolidayRequest(){
        $sql="SELECT app.app_ID,
                     app.sentday,
                     app.reason,
                     app.signed_ID,
                     timerecord.timeid,
                     timerecord.emp_id,
                     timerecord.status,
                     timerecord.date AS targetdate,
                     emp.emp_name AS signedby,
                     emp2.emp_name,
                     holiday_data.holiday_date AS swapdate
                     FROM app INNER JOIN timerecord
                     ON app.timeid = timerecord.timeid INNER JOIN emp AS emp2 ON emp2.emp_id = timerecord.emp_id LEFT OUTER JOIN emp
                     ON app.signed_ID = emp.emp_id LEFT OUTER JOIN holiday_data
                     ON app.holiday_id = holiday_data.holiday_id
                     WHERE app.sub='H' ORDER BY app.sentday ASC";
        $result=$this->conn->query($sql);

        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function ShowEmpName($emp_id){
        $sql = "SELECT emp_name FROM emp WHERE emp_id = $emp_id";
        $result=$this->conn->query($sql);
        $empname = $result->fetch_assoc();
        return $empname;
    }

    public function timerecordCange($signedid, $timeid, $nswrk, $nsbrk, $nebrk, $newrk, $appid, $status){
        if($status == 'A'){
        $sql = "UPDATE timerecord SET swrk = '$nswrk', sbrk ='$nsbrk', ebrk = '$nebrk', ewrk = '$newrk', status ='A' WHERE timeid = '$timeid'";
        $result = $this->conn->query($sql);
        if($result){
            $sql = "UPDATE app SET signed_ID ='$signedid' WHERE app_ID = '$appid'";
            $result = $this->conn->query($sql);
            if($result){
                echo "update successfully
                <script>
                setTimeout(function(){
                window.location.href = '../UI/application.php';
                }, 1*1000);
                </script>";
            }else{echo 'update app error';}   
        }
        }else if($status == 'R'){
        $sql = "UPDATE timerecord SET status ='R' WHERE timeid = '$timeid'";
        $result = $this->conn->query($sql);
            if($result){
                $sql = "UPDATE app SET signed_ID ='$signedid' WHERE app_ID = '$appid'";
                $result = $this->conn->query($sql);
                if($result){
                    echo "update successfully
                    <script>
                    setTimeout(function(){
                    window.location.href = '../UI/application.php';
                    }, 1*1000);
                    </script>";
                }else{echo 'update app error';}
            }else{echo 'update timerecord error';}
        }
    }

    public function HolidayApproval($signedid, $timeid, $appid, $status){
        if($status == 'A'){
            $sql = "UPDATE timerecord SET status ='H' WHERE timeid = '$timeid'";
            $result = $this->conn->query($sql);
            if($result){
                $sql = "UPDATE app SET signed_ID ='$signedid' WHERE app_ID = '$appid'";
                $result = $this->conn->query($sql);
                if($result){
                    echo "update successfully
                    <script>
                    setTimeout(function(){
                    window.location.href = '../UI/application.php';
                    }, 1*1000);
                    </script>";
                }else{echo 'update app error';}   
            }
        }else if($status == 'R'){
        $sql = "UPDATE timerecord SET status ='I', holiday_id = '0' WHERE timeid = '$timeid'";
        $result = $this->conn->query($sql);
            if($result){
                $sql = "UPDATE app SET signed_ID ='$signedid' WHERE app_ID = '$appid'";
                $result = $this->conn->query($sql);
                if($result){
                    echo "update successfully
                    <script>
                    setTimeout(function(){
                    window.location.href = '../UI/application.php';
                    }, 1*1000);
                    </script>";
                }else{echo 'update app error';}
            }else{echo 'update timerecord error';}
        }
    }

    public function ManagersInfo(){
        $sql = "SELECT emp.emp_id AS eid,
                       emp.emp_name,
                       emp.emp_email,
                       emp.emp_phone,
                       emp.emp_birth,
                       emp.emp_pic,
                       emp_status
        FROM emp WHERE emp_status = 'MG' OR emp_status = 'SE' OR emp_status = 'MT'";
        $result=$this->conn->query($sql);

        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function TeachersInfo(){
        $sql = "SELECT emp.emp_id AS eid,
                       emp.emp_name,
                       emp.emp_email,
                       emp.emp_phone,
                       emp.emp_birth,
                       emp.emp_pic,
                       emp_status,
                       emp_data.license,
                       emp_data.demo_lesson1,
                       emp_data.demo_lesson2,
                       emp_data.demo_lesson3,
                       emp_data.stud_evaluation
        FROM emp LEFT OUTER JOIN emp_data ON emp.emp_id = emp_data.emp_id
        WHERE emp_status = 'RT' OR emp_status = 'PB'";
        $result=$this->conn->query($sql);

        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }

    public function StudensInfo($today){
        $sql="SELECT * from students WHERE start_date <= '$today' AND end_date >= '$today' ORDER BY start_date ASC";
        $result = $this->conn->query($sql);
   
        $rows = array();
            while ($row = $result->fetch_assoc()){
            $rows[] = $row;
           }
        return $rows;
    }

    public function resetPass($email){
        $sql ="SELECT * from emp WHERE emp_email = '$email'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc(); 
            $emp_id = $row["emp_id"];

            $sql= "SELECT emp_id, reset_id, error FROM reset WHERE emp_id = '$emp_id' AND time_to_sec(timediff(NOW(), reset_time)) < 360 ";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc(); 
                $error = $row["error"] + 1;
                $reset_id = $row['reset_id'];
                $sql = "UPDATE reset SET error ='$error' WHERE reset_id =$reset_id";
                $result = $this->conn->query($sql);
            }
             $sql= "SELECT emp_id FROM reset WHERE error >= 5";
             $result = $this->conn->query($sql);
             if($result->num_rows == 1){
                 $row = $result->fetch_assoc();
                 $emp_id = $row["emp_id"];
                 $token = md5(uniqid(rand(),true));
                 $sql = "UPDATE emp SET emp_pass ='$token' WHERE emp_id ='$emp_id'";
                 $row = $result->fetch_assoc();
                 echo "Your password has changed since the system detected a suspicious access.<br>
                 Please ask System Manager to reset your account.
                 <!--<script>
                 setTimeout(function(){
                 window.location.href = '../index.php';
                 }, 5*1000);
                 </script>-->";
             }
            else{

            $token = md5(uniqid(rand(),true));
            $sql = "INSERT INTO reset(emp_id, email, token) VALUE ('$emp_id', '$email', '$token')";
            $result = $this->conn->query($sql);
            if($result){
                $title = "Reset Password";
                $sql = "SELECT emp_email FROM emp WHERE emp_status = 'SM'";
                $result=$this->conn->query($sql);
                $row = $result->fetch_assoc();
                $sm_email = $row["emp_email"];
                $header = "From: $sm_email\nReply-To: $sm_email\n";
                $content = 'Please click this URL within 20min to reset your password.<br>
                <a href="http://localhost/pt/docs/resetpass?'.$token.'">http://localhost/pt/docs/resetpass?'.$token.'</a>';
                //mb_send_mail($email, $title, $content, $header);
            }     
            }     
        }
        
        echo "Password reset URL has been sent to your email address.<br>
        Click the URL within 20min to reset a new password.
        <script>
        setTimeout(function(){
        window.location.href = '../index.php';
        }, 5*1000);
        </script>";
    }

    public function checkID($empID, $pass, $punch){
        $sql = "SELECT emp_id, emp_pass, emp_name FROM emp WHERE emp_id = '$empID'";
        $result =$this->conn->query($sql);
        $userData = $result->fetch_assoc();
        if(!empty($userData["emp_id"])){
            $dbpass = $userData["emp_pass"];
            $uname = $userData["emp_name"];
        
            if($pass == $dbpass){
                switch($punch){
                    case "swrk" :
                        $verb = "start work"; break; 
                    case "ewrk" :
                        $verb = "finish work"; break;
                    case "sbrk" :
                        $verb = "start break"; break;
                    case "ebrk" :
                        $verb = "finish break"; break;
                }
                
                $date = date('Y/m/d');
                $time = date('H:i:s');
                $sql ="SELECT * FROM timerecord WHERE emp_id = '$empID' AND date = '$date'";
                $result = $this->conn->query($sql);

                if($result->num_rows == 1){
                     $row = $result->fetch_assoc();
                     $status = $row["status"];
                     if(is_null($row[$punch])){
                         $sql = "UPDATE timerecord SET $punch = '$time' WHERE emp_id = '$empID' AND date = '$date'";
                         $result = $this->conn->query($sql);
                         if($status =="H"){
                             $message = "Hello, ".$uname.".<br> Is it your holiday today, isn't it? 
                             Please check your time card.";
                        
                         }else if($punch != "swrk" && is_null($row["swrk"])){
                             $message = "You didn't punch when you started work.<br>
                             please sign-in and check your time card.";
                        
                         }else if($punch == "ewrk"){
                             $message ='You '.$verb.' at '.$time.'<br>See you next day, take care!';

                         }else{
                         $message ='Hello again, '.$uname.'<br>
                         You '.$verb.' at '.$time.'<br>';
                        
                         }
                     }else{
                     $telltime = $row[$punch];
                     $message ='You have already punched at '.$telltime.'<br>
                     Please sign-in and apply to Manager to modify it.'.$count;
                     }
                }else if($result->num_rows == 0){
                    $sql = "INSERT INTO timerecord(emp_id, date, $punch) VALUE('$empID','$date','$time')";
                    $result = $this->conn->query($sql);
                    $message ='Hello, '.$uname.'.<br>
                    You '.$verb.' at '.$time;

                    if($punch != "swrk"){
                        $message = "You didn't punch when you started work.<br>
                        please sign-in and check your time card.";
                    }
                }
            }else{
                $message ='your ID or password is wrong. Please try again.';
            }
        }else{
            $message ='This ID is invalid. Please ask Manager.';
        }
        return $message;
    }

    public function RecentRecord($id){
        $sql="SELECT * FROM app INNER JOIN timerecord ON app.timeid = timerecord.timeid WHERE timerecord.emp_id = '$id' AND app.sentday between date_add(date(now()), interval -6 day) and date_format(now(), '%Y.%m.%d')";
        $result = $this->conn->query($sql);
        $rows = array();
        while ($row = $result->fetch_assoc()){
        $rows[] = $row;
       }
    return $rows;
    }

    public function Opinions(){
        $sql="SELECT * FROM opinions WHERE op_date between date_add(date(now()), interval -14 day) and date_format(now(), '%Y.%m.%d')";
        $result = $this->conn->query($sql);
        $rows = array();
        while ($row = $result->fetch_assoc()){
        $rows[] = $row;
       }
    return $rows;
    }

    public function Opcomment($opid, $comment){
        $sql = "UPDATE opinions SET comment ='$comment' WHERE op_id ='$opid'";
        $result = $this->conn->query($sql);
        if($result){
            header("Location: ../UI/index.php"); 
        }

    }
   
}
?>