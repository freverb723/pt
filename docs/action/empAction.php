<?php
session_start();
require_once '../class/Emp.php';

$emp = new Emp;

if(isset($_POST["signup"])){
    $emp_name = $_POST["name"];
    $emp_email = $_POST["email"];
    $emp_pass = $_POST["password"];

    $emp->NewEmp($emp_name, $emp_email, $emp_pass);

}else if(isset($_POST["signin"])){
    $emp_email = $_POST["email"];
    $emp_pass = $_POST["password"];

    $emp->SignInEmp($emp_email, $emp_pass);

    $idn = $emp->SignInEmp($emp_email, $emp_pass);

    if($idn){
        $_SESSION["idn"] = $idn;
        header("Location: ../UI/index.php"); 
    }else{
        echo 'your email or password is not correct.';
    }
    
}else if(isset($_POST["apply"])){
    $timeid = $_POST["timeid"];
    $nswrk = $_POST["newswrk"];
    $nsbrk = $_POST["newsbrk"];
    $nebrk = $_POST["newebrk"];
    $newrk = $_POST["newewrk"];
    $reason = $_POST["reason"];

    $emp->ModifyTimeRecordexe($timeid, $nswrk, $nsbrk, $nebrk, $newrk, $reason);

}else if(isset($_POST["Request"])){
    $id = $_POST["emp_id"];
    $h_id = $_POST["swap"];
    $target_date = $_POST["targetdate"];
    $reason = $_POST["reason"];

    $emp->HolidayRequest($id, $h_id, $target_date, $reason);

}else if(isset($_POST["opinion"])){
    $op_subject = $_POST["subject"];
    $op_content = $_POST["content"];
   
    $emp->Opinion($op_subject, $op_content);

}else if(isset($_POST["ChangeMyInfo"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["tel"];
    $birth = $_POST["birth"];
   
    $emp->ChangeMyInfo($id, $name, $email, $phone, $birth);

}else if(isset($_POST["ChangeMyAvatar"])){
    $id = $_POST["id"];
    $avatar = $_FILES['pic']['name'];

    $target_dir = "../img/avatars/";
    $ext = substr($avatar, strrpos($avatar, '.') + 1);
    $newfilename = $id.'.'.$ext;
    $uploadfile = "$target_dir$newfilename";
    move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile);

    $emp->ChangeMyAvatar($id, $newfilename);

}else if(isset($_POST["ChangeMyPass"])){
    $id = $_POST["id"];
    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
   
    $emp->ChangeMyPass($id, $oldpass, $newpass);

}else if(isset($_POST["appSend"])){
    $signedid = $_POST["signedid"];
    $timeid = $_POST["timeid"];
    $nswrk = $_POST["nswrk"];
    $nsbrk = $_POST["nsbrk"];
    $nebrk = $_POST["nebrk"];
    $newrk = $_POST["newrk"];
    $appid = $_POST["appid"];
    $status = $_POST["status"];
   
    $emp->timerecordCange($signedid, $timeid, $nswrk, $nsbrk, $nebrk, $newrk, $appid, $status);

}else if(isset($_POST["hldSend"])){
    $signedid = $_POST["signedid"];
    $timeid = $_POST["timeid"];
    $appid = $_POST["appid"];
    $status = $_POST["status"];
   
    $emp->HolidayApproval($signedid, $timeid, $appid, $status);

}else if(isset($_POST["resetPass"])){
    $email = $_POST["email"];
   
    $emp->resetPass($email);

}else if(isset($_POST["opcomment"])){
    $opid = $_POST["op_id"];
    $comment = $_POST["comment"];
    echo $opid.$comment;
    $emp->Opcomment($opid, $comment);
}

?>
