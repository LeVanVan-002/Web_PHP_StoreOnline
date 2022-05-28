<?php
$action="gopy";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "gopy":
        include 'View/phpmailer.php';
        break;
    }
?>