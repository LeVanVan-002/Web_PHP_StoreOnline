<?php
class HangHoa{
    function __construct()
    {
        
    }
    // viết pt thống kê số lượng bán của tất cả các mặt hàng
    function getListThongKeSLB()
    {
        $select="select a.tenhh,sum(b.soluongmua) soluongban from items a, invoicedetails b WHERE a.mahh=b.mahh GROUP by a.tenhh";
        $db=new connect();
        $result=$db->getList($select);
        return $result;
    }
}
?>