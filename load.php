<?php
session_start();
require "includes/constants.php";
require "includes/dbConnection.php";
require "lang/en.php";

// Class Auto Load
function ClassAutoload($ClassName){
   $directories = ["forms", "tables", "structure", "lang", "global", "store", "ïncludes", "processes"];

   foreach($directories as $dir){
        $FileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $ClassName . '.php';
        
        if(file_exists($FileName) && is_readable($FileName)){
            require $FileName;
        }
   }
}
spl_autoload_register('ClassAutoload');


?>
