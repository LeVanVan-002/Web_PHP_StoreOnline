<?php
class ketnoi
{
	var $db=null;
	public function __construct() 
	{
		$dsn='mysql:host=localhost;dbname=cafestore1';
		$user='root';
		$pass='';
		try {$this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
		} catch (PDOException $e) {echo "Kết nối database của bạn ko thành công";}
	}
	public function traVe($select)
	{
		$results=$this->db->query($select);
		$result=$results->fetch();
		return $result;
	}
	public function travedanhsach($select)  
	{
		$results=$this->db->query($select);
		return($results);
	}
	public function exec($query)
	{
		$results=$this->db->exec($query);
		return($results);
	}
	public function execP($query)
	{
		$statement=$this->db->prepare($query);
		return $statement;
	}
}
?>