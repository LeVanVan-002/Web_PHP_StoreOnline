<?php
class connect
{
	var $db=null;
	public function __construct() 
	{
		$dsn='mysql:host=localhost;dbname=cafestore1';
		$user='root';
		$pass='';
		try {
			$this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
		} catch (PDOException $e) {
			echo "Kết nối ko thành công";
		}
		
	}
//	https://megacode.vn/files/view/php-phuong-thuc-getinstance-la-gi-va-tai-sao-dung-getinstance-4922.html
//	lấy đúng 1 ID nên lấy fetch vô luôn
	public function getInstance($select)
	{
		$results=$this->db->query($select);
		// echo $select;
		$result=$results->fetch();
		return $result;
	}
	
//	Lấy nhiều rows
// phương thức của lớp connect thường là thực thi các câu truy vấn bên bảng
	public function getList($select)
	{
		$results=$this->db->query($select);// select * from hanghoa order by mahh DESC limit 12
		// echo $results;
		return($results);
	}
//	https://viblo.asia/p/cai-dat-ung-dung-php-thuan-su-dung-mvc-va-oop-4P856aA3lY3
// khi insert,update,delete 
	public function exec($query)
	{
		$results=$this->db->exec($query);
		// echo $results;
		return($results);
	}
	// viết phương thức thực thi là prepare riêng vì muốn sau này các phương thức khác gọi nó mà ko cần viết lại
	public function execP($query)
	{
		$statement=$this->db->prepare($query);
		return $statement;
	}
}
?>