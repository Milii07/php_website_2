<?php
   
declare(strict_types=1);

function is_input_empty($pwd,  $email) 
{
    if (empty($pwd)|| empty($email)) {
        return true;
    } else {
        return false;
    }
}

function is_email_wrong($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong($pwd,$hashedPwd)
{
    if(empty($pwd)){
        return true;

    } else {
        if(empty($hashedPwd)){
            return true;

        } else {
            if(md5($pwd) != $hashedPwd){
                return true;
            } else {
                return false;
            }
        }
    }
}