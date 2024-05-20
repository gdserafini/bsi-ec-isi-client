<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        $s_name = session_name();
        $offset = 600;
        $dateFormat = "d/m/Y h:i:s";
        $timeNDate = gmdate($dateFormat, time()-$offset);
        if(isset($_SESSION['LAST_ACTIVITY']) && 
            (time() - $_SESSION['LAST_ACTIVITY'] > $offset)){
                header("Location: logout.php");
        }
        $_SESSION['LAST_ACTIVITY'] = time(); 
      } 
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