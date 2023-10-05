<?php
    require_once('connection.php');
    if(isset($_POST['create'])){
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $area = isset($_POST['area']) ? $_POST['area'] : '';
        $bed = isset($_POST['bed']) ? $_POST['bed'] : '';
        $bath = isset($_POST['bath']) ? $_POST['bath'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
        $garage = isset($_POST['garage']) ? $_POST['garage'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $adminid = $_POST['adminid'];

        if($name == "" || $location == "" || $type == "" || $status == "" || $area == "" || $bed == "" || $bath == "" || $desc == "" || $garage == "" || $price == ""){
            $error = 'All fields are required';
            header('Location: ../dashboard.php?error='.$error);
            return false;
        }

        $name = sanitize($connect, $name);
        $location = sanitize($connect, $location);
        $type = sanitize($connect, $type);
        $status = sanitize($connect, $status);
        $area = sanitize($connect, $area);
        $bed = sanitize($connect, $bed);
        $bath = sanitize($connect, $bath);
        $desc = sanitize($connect, $desc);
        $garage = sanitize($connect, $garage);
        $price = sanitize($connect, $price);
        $today = date('Y-m-d');

       
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
                    $location2 = 'post/'.$pic;
                    if(move_uploaded_file($fileTmp, $location2)){
                    
                        $sql = "INSERT INTO properties(adminid, name, location, ptype, status, area, bed, bath, garage, description, img, createddate, price) VALUES('$adminid', '$name', '$location', '$type', '$status', '$area', '$bed', '$bath', '$garage', '$desc', '$pic', '$today', '$price')";
                        $result = mysqli_query($connect, $sql);
                        if($result){
                            $success = 'Post Created';
                            header('Location: ../dashboard.php?success='.$success);
                            return false;
                        }else{
                            $error = 'error creating post';
                            header('Location: ../dashboard.php?error='.$error);
                            return false;
                        }
                    }else{
                        $error = 'error uploading file';
                        header('Location: ../dashboard.php?error='.$error);
                        return false;
                    }
                }else{
                    $error = 'upload pictures only';
                    header('Location: ../dashboard.php?error='.$error);
                    return false;
                }
            }else{
                $error = 'File uploaded is too large';
                header('Location: ../dashboard.php?error='.$error);
                return false;
            }
        }
    }else{
        $error = 'unauthorized access';
        header('Location: ../login.php?error='.$error);
        return false;
    }

?>