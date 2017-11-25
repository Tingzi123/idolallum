<?php
$servename="localhost";
	$username="root";
	$password="";
	$db="web";
	//error_reporting(E_ERROR);  //只报告致命错误
	$re['code']=200;
	//创建连接
	$conn=new mysqli($servename,$username,$password,$db);
	mysqli_set_charset($conn,"utf8");//设置连接过程中的字符编码
	if ($conn->connect_error) {
		die("连接失败".$conn->connect_error."<br>");
		// code...
	}


$count=0;

	$sql="SELECT * FROM users";
$result=$conn->query($sql);

if ($result->num_rows >= 0) {
   	 // 输出数据
  	  while($row = $result->fetch_assoc())
  	   {
				if($row['url'])
				{
					$re['picurl']["$count"]=$row['url'];
				
				
				$count++;
				}
				
  	  		}
	}
	$re=json_encode($re,JSON_UNESCAPED_UNICODE);
echo $re;
