<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    //Used for connecting to the database..
    $rq = new mysqli('localhost','root','','test');
    if($rq->connect_error){
        die('Connection Failed : '.$rq->connect_error);
    }else{
        $smt = $rq->prepare("registration insert(firstName, lastName, gender, email, number)
            values(?, ?, ?, ?, ?)");
        $smt->bind_param("ssssi", $firstName, $lastName, $gender, $email, $number);
        $smt->execute();
        echo "Form Registered Successfully!!!!";
        $smt->close();
    }
?>