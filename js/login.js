function getvalue1(){
	var a=document.getElementById('name1').value;
	
	var c=document.getElementById('password1').value;
	data1={
		name1:a,
		// sex:b,
		password:c
	};
	return data1;
}

$("#tip").hide();
// alert("tip");

$("#register").click(function(){
	// alert("good")
		value1=getvalue1();

		$.ajax({
		url:"register.php",
		type:"post",
		data:value1,
	success:function(result){
		//alert(result);
		var obj = JSON.parse(result);
		//console.log(obj);
		// alert(obj.tip);
		if (obj.up=="ry") {
			$("#tip").show();
			$("#tipimg").attr('src', 'images/login/success.png');
			window.location="homepage2.html"
		};
	}

  })
});



function getvalue2(){
	var a=document.getElementById('name2').value;
	// var b=document.getElementById('sex').value;
	var c=document.getElementById('password2').value;

	data2={
		name1:a,
		// sex:b,
		password:c
	};
	return data2;
}

$("#login").click(function(){
	// alert("good")
		value2=getvalue2();

		$.ajax({
		url:"login.php",
		type:"post",
		data:value2,
	success:function(result){
		// alert(result);
		var obj = JSON.parse(result);
		// console.log(obj);
		// alert(obj.tip);
		if (obj.up=="ln") {
			$("#tip").show();
			$("#tipimg").attr('src','images/login/wrong.png');
		}else if(obj.up=="ly"){
			$("#tip").show();
			$("#tipimg").attr('src','images/login/denglusuccess.png');
		}
		var num=obj.num;
		if (num=="true") {
			window.location="homepage2.html";
		}	
	}

  })
});

$("#btn,#login3,#register3").click(function(){
	$("#tip").hide();
})
// $("#repassword").click(function(){
// 	window.location="location://www.repassword.html";
// 	value=getvalue();

// 		$.ajax({
// 		url:"repassword.php",
// 		type:"post",
// 		data:value,
// 	success:function(result){
// 		//alert(result);
// 		var obj = JSON.parse(result);
// 		console.log(obj);
// 		alert(obj.tip);
// 		var tip=obj.tip;
// 		 if (tip=="登陆成功") {
// 			window.location="http://www.baidu.com";
// 		 }	
// 	}

//   })
// })
