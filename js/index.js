require(["jquery","mask"],function($,ob){
	var $close=$(".closeBtn"),
	$open=$(".openBtn");
	$open.on("click",function(){
		$(".nav").animate({top:0});
	});
	$close.on("click",function(){
		$(".nav").animate({top:-195});
	});

// zczxc,,,,,,,,,,,,,,,,
	
	var $li=$("#port ul li"),
	$mask=$("#port ul li .mask");
	$mask.hover(function(){
		$(this).stop().animate({opacity:0.5});
		$(this).prev().stop().animate({
			width: 300,
			height: 220,
			marginLeft: -10,
			marginTop: -10
		})
	},function(){
		$(this).stop().animate({opacity:0});
		$(this).prev().stop().animate({
			width: 290,
			height: 210,
			marginLeft: 0,
			marginTop: 0
		});
	});

	$mask.on("click",function(){
		ob.open(this);
	});
	
	$(".about").on("click",function(){
		$(document.body).animate({scrollTop:830},400)
	})
	$(".services").on("click",function(){
		$(document.body).animate({scrollTop:1436},400)
	})
	$(".portfolio").on("click",function(){
		$(document.body).animate({scrollTop:2186},400)
	})
	$(".blog").on("click",function(){
		$(document.body).animate({scrollTop:2805},400)
	})
	$(".contact").on("click",function(){
		$(document.body).animate({scrollTop:4505},400)
	})
	$(".gotop").on("click",function(){
		$(document.body).animate({scrollTop:0},400)
	})
	$(window).on('scroll',function(){
		if($(window).scrollTop()>1){
			$('.gotop').fadeIn();
		}else{
			$('.gotop').fadeOut();
		}
		
	});
	$(function(){
		$blogHeadSection = $('#blog .head-section');
		var iHeadSectionTop = $blogHeadSection.offset().top,
				iHeadSectionHeight = $blogHeadSection.height();
		var bLoad = true;//判断是否该加载新数据
		var bLoaded = false;//判断本次请求的数据是不是加载完毕
		var isEnd = false;//判断是不是加载完数据库中的所有数据
		var page = 0;//控制分页

		function getMinUl(){
			$blogList = $('.blog-list');
			var $minUl =  $blogList.eq(0);
			for(var i=1; i<$blogList.length; i++){
				if($blogList.eq(i).height() < $minUl.height()){
					$minUl = $blogList.eq(i);
				}
			}
			return $minUl;
		}



		$(window).on('scroll', function(){

			if($(window).height()+$(window).scrollTop() >= iHeadSectionTop+iHeadSectionHeight && !isEnd){
				if(bLoad){
					bLoad = false;
					$.get('welcome/get_articles?page='+page, function(res){
						if(!res.isEnd){
							for(var i=0; i<res.data.length; i++){
								var blog = res.data[i];
								var html = '<li>'
										+ '<a href="welcome/detail?blog_id='+blog.blog_id+'"><img src="img/blog-post.jpg" title="name" /></a>'


										+ '<h3><a href="#">'+blog.title+'</a></h3>'
										+ '<span>'+blog.username+' | <a href="#">'+blog.add_time+'</a></span>'
										+ '<p>'+blog.content+'</p>'
										+ '<a class="a" href="welcome/detail?blog_id='+blog.blog_id+'">more</a>'


										+ '</li>';



								var $minUl = getMinUl();
								$minUl.append(html);
							}
							bLoaded = true;
							page += 6;
						}else{
							isEnd = true;
						}
					}, 'json');

				}


				var $minUl = getMinUl();
				if($(window).height()+$(window).scrollTop() >= $minUl.offset().top+$minUl.height() && bLoaded){
					bLoad = true;
					bLoaded = false;
				}
			}


		});
	});
});