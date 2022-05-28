<?php
class DangNhap{
    var $user=null;
    var $pass=null;
    function __construct()
    {
        
    }
    function logAdmin($user, $pass)
    {
        $select="select * from admin where user='$user' and password='$pass'";
        $db=new connect();
        $result=$db->getList($select);
        $set=$result->fetch();
        return $set;
    }
}
?>
