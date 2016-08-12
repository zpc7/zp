// 标签页制作
$("ul.tab li").click(function() {
	var index= $(this).index(); 
    $(this).addClass("active").siblings("li").removeClass("active");
    $(".content-left").hide().eq(index).fadeIn();
});
$("ul.tab").find("li").eq(0).trigger("click");
