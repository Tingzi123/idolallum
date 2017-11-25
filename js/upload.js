function showpic()
{
	$.ajax({
		url:"upload/show.php",
		type:"get",
		//data:value,
		cache: false,
		//布尔值，表示浏览器是否缓存被请求页面。默认是 true，设置为false，上传文件不需要缓存
		

		// $("form").serialize()和 new FormData($(‘#uploadForm‘)[0])都是序列化表单，实现表单的异步提交，但是二者有区别首先，前者，只能序列化表单中的数据 ，
		// 比如文本框等input  select等的数据，但是对于文件，比如文件上传，无法实现，那么这时候，FormData就上场了，new FormData使用需要有一个注意点，
		// 对于jquery的要求是，好像是 版本1.8及其以上方可支持。另外该对象不仅仅可以序列化文件，一样可以用作表单数据的序列化，（就是说包含了serialize()的功能）；

		processData: false,
		//布尔值，规定通过请求发送的数据是否转换为查询字符串。默认是 true。 设置为false。因为data值是FormData对象，不需要对数据做处理。

	    contentType: false,
	    // 发送数据到服务器时所使用的内容类型。默认是："application/x-www-form-urlencoded",application/x-www-form-urlencoded： 窗体数据被编码为名称/值对，
	    // 设置为false。因为是由<form>表单构造的FormData对象，且已经声明了属性enctype="multipart/form-data"，所以这里设置为false。

	    // 注意：processData: false, contentType: false,缺少这二者的设置，将会出现  红色部分的错误提示，提交失败。

	    async: false,
		 // 布尔值，表示请求是否异步处理。默认是 true

		success:function(data){

			
			var obj = JSON.parse(data);
			for(i=0;i<obj.picurl.length;i++)
			{
				count=i%5+1;
				var idname="#d"+count;
				var imgurl=obj.picurl[i];
			
				$(idname).append("<img src=."+imgurl+">");
				count++;
			};
			}
			
			
		
	})

} 


showpic();

$("#upload").click(function(){				
	fd=new FormData($('#uploadForm')[0]);
	//console.log($('#uploadForm'));
	$.ajax({
		url:"upload/upload.php",
		type:"post",
		//data:value,
		cache: false,
		//布尔值，表示浏览器是否缓存被请求页面。默认是 true，设置为false，上传文件不需要缓存
		
		data: fd,
		// $("form").serialize()和 new FormData($(‘#uploadForm‘)[0])都是序列化表单，实现表单的异步提交，但是二者有区别首先，前者，只能序列化表单中的数据 ，
		// 比如文本框等input  select等的数据，但是对于文件，比如文件上传，无法实现，那么这时候，FormData就上场了，new FormData使用需要有一个注意点，
		// 对于jquery的要求是，好像是 版本1.8及其以上方可支持。另外该对象不仅仅可以序列化文件，一样可以用作表单数据的序列化，（就是说包含了serialize()的功能）；

		processData: false,
		//布尔值，规定通过请求发送的数据是否转换为查询字符串。默认是 true。 设置为false。因为data值是FormData对象，不需要对数据做处理。

	    contentType: false,
	    // 发送数据到服务器时所使用的内容类型。默认是："application/x-www-form-urlencoded",application/x-www-form-urlencoded： 窗体数据被编码为名称/值对，
	    // 设置为false。因为是由<form>表单构造的FormData对象，且已经声明了属性enctype="multipart/form-data"，所以这里设置为false。

	    // 注意：processData: false, contentType: false,缺少这二者的设置，将会出现  红色部分的错误提示，提交失败。

	    async: false,
		 // 布尔值，表示请求是否异步处理。默认是 true

		success:function(data){

			showpic();
			}
		});
}
	)
