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
    if(isset($_SESSION[$key]))
        return $_SESSION[$key];
}

function deleteSessionValue($key){
    
    unset($_SESSION[$key]);
    
}


function setFormValue($formName,$field,$value){
    $values = getSessionValue($formName."-VALUES");
    if(!isset($values)){
        $values = [];
        
    }
    $values[$field] = $value;
    setSessionValue($formName."-VALUES",$values);
    
}

function getFormValue($formName,$field){
    $values = getSessionValue($formName."-VALUES");
    if(!isset($values) || empty($values))
        return "";
    
    return getSessionValue($formName."-VALUES")[$field];
}

function isThereFormValue($formName,$field){
    $value = getSessionValue($formName."-VALUES".$field);
    return isset($value) && !empty($value);
}


function cleanFormValues($form){
    deleteSessionValue($form."-VALUES");
}


function setFormValidation($formId,$messageArray){
    setSessionValue($formId."-VALIDATION",$messageArray);
}

function getFormValidation($formId){
    return getSessionValue($formId."-VALIDATION");
}

function getFormValidationField($formId, $field){
    $formArray =  getSessionValue($formId."-VALIDATION");
    if(isset($formArray)){
        $errorMessage = $formArray[$field];
        
//        echo "<br><br>Error Message:<pre>";
//        var_dump($errorMessage);
//        echo "</pre><br><br>";
        
        return $errorMessage;
    }
}


function cleanFormValidation($form){
    deleteSessionValue($form."-VALIDATION");
}



function isValid($formId, $field){
    $formArray =  getSessionValue($formId."-VALIDATION");
    
//        echo "<br><br><pre>";
//        var_dump($formArray);
//        echo "</pre><br><br>";

    
    
    if(isset($formArray)){
        if(isset($formArray[$field]))
        {
            $fieldError = $formArray[$field];
            
            if(empty($fieldError))
                return true;
            else
                return false;
            
        }else
            return true;
    }else 
        return true;
}

function isFormValid($formId){
 
    $value = getSessionValue($formId."-VALIDATION");
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
    return isset($_SESSION["SUCCESS_MESSAGE"]);
}


function getSuccess(){
    if(isSuccess())
    return getSessionValue("SUCCESS_MESSAGE");
}


function cleanMessages(){
    deleteSessionValue("ERROR_MESSAGE");
    deleteSessionValue("SUCCESS_MESSAGE");

}

function displayMessages(){
    
    ?>
    
    <?php if(isError()): ?>
        <div class="alert alert-danger" role="alert">
           <?php  echo getError(); ?>
        </div>
        <?php endif; ?>
    
      
      <?php if(isSuccess()): ?>
       <div class="alert alert-success" role="alert">
           <?php  echo getSuccess(); ?>
        </div>
        <?php endif; ?>
    
    <?php
    cleanMessages();
}


?>