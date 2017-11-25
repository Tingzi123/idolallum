<?php	
	error_reporting(E_ERROR);  //只报告致命错误 
	$servename="localhost";
	$username="root";
	$password="";
	$db="picture";


	$re['code']=200;
	//创建连接
	$conn=new mysqli($servename,$username,$password,$db);
	mysqli_set_charset($conn,"utf8");//设置连接过程中的字符编码
	if ($conn->connect_error) {
		die("连接失败".$conn->connect_error."<br>");
		# code...
	}

	$name1=$_POST['name1'];
	// $sex=$_POST['sex'];
	$password=md5($_POST['password']);


	$sql="SELECT name,password FROM users ";

	$result = $conn->query($sql);
 
	// if ($result->num_rows > 0) {
   	 // 输出数据
  	  while($row = $result->fetch_assoc())
  	   {
  	   	// echo "coming while";
  	  	//如果返回的是多条数据，函数 fetch_assoc() 将结合集放入到关联数组
       	 // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  	  		if (($row['name']==$name1)&&($row['password']==$password)) {
  	  		# code...
				session_start();
				$_SESSION['username']=$name1;
				//echo "coming session";
			
				$re['up']="ly";
				$re['tip']="登陆成功";
				$re['num']="true";
				$re['name']=$name1;
				// $re['sex']=$sex;
				$re['password']=$password;

				$re=json_encode($re,JSON_UNESCAPED_UNICODE);
				echo $re;
				exit;

  	  		}else {
 	   			$re['tip']="登陆失败";
 	   		//$re['up']="登陆失败";
 	   			$re['up']="ln";
			}
		}
	// }

	$re=json_encode($re);
	echo $re;	

	$conn->close();

	?>