$(function ($) {
	//弹出登录
	$("#appendLgBoxBtn").hover(function () {
		$(this).stop().animate({
			opacity: '1'
		}, 600);
	}, function () {
		$(this).stop().animate({
			opacity: '0.6'
		}, 1000);
	}).on('click', function () {
		$("body").append("<div id='mask'></div>");
		$("#mask").addClass("mask").fadeIn("slow");
		$("#LoginBox").fadeIn("slow");
    });
});