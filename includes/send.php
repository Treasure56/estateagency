<?php
    require_once('connection.php');
    if(isset($_POST['submit'])){
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $pid = $_POST['pid'];
        $adminid = $_POST['adminid'];
        $pname = $_POST['pname'];

        if($name == "" || $phone == "" || $email == "" || $comment == ""){
            $error = 'All fields are required';
            header('Location: ../property-single.php?error='.$error.'&pid='.$pid);
            return false;
        }

        $name = sanitize($connect, $name);
        $phone = sanitize($connect, $phone);
        $email = sanitize($connect, $email);
        $comment = sanitize($connect, $comment);
        $today = date('Y-m-d');

        $sql = "INSERT INTO messages(adminid, pname, name, email, phone, comment, createddate) VALUES('$adminid', '$pname', '$name', '$email', '$phone', '$comment', '$today')";
        $res = mysqli_query($connect, $sql);
        if($res){
            $success = 'message sent, realtor will get back to you shortly';
            header('Location: ../property-single.php?success='.$success.'&pid='.$pid);
            return false;
        }
        else{
            $error = 'error sending message';
            header('Location: ../property-single.php?error='.$error.'&pid='.$pid);
            return false;
        }
        
    }else{
        $error = 'unauthorized access';
        header('Location: ../property-single.php?error='.$error.'&pid='.$pid);
        return false;
    }

?>