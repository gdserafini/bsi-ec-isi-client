<?php
    session_start();
    $url = dirname($_SERVER['SCRIPT_NAME']);                   
    $url = substr($url,strrpos($url,"\\/")+1,strlen($url));  
    if (substr_count($url, '/') >= 1){                          
        $url = substr($url,strrpos($url,"\\/"),strlen($url)); 
        $url = strstr($url, '/',true);
    }

    if(!$_SESSION['email']){                                    
        $url = "Location: /" . $url . "/index.php";             
        header($url);        
        exit();
    }