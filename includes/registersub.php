<?php
    require_once('connection.php');
    if(isset($_POST['submit'])){
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $fac = isset($_POST['fac']) ? $_POST['fac'] : '';
        $twi = isset($_POST['twi']) ? $_POST['twi'] : '';
        $inst = isset($_POST['inst']) ? $_POST['inst'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';

        if($name == "" || $phone == "" || $email == "" || $password == "" || $fac == "" || $twi == "" || $inst == "" || $desc == ""){
            $error = 'All fields are required';
            header('Location: ../register.php?error='.$error);
            return false;
        }

        $name = sanitize($connect, $name);
        $phone = sanitize($connect, $phone);
        $email = sanitize($connect, $email);
        $password = sanitize($connect, $password);
        $fac = sanitize($connect, $fac);
        $twi = sanitize($connect, $twi);
        $inst = sanitize($connect, $inst);
        $desc = sanitize($connect, $desc);
        $today = date('Y-m-d');

        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($connect, $sql);
        if(mysqli_num_rows($res) > 0){
            $error = 'Email address already taken';
            header('Location: ../register.php?error='.$error);
            return false;
        }

        if(isset($_FILES['file'])){
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
                        $password = md5($password);
                        $sql = "INSERT INTO admin(name, phone, email, password, face, twit, insta, description, img, createddate) VALUES('$name', '$phone', '$email', '$password', '$fac', '$twi', '$inst', '$desc', '$pic', '$today')";
                        $result = mysqli_query($connect, $sql);
                        if($result){
                            $success = 'registration successful';
                            header('Location: ../login.php?success='.$success);
                            return false;
                        }else{
                            $error = 'error creating account';
                            header('Location: ../register.php?error='.$error);
                            return false;
                        }
                    }else{
                        $error = 'error uploading file';
                        header('Location: ../register.php?error='.$error);
                        return false;
                    }
                }else{
                    $error = 'upload pictures only';
                    header('Location: ../register.php?error='.$error);
                    return false;
                }
            }else{
                $error = 'File uploaded is too large';
                header('Location: ../register.php?error='.$error);
                return false;
            }
        }
    }else{
        $error = 'unauthorized access';
        header('Location: ../register.php?error='.$error);
        return false;
    }

?>