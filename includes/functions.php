<?php

function path(){

    return $_SERVER["DOCUMENT_ROOT"] . "/myboxsystem/";
    
}
    


function send($path){
    header("Location: " . $path);
}


function goHome(){
    send(path());
}


function setSessionValue($key, $value){
    $_SESSION[$key] = $value;
}

function getSessionValue($key){
    return $_SESSION[$key];
}

function deleteSessionValue($key){
    
    unset($_SESSION[$key]);
    
}

function setFormValidation($formId,$messageArray){
    setSessionValue($formId,$messageArray);
}

function getFormValidation($formId){
    getSessionValue($formId);
}

function isFormValid($formId){
 
    $value = getSessionValue($formId);
    if(!isset($value))
        return true;
    
    if($value == null)
        return true;
    
    if(sizeof($value) > 0 )
        return false;
    
    return true;
    
}

function setError($msg){
    setSessionValue("ERROR_MESSAGE",$msg);
}

function isError(){
    return isset($_SESSION["ERROR_MESSAGE"]);
}

function getError(){
    if(isError())
        return getSessionValue("ERROR_MESSAGE");
    
}


function setSuccess($msg){
    setSessionValue("SUCCESS_MESSAGE",$msg);
}

function isSuccess(){
    return isset($_SESSION["ERROR_MESSAGE"]);
}


function getSuccess(){
    if(isSuccess())
    return getSessionValue("SUCCESS_MESSAGE");
}



?>