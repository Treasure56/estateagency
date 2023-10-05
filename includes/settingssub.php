<?php
    require_once('connection.php');
    if(isset($_POST['submit'])){
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $fac = isset($_POST['fac']) ? $_POST['fac'] : '';
        $twi = isset($_POST['twi']) ? $_POST['twi'] : '';
        $inst = isset($_POST['inst']) ? $_POST['inst'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
        $adminid = $_POST['adminid'];
        $img = $_POST['img'];

        if($name == "" || $phone == "" || $fac == "" || $twi == "" || $inst == "" || $desc == ""){
            $error = 'All fields are required';
            header('Location: ../settings.php?error='.$error);
            return false;
        }

        $name = sanitize($connect, $name);
        $phone = sanitize($connect, $phone);
        $fac = sanitize($connect, $fac);
        $twi = sanitize($connect, $twi);
        $inst = sanitize($connect, $inst);
        $desc = sanitize($connect, $desc);



        if($_FILES['file']['name'] !=''){
            $allow = array('png', 'jpeg', 'jpg', 'gif', 'heic');
            $filename = $_FILES['file']['name'];
            $fileTmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $fileext = explode('.', $filename);
            $fileActualext = strtolower(end($fileext));
            
          
            
            if($filesize < 800000){
                if(in_array($fileActualext, $allow)){
                    $pic = uniqid('',true).'.'.$fileActualext;
                    $location = 'dp/'.$pic;
                    if(move_uploaded_file($fileTmp, $location)){
                       


                       $sql = "UPDATE `admin` SET `name` = '$name', `phone` = '$phone', `face` = '$face', `twit` = '$twit', `insta` = '$inst', `description` = '$desc', `img` = '$pic' WHERE `id` = '$adminid'";


                        $result = mysqli_query($connect, $sql);
                        if($result){
                            unlink('dp/'.$img);
                            $success = 'profile uploaded';
                            header('Location: ../settings.php?success='.$success);
                            return false;
                        }else{
                            $error = 'error creating account';
                            header('Location: ../settings.php?error='.$error);
                            return false;
                        }
                    }else{
                        $error = 'error uploading file';
                        header('Location: ../settings.php?error='.$error);
                        return false;
                    }
                }else{
                    $error = 'upload pictures only';
                    header('Location: ../settings.php?error='.$error);
                    return false;
                }
            }else{
                $error = 'File uploaded is too large';
                header('Location: ../settings.php?error='.$error);
                return false;
            }
        }else{
            $sql = "UPDATE `admin` SET `name` = '$name', `phone` = '$phone', `face` = '$face', `twit` = '$twit', `insta` = '$inst', `description` = '$desc',  WHERE `id` = '$adminid'";


            $result = mysqli_query($connect, $sql);
            if($result){
                unlink('dp/'.$img);
                $success = 'profile updated';
                header('Location: ../settings.php?success='.$success);
                return false;
            }else{
                $error = 'error creating account';
                header('Location: ../settings.php?error='.$error);
                return false;
            } 
        }
    }else{
        $error = 'unauthorized access';
        header('Location: ../settings.php?error='.$error);
        return false;
    }

?>