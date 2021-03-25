<?php 

function mailUser($email,$subject,$message,$sender){
        return (mail($email, $subject, $message, $sender));
}