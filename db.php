<?php
$servename="localhost";
$username="root";
$password="";

//创建连接
$conn=new mysqli($servename,$username,$password);
mysqli_set_charset($conn,"utf8");//设置连接过程中的字符编码
if ($conn->connect_error) {
	die("连接失败".$conn->connect_error."<br>");
	# code...
}

//创建数据库
$db="CREATE DATABASE picture DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	//DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci指明字符编码

if (@$conn->query($db)===true) {
	// mysqli_query() 函数执行某个针对数据库的查询。
	echo "建库成功";
	# code...
}else{
	echo "建库失败".$conn->error."<br>";
}

//创建数据表
mysqli_select_db($conn,"picture");
$sql="CREATE TABLE users(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(20) NOT NULL,
	-- SEX CHAR(3) NOT NULL,
	password VARCHAR(50) NOT NULL
)DEFAULT CHARSET=UTF8";//设置数据表的字符编码

if ($conn->query($sql)===true) {
	echo "建表成功";

}else{
	echo "建表失败".$conn->error."<br>";
}

?>