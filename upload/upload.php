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

	$name=$_POST["name"];
	//echo $name;
	// $time=$_POST["time"];
	$location=$_POST["location"];

		if (@is_uploaded_file($_FILES["file"]["tmp_name"])) {//判断文件选择框内是否选择了文件
			//加@忽略警告
			$md5file=md5_file($_FILES["file"]["tmp_name"]);//md5_file() 函数计算文件的 MD5 散列,MD5算法常常被用来验证网络文件传输的完整性，防止文件被人篡改

			$file=$_FILES["file"];//获取上传的文件数组
			//$filename=$file["name"];//获取原上传文件名，包括拓展名
			$filename=$name.'-'.$location.'-'.$file["name"];
			$filename = iconv('utf-8','gb2312',$filename); //利用Iconv函数对文件名进行重新编码
			

			$dir=iconv('utf-8','gb2312',$name);

				if (!file_exists($dir)){
           			 mkdir ($dir,0777,true);
           			 $re['dir']= '创建文件夹成功';
       			 } else {
          			 $re['dir']='需创建的文件夹已经存在';
       	 		}
			// echo $name;
			// echo $location;
			// echo $file['name'];
			move_uploaded_file($file['tmp_name'], "$dir/".$filename);//取出生成的临时文件存在$filename中

			$url="/upload/".$dir.'/'.$filename;
		
			$re["tip"]="success";

		}else{
			//echo "请选择一张照片上传";
			$re["tip"]="failed";
		}

	// 	if ($_FILES["file"]["error"] > 0)
	// {
 //  	  echo "错误：" . $_FILES["file"]["error"] . "<br>";
	// }
	// else
	// {	
 //    	echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
 //    	echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
 //    	echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 //    	echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
	// }	


 
$sql="SELECT * FROM users";
$result=$conn->query($sql);

if ($result->num_rows >= 0) {
   	 // 输出数据
  	  while($row = $result->fetch_assoc())
  	   {
  	  	//如果返回的是多条数据，函数 fetch_assoc() 将结合集放入到关联数组
       	 // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  	  		if (($row['name']==$name)&&($row['md5file']==$md5file)) {
  	  		# code...
				$re['tip']="该图片已上传";
				// $re['name']=$name1;
				// $re['sex']=$sex;
				// $re['password']=$password;
				$re=json_encode($re,JSON_UNESCAPED_UNICODE);
				echo $re;
				break;
  	  		}
		}
	}

				$url = iconv('gb2312','utf-8',$url);
  	  			$sql="INSERT INTO users(name,url,location,md5file)VALUES('$name','$url','$location','$md5file')";
				if ($conn->query($sql)) {
					# code...
					//echo "插入成功";
					$re['tip']="上传成功";
					$re['url']=$url;
					// $re['name']=$name1;
					// $re['sex']=$sex;
					// $re['password']=$password;
				}else{
						//echo "插入失败".$conn->error."<br>";
						$re['tip']="上传失败，请重新上传";
						$re['reason']=$conn->error;
				}
// 
	$re=json_encode($re,JSON_UNESCAPED_UNICODE);
	echo $re;
	//var_dump($_POST);
	//var_dump(file_get_contents("php://input"));
?>
