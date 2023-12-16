<?php
    $to = "sayfullayevnorbek@gmail.com";
    $sybject = "Tekshiruv";
    $message = "Salom emailga xat yuborish bu";
    $from = "sayfullayev1572norbek@gmail.com";

    if(mail($to, $subject, $message)){
        echo "emailga yuborildi";
    }
    else{
        echo "xato";
    }

?>
