window.onload=start;
var timetoPic;
// var url=[
// 	{"url1":"../images/homepage1/underground1.png"},
// 	{"url1":"../images/homepage1/underground2.png"},
// 	{"url1":"../images/homepage1/underground3.png"}
// ]

var url=[
	"images/homepage1/underground1.png",
	"images/homepage1/underground2.png",
	"images/homepage1/underground3.png"
]

function start(){
	timetoPic=setInterval(change,1500);
}

var i=0;
var len=url.length;
function change(){
	i++;
	if (i>len-1) {
		i=i%len;
	};
	$('body').css("background-image","url('"+url[i]+"')");
	// console.log("coming change");
}

$("#sousuo").focus(function(){
	clearInterval(timetoPic);
	// alert("qingchu");
})

$("#sousuo").blur(function(){
	timetoPic=setInterval(change,1500);
	// alert("qingchu");
})

$(".zhuce,.denglu").click(function(){
	window.location="login.html";
})

$(".upload").click(function(){
	window.location="upload.html";
})

// $(".slide").focus(function(){
// 	$(".next").css({color,"black"});
// })
//滚屏
// function screenscroll(){
// 	$(window).resize(function(){
// 		//当调整浏览器窗口的大小时，发生 resize 事件，resize() 方法触发 resize 事件，或规定当发生 resize 事件时运行的函数。
// 		$(window).scrollTop(0);
// 		//$(selector).scrollTop(offset)，scrollTop() 方法返回或设置匹配元素的滚动条的垂直位置。
// 		//scroll top offset 指的是滚动条相对于其顶部的偏移。
// 		//如果该方法未设置参数，则返回以像素计的相对滚动条顶部的偏移。
// 		wintop=0;
// 	});

// 	$(document).scroll(function(){
// 		//当用户滚动指定的元素时，会发生 scroll 事件。scroll 事件适用于所有可滚动的元素和 window 对象（浏览器窗口）。
// 		//scroll() 方法触发 scroll 事件，或规定当发生 scroll 事件时运行的函数。
// 		var percent=($(document).height())*0.25;
// 		//$(document).height()  //是获取整个页面的高度
// 		//$(window).height() 是获取当前 也就是你浏览器所能看到的页面的那部分的高度  这个大小在你缩放浏览器窗口大小时 会改变 与document是不一样的
// 		if (status==false){
// 			var p=$(this).scrollTop();
// 			if (wintop<p){
// 				status=true;
// 				wintop+=percent;
// 				$("html body").animate({scrollTop:wintop},800,function(){status=0});
// 				$("#menu").animate({opacity:0.4},500);
// 			}
// 			else {
// 				if (wintop>p){
// 					status=true;
// 					wintop-=percent;
// 					$("html body").animate({scrollTop:wintop},800,function(){status=false});
// 					$("#menu").animate({opacity:1},500);
// 				}
// 			}
// 		}
// 	})
// }
// screenscroll();
// /*------page0*/
// //Interesting
// var flag=true;
// var INT=setInterval(function(){
// 	if (flag==true){
// 		$('.show[name=at0] img').attr('src','../images/1.png');
// 		flag=false;
// 	}
// 	else if (flag==false){
// 		$('.show[name=at0] img').attr('src','../images/2.png');
// 		flag=true;
// 	}
// },53);
// /*------page1*/
// 	var wintop=$(window).scrollTop();
// 	$(document).scroll(function(){
// 		if ($(this).scrollTop()==($(document).height())*0.25){
// 			$(".show[name=at1]").animate({"left": "15%"},1000,'swing');
// 		}
// 		else{
// 			setTimeout("$('.show[name=at1]').css('left','-100%')",300);
// 		}
// 	})
// }