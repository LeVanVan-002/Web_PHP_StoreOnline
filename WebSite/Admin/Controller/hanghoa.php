<?php
$action="hanghoa";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action){
    case "hanghoa":
        include 'View/hanghoa.php';
        break;
}
?>