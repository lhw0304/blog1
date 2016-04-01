define(["jquery"],function($){

	return {
		open:function(el){
			var that = this;
			
			$div=$('<div class="lightbox-img"><div class="loading"></div></div>').css(
					{
						top:0,
						left:0,
						right:0,
						bottom:0
					})
			var oImg= new Image();
			$(document.body).append($div);
			oImg.onload=function(){
				$div.append(this);

				$(this).fadeIn(800);
				
			}
			oImg.src= $(el).prev().attr("src");
			
			$(".loading").on("click",function(){
				that.close();
			})
		},
		close:function(){

			$div.fadeOut(1000,function(){
				$div.remove()
			});
		}		


		}
	

});