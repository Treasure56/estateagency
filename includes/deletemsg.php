<?php
    require_once('connection.php');

    if(isset($_GET['mid'])){
        $id = $_GET['mid'];
        
        $sql = "DELETE FROM messages WHERE id = '$id'";
        $res = mysqli_query($connect, $sql);
        if($res){
            header('Location: ../messages.php');
            return false;
        }else{
            header('Location: ../messages.php');
            return false;
        }
    }else{
        header('Location: ../');
        return false;
    }
?>