<?php
class ITEMS{
    var $mahh=null;
    var $tenhh=null;
    var $dongia=0;
    var $giamgia=0;
    var $hinh="image2/";
    var $nhom=0;
    var $maloai=null;
    var $dacbiet=0;
    var $soluotxem=0;
    var $ngaylap=null;
    var $mota=null;
    var $solt=0;
    var $tuyvi=null;
    public function __construct(){
        if(func_num_args()==13)
        {
            $this->mahh=func_get_arg(0);
            $this->tenhh=func_get_arg(1);
            $this->dongia=func_get_arg(2);
            $this->giamgia=func_get_arg(3);
            $this->hinh=func_get_arg(4);
            $this->nhom=func_get_arg(5);
            $this->maloai=func_get_arg(6);
            $this->dacbiet=func_get_arg(7);
            $this->soluotxem=func_get_arg(8);
            $this->ngaylap=func_get_arg(9);
            $this->mota=func_get_arg(10);
            $this->solt=func_get_arg(11);
            $this->tuyvi=func_get_arg(12);
        }
    }
   function getListHangHoaNew()
   {
       $select="select * from items order by mahh DESC limit 8";
       $db=new ketnoi();
       $result=$db->travedanhsach($select);
       return $result;
   }
   function getListHangHoaSale()
   {
       $select="select * from items where giamgia>0 limit 8";
       $db=new ketnoi();
       $result=$db->travedanhsach($select);
       return $result;
   }
   function getListHangHoaAll()
   {
       $select="select * from items";
       $db=new ketnoi();
       $result=$db->travedanhsach($select);
       return $result;
   }
   function getCountHangHoaAll()
   {
       $select="select count(*) from items";
       $db=new ketnoi();
       $result=$db->traVe($select);
       return $result[0];
   }
   function getListHangHoaSaleAll()
   {
       $select="select * from items where giamgia>0";
       $db=new ketnoi();
       $result=$db->travedanhsach($select);
       return $result;
   }
   function getListDetail($id)
   {
       $select ="select * from items where mahh=$id";
       $db=new ketnoi();
       $result=$db->traVe($select);
       return $result;
   }
   function getListDetailNhom($nhom)
   {
       $select ="select * from items where nhom=$nhom";
       $db=new ketnoi();
       $result=$db->travedanhsach($select);
       return $result;
   }
   function getSearch($search){
       $select="select * from items where tenhh like :tenhh";
       $db=new ketnoi();
       $stm=$db->execP($select);
       $stm->bindvalue(':tenhh',"%".$search."%");
       $stm->execute();
       return $stm;
   }
}
?>