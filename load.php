<?php
session_start();
include("db.php");
include_once("functions/functions.php");
if (isset($_REQUEST["sAction"])) {
    switch($_REQUEST['sAction']){ 
        case'getPaginator'; 
            getPagination(); 
            break; 
        default : 
            getProducts(); 
            break;   
    } 
}
?> 