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


?>