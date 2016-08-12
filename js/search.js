$(function() {
    //初始化得到默认数据
    getJobByCondition(1, 4, "", "jobtime desc");

    //给排序按钮注册点击事件
    $(document).on("click", "#js-order-ul li", function() {
        //改变样式
        //  $(this).addClass("active").siblings().removeClass("active");
        //改变隐藏域的值
        $("#js-order").val($(this).attr("data-order"));
        //从隐藏域取得最新的值
        var page = $("#js-page").val();
        var pageSize = $("#js-pagesize").val();
        var keywords = $("#js-keywords").val();
        var order = $("#js-order").val();
        //进行筛选
        getJobByCondition(page, pageSize, keywords, order);
    });

    //给搜索按钮注册事件
    $(document).on("click", "#js-btnsearch", function(e) {
        //取得文本框的值
        var keywords = $("#search").val();
        //更新隐藏域的值
        $("#js-keywords").val(keywords);
        //从隐藏域取得最新的值
        var page = $("#js-page").val();
        var pageSize = $("#js-pagesize").val();
        var keywords = $("#js-keywords").val();
        var order = $("#js-order").val();
        //进行筛选
        getJobByCondition(page, pageSize, keywords, order);

        if (keywords && keywords != "") {
            //阻止默认事件
            return false;
        } else {
            $("#search")[0].focus();
            $("#search").addClass("focus");
            //阻止默认事件
            return false;
        }
    });
    $("#js-btnsearch").trigger("click");

    //给分页按钮注册事件
    $(document).on("click", "#js-paging li", function(e) {
        //必须要能够点击才能执行以下操作
        if (!$(this).hasClass("disabled")) {
            //取得第几页
            var page = $(this).text().trim();
            console.log(page);
            if (page == "首页") {
                page = 1;
            }
            if (page == "尾页") {
                page = parseInt($("#js-totalpage").val());
                console.log(page);
            }
            if (page == "上一页") {
                page = parseInt($("#js-page").val()) - 1 < 1 ? 1 : parseInt($("#js-page").val()) - 1;
                console.log(page);
            }
            if (page == "下一页") {
                page = parseInt($("#js-page").val()) + 1 > parseInt($("#js-totalpage").val()) ? parseInt($("#js-totalpage").val()) : parseInt($("#js-page").val()) + 1;
                console.log(page);
            }
            //更新隐藏域的值
            $("#js-page").val(page);
            //从隐藏域取得最新的值
            var page = $("#js-page").val();
            var pageSize = $("#js-pagesize").val();
            var keywords = $("#js-keywords").val();
            var order = $("#js-order").val();
            //进行筛选
            getJobByCondition(page, pageSize, keywords, order);
            //阻止默认事件
            return false;
        }
    });
});

//按条件得到职位信息并更新页面相关区域的方法
function getJobByCondition(page, pageSize, keywords, order) {
    $.ajax({
        type: "post",
        url: "./doSearch.php?act=getJobByCondition",
        dataType: "json",
        data: {
            page: page,
            pageSize: pageSize,
            keywords: keywords,
            order: order
        },
        beforeSend: function() {
            return true;
        },
        success: function(data) {
            if (data != null && data.rows != null) {
                //更新按钮
                $("#js-paging").html(stylePagingBtn(data.page, data.totalpage));
                //更新职位列表
                var job_info = data.rows;
                $("#list-item-box").html("");
                for (i = 0; i < job_info.length; i++) {
                    htmlstr = "";
                    htmlstr += '<div class="list-item clearfix"><dl class="list-item-title">';
                    htmlstr += '<dt><a href="./inter/detail_job.php?id='+job_info[i].jobid+'">' + job_info[i].jobname + '</a></dt>';
                    htmlstr += '<dd>' + job_info[i].name + '</dd></dl>';
                    htmlstr += '<dl class="list-item-detail"><dt>&nbsp;</dt>';
                    htmlstr += '<dd><span class="glyphicon glyphicon-time"></span>' + job_info[i].jobtime + '</dd>';
                    htmlstr += '</dl>';
                    htmlstr += '<img src="uploads/' + job_info[i].logopath.split("/")[2] + '"></div>';
                    $("#list-item-box").append(htmlstr);
                }
                //更新排序方式的样式
                //      styleOrderLi("#js-order-ul li[data-order]:not([data-order=\""+data.order+"\"])");
                styleOrderLi("#js-order-ul li[data-order=\"" + data.order + "\"]");
                //更新隐藏域的值
                $("#js-keywords").val(data.keywords);
                $("#js-page").val(data.page);
                $("#js-pagesize").val(data.pagesize);
                $("#js-totalpage").val(data.totalpage);
                $("#js-order").val(data.order);
            }
        }
    });
}

//按条件重置排序方式按钮的样式的函数
function styleOrderLi(eStr) {
    //$(eStr).removeClass("active").siblings().eq(0).addClass("active");
    $(eStr).eq(0).addClass("active").siblings().removeClass("active");
}

//按条件重置按钮样式的函数
function stylePagingBtn(page, totalpage) {
    var page = page ? page : 1;
    var totalpage = totalpage ? totalpage : 1;
    var pagehtml = '<ul class="clearfix">';

    if (page == 1) {
        pagehtml += '<li class="disabled">首页</li>';
        pagehtml += '<li class="disabled">上一页</li>';
    } else {
        pagehtml += '<li>首页</li>';
        pagehtml += '<li>上一页</li>';
    }

    if (totalpage < 5) {
        for (i = 1; i <= totalpage; i++) {
            if (page == i) {
                pagehtml += '<li class="active">' + i + '</li>';

            } else {
                pagehtml += '<li>' + i + '</li>';
            }
        }
    } else {
        for (i = 1; i <= totalpage; i++) {
            if (page == i) {
                pagehtml += '<li class="active">' + i + '</li>';
            } else {
                if (Math.abs(page - i) <= 2 || (page <= 3 && Math.abs(page - i) <= Math.abs(page - 5))) {
                    pagehtml += '<li>' + i + '</li>';;
                }
            }
        }
    }

    if (page == totalpage) {
        pagehtml += '<li class="disabled">尾页</li>';
        pagehtml += '<li class="disabled">下一页</li>';
    } else {
        pagehtml += '<li>尾页</li>';
        pagehtml += '<li>下一页</li>';
    }
    return pagehtml;
}
