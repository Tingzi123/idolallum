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
$db="CREATE DATABASE web DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	//DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci指明字符编码

if (@$conn->query($db)===true) {
	// mysqli_query() 函数执行某个针对数据库的查询。
	echo "建库成功"."<br>";
	# code...
}else{
	echo "建库失败".$conn->error."<br>";
}

//创建数据表
mysqli_select_db($conn,"web");
$sql="CREATE TABLE users(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(20) NOT NULL,
	url VARCHAR(500) NOT NULL,
	location VARCHAR(50) NOT NULL,
	md5file VARCHAR(50) NOT NULL,
	uptime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	-- timestamp有两个属性，分别是CURRENT_TIMESTAMP 和ON UPDATE CURRENT_TIMESTAMP,
	-- 1.CURRENT_TIMESTAMP 当要向数据库执行insert操作时，如果有个timestamp字段属性设为 CURRENT_TIMESTAMP，则无论这个字段有没有set值都插入当前系统时间
	-- 2.   ON UPDATE CURRENT_TIMESTAMP当执行update操作是，并且字段有ON UPDATE CURRENT_TIMESTAMP属性。则字段无论值有没有变化，它的值也会跟着更新为当前UPDATE操作时的时间。

)DEFAULT CHARSET=UTF8";//设置数据表的字符编码

if ($conn->query($sql)===true) {
	echo "建表成功"."<br>";

}else{
	echo "建表失败".$conn->error."<br>";
}

?>