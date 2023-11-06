<?php
date_default_timezone_set("Africa/Nairobi");

require 'layout.php';
require 'processes.php';
require 'verify_email.php';

$OBJ_Layout = new layout();
$OBJ_processes = new processes();



?>















<!-- // spl_autoload_register('ClassAutoLoad', true, true);
// function ClassAutoLoad($class){

//     $directories = array("resources","layout","processes");
//     foreach($directories as $dir){
//         $filename =  "../resources/$dir/$dir.php";

//         if (is_readable($filename)){
//             include $filename;
//         }
//     } -->

// }