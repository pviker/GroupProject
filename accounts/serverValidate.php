<?php
/**
 * Created by PhpStorm.
 * User: Crunk_Baller
 * Date: 10/11/2015
 * Time: 9:01 PM
 */


function validateName($str)
{
    if ($str == ""){return false;}
    $str = cleanInput($str);

    if (preg_match("/^[a-zA-Z ]*$/", $str)) {
        return true;
    }else return false;
}
function validateAddress($str){
    if ($str == ""){
        return false;
    }else

    return $str;

}
function validateCity($str){
    if($str == ""){return false;
    }else

    return true;
}
function validateState($str){
    if($str == "" || $str == "Select"){
        return false;
    }else

    return true;
}
function validateZip($str){
    if($str == ""){return false;}
    $str = cleanInput($str);
    if (preg_match("/^[0-9]{5}([- ]?[0-9]{4})?$/",$str)){
        return true;
    }
    else {
        return false;
    }

}
function validatePhone($str){
    if($str == ""){return false;}
    $str = cleanInput($str);

    if (preg_match("/^[(]?[0-9]{3}[)]?-?[0-9]{3}-?[0-9]{4}$/", $str)){
        return true;
    }
    else return false;


}
function validateDOB($str){
    if($str == ""){return false;}

    return true;
}
function validateEmail($str){
    if($str == ""){return false;}

    $str = cleanInput($str);

    $cleanStr = filter_var($str,FILTER_SANITIZE_EMAIL);
    if (filter_var($cleanStr, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function validateUsername($str){
    if($str == ""){return false;}

    return true;
}
function validatePassword($str1,$str2){
    if($str1 == "" || $str2 == ""){return false;}
    $str1 = strip_tags($str1);
    $str2 = strip_tags($str2);

    if ($str1 === $str2) {
        return true;
    }
    else {
        return false;
    }
}
function validateGender($str){
    if($str == ""){return false;}
    if ($str == "male" || $str == "female"){
        return true;
    }else return false;
}
function cleanInput($str){
        $str = trim($str);
        $str = strip_tags($str);
        return $str;
    }



