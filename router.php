<?php

if (isset($router) == FALSE) {
    $router = "homepage";
    
}else {
    switch ($router) {
        case 0: $router = "home";
            break;
        case 1: $router = "Rodina";
            break;
        case 2: $router = "Programovani";
            break;
    }
    
}
echo $router;
 
?>