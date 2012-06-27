<?php

    include 'deets.php';

    $feedback = "";
    $error = false;

    function gogogoEmail() {

        $to = $_POST['to'];
        $subject = $_POST['title'];

        $headers = "From: Anvil System<anvil@crstl.co>" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = stripslashes($_POST['message']);
        $sentOK = mail($to, $subject, $message, $headers);

        if ($sentOK) {
            global $feedback;
            $feedback = 'Sent email to: ' . $_POST['to'];
        }
    }


    if ($_SERVER['HTTP_HOST'] != 'localhost') {
        gogogoEmail();
    } else {
        $feedback = "no email for locals fool!";
        $error = true;
    }

    echo json_encode(array("feedback" => $feedback, "error" => $error));


//echo($message);


