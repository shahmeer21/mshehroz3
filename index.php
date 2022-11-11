<?php
    $name = $_GET['name'];
    $email = $_GET['email'];
    $message = $_GET['message'];

    //Database connection

    $conn = new mysqli('localhost','root','','mshehroz');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("INSERT INTO message_forum(Name, email, Message) values(?, ?, ?)");
        $stmt->bind_param("sss",$name, $email, $message);
        $stmt->execute();
        echo"Your message has been submitted!";
        $stmt->close();
        $conn->close();
    }
?>
