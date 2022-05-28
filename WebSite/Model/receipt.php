<?php
class RECEIPT{
    var $sohd=null;
    var $makh=null;
    var $ngaydat=null;
    var $tongtien=null;
    var $mahh=null;
    public function __construct()
    {
    }
    public function insertOrder($makh)//insertOrder
    {
        
        $date=new DateTime("now");
        $ngay=$date->format("Y-m-d");
        $query="insert into receipt(masohd,makh,ngaydat,tongtien)values(NULL,$makh,'$ngay',0)";
        $db=new ketnoi();
        $db->exec($query);
        $select="select masohd from receipt order by masohd desc limit 1";
        $result=$db->traVe($select);
        return  $result[0];
    }
    public function insertOrderDetail($masohd,$mahh,$soluong,$tuyvi,$thanhtien)
    {
        $query="insert into invoicedetails(masohd,mahh,soluongmua,tuyvi,thanhtien,tinhtrang) values($masohd,$mahh,$soluong,'$tuyvi',$thanhtien,0)";
        $db=new ketnoi();
        $db->exec($query);
    }
    function updateOrderTotal($masohd,$total)
    {
        $query="update receipt set tongtien=$total where masohd=$masohd"; 
        $db=new ketnoi();
        $db->exec($query);
    }
    function getOrder($sohdid)
    {
        $select="select b.masohd,a.tenkh,b.ngaydat,a.diachi,a.sodienthoai from client a 
        inner join receipt b on a.makh=b.makh where masohd=$sohdid";
        $db=new ketnoi();
        $result=$db->traVe($select);
        return $result;
    }
    function getOrderDetail($sohdid)
    {
        $select="select a.tenhh,a.dongia,b.tuyvi,b.soluongmua,b.thanhtien 
        from items a inner join invoicedetails b on a.mahh=b.mahh where masohd=$sohdid";
        $db=new ketnoi();
        $result=$db->travedanhsach($select);
        return $result;
    }
}
?>
