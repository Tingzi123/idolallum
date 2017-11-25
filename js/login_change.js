//切换注册登录
$("#p_register").click(function(){
	$("#register3").css("zIndex",2000);
	$("#login2").css("zIndex",-200);
	
});

$("#p_login").click(function(){
    $("#register3").css("zIndex",-200);
	$("#login2").css("zIndex",2000);
	

});

