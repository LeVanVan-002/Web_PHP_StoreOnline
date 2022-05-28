<?php
class User{
    var $makh=0;
    var $tenkh=null;
    var $user=null;
    var $pass=null;
    var $email=null;
    var $diachi=null;
    var $sodt=null;
    var $vaitro=0;
    public function __construct(){}
   public function InsertUser($tenkh,$user,$matkhau,$email,$diachi,$dt)
    {
        $query="insert into client(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro) values(Null,?,?,?,?,?,?,default)";
        $db=new ketnoi();
        $stm=$db->execP($query);
        $stm->execute([$tenkh,$user,$matkhau,$email,$diachi,$dt]);
    }
    public function InsertUser1($tenkh,$user,$matkhau,$email,$diachi,$dt)
    {
        $query="insert into client(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro) values(Null,:tenkh,:username,:matkhau,:email,:diachi,:sodienthoai,default)";
        $db=new ketnoi();
        $stm=$db->execP($query);
        $stm->bindParam(':tenkh',$tenkh);
        $stm->bindParam(':username',$user);
        $stm->bindParam(':matkhau',$matkhau);
        $stm->bindParam(':email',$email);
        $stm->bindParam(':diachi',$diachi);
        $stm->bindParam(':sodienthoai',$dt);
        $stm->execute();
    }
    public function InsertUser2($tenkh,$user,$matkhau,$email,$diachi,$dt)
    {
        $query="insert into client(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro) values(Null,'$tenkh','$user','$matkhau','$email','$diachi','$dt',default)";
        $db=new ketnoi();
        $stm=$db->exec($query);   
    }
    public function login($username, $password)
    {
        $select="select * from client WHERE username='$username' and matkhau='$password'";
        $db=new ketnoi();
        $result=$db->travedanhsach($select);
        $set= $result->fetch();
        return $set;
    }
    public function insertComment($mahh,$makh,$noidung)
    {
        $query="insert into comment(mabl,mahh,makh,ngaybl,noidung)values(NULL,:mahh,:makh,:ngaybl,:noidung)";
        $date=new DateTime("now");
        $ngay=$date->format("Y-m-d");
        $db=new ketnoi();
        $stm=$db->execP($query);
        $stm->bindParam(':mahh',$mahh);
        $stm->bindParam(':makh',$makh);
        $stm->bindParam(':ngaybl',$ngay);
        $stm->bindParam(':noidung',$noidung);
        $stm->execute();
    }
    function displayComment($mahh)
    {
        $select="select a.username,b.noidung from client a INNER join comment b on a.makh=b.makh where  mahh=$mahh
        order by b.mabl desc";
        $db=new ketnoi();
        $result= $db->travedanhsach($select);
        return $result;
    }
    function tongcomment($mahh)
    {
        $select="select count(makh) from comment where mahh=$mahh";
        $db=new ketnoi();
        $result= $db->traVe($select);
        return $result;
    }
    function getEmail($email){
        $select="select email,matkhau from client where email='$email'";
        $db=new connect();
        $result=$db->getInstance($select);
        return $result;
    }
    function getPassEmail($email, $pass)
    {
        $select ="select email,matkhau from client where md5(email)='$email' and md5(matkhau)='$pass'";
        // select email, matkhau from client where md5(phptestly20@gmail.com)='405999d3a4fb8cddf893e238928c001'
        $db=new connect();
        $result= $db->getInstance($select);
        return $result;
    }
    function updateEmail($emailold,$passnew){
     $db=new connect();
     $query=" update client set matkhau='$passnew' where email='$emailold'";
     $db->exec($query);
    }
}
?>