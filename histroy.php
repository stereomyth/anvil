<?php
    include("inc/globals.inc");
    include("inc/db_connect.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
</head>
<body>

<?php
    $html = '';
    $nem_count = 0;
    $em_count = 0;
    $fail_count = 0;
    $sql = 'Select * FROM test WHERE email = "james@crystalpresentations.com"';
    // $sql='Select * FROM test';

    $result = mysql_query($sql);
    if (!$result) {
        echo("Database error whilst reading information. 10");
        exit();
    } else {
        $nor = mysql_num_rows($result);
        if ($nor > 0) {
            echo('Number of items in DB - ' . $nor . '<br />');
            for ($i = 0; $i < $nor; $i++) {
                $row = mysql_fetch_array($result);
                $tt = $row['title'];
                $fn = $row['forename'];
                $sn = $row['surname'];
                $em = $row['email'];
                $tc = $row['telcode'];
                $tn = $row['telnum'];
                $sc = $row['score'];
                $vis = $row['visited'];
                $fullname = '';

                if ($em != '') {

                    //CONSTRUCT FULL NAME
                    if ($tt != '') {
                        $fullname .= $tt;
                    }
                    if ($fn != '') {
                        if ($fullname != '') {
                            $fullname .= ' ' . $fn;
                        } else {
                            $fullname .= $fn;
                        }
                    }
                    if ($sn != '') {
                        if ($fullname != '') {
                            $fullname .= ' ' . $sn;
                        } else {
                            $fullname .= $sn;
                        }
                    }
                    //BUILD EMAIL
                    $htmlmessage = 'mail content';

                    $to = $em;
                    $subject = "This Thursday at the Wine House";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                    $headers .= 'From: The Winehouse Lichfield<events@thewinehouselichfield.co.uk>' . "\r\n";

                    $sentOK = mail($to, $subject, $htmlmessage, $headers);

                    if ($sentOK) {
                        $em_count = $em_count + 1;
                    } else {
                        $fail_count = $fail_count + 1;
                        echo('Failed sending to: ' . $to . '<br />');
                    }

                } else {
                    $nem_count = $nem_count + 1;
                }
            }
        } else {

        }
        echo('Emails sent - ' . $em_count . '<br />');
        echo('Emails not sent as no email address - ' . $nem_count . '<br />');
        echo('Emails failed - ' . $fail_count . '<br />');
    }
?>


</body>
</html>
