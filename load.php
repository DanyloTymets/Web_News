<?php
session_start();
include("db.php");
include_once("functions/functions.php");
switch($_REQUEST['sAction']){ 
    default : 
    getProducts(); 
    break; 
    case'getPaginator'; 
    getPagination(); 
    break; 
} 
?> 