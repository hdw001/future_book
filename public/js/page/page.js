/*jQuery page 通用分页*/

var page = {

    //是否正在请求
    is_get: false,

    //当前页码
    current_page: 0,

    //当前数据总数
    current_total: 0,

    //当前数据总页数
    current_page_total: 0,

    //改变页面
    change: function(page, fn, obj) {

        //若正在请求
        if (self.is_get) {
            return false;
        }

        if (isNaN(page) || 1 > page) {
            return false;
        }

        var page_total = parseInt(obj.find(".page_total").text());
        if (page > page_total) {
            page = page_total;
        }

        eval(fn + "(" + page + ");");
    },

/*
        设置每页显示数输入框
    
        需在初始化分页前初始化
        page.set_limit("page_limit", "select", function(a){
            list(a);
        });

        //取值
        var _obj=$(".page_limit")
        var _limit=_obj.find(":focus").val() || _obj.find("input:last").val() || 10;
    */
    set_limit: function(a, t, fn) {

        var self = this;
        var obj = $("." + a);

        if (t == "select") {
    
            var str = '<select class="limit">'
            + '<option value="10">10</option>'
            + '<option value="30">30</option>'
            + '<option value="50">50</option>'
            + '<option value="100">100</option>'
            + '</select>';
            obj.html(str);

            var init_select = function() {
                    obj.find("select").each(function(i) {
                        $(this).attr("id", a + "_" + i);
                        if (typeof $.fn.jq_select == "function") {
                            //jq_select插件模拟下拉框
                            $("#" + a + "_" + i + "_div").remove();
                            $("#" + a + "_" + i).jq_select({
                                width: 80,
                                select_height: 25
                            });
                        }
                    });
                }

            init_select();

            obj.find("select").unbind("change").change(function() {
                var v = $(this).val();
                var num = Math.ceil(self.current_total / parseInt(v));
                num < self.current_page_total && self.current_page > num && (self.current_page = num);
                obj.find("select").each(function() {
                    $(this).find("option").attr("selected", false);
                    $(this).find("option[value='" + v + "']").attr("selected", "selected");
                });
                init_select();
                fn(self.current_page);
            });
        }

        if (t == "input") {
            obj.html('<input class="limit" value="10">');
            obj.find("input").unbind("keydown").keydown(function(event) {

                var key_code = event.which || event.keyCode;
                if (13 == key_code) {

                    var num = Math.ceil(self.current_total / parseInt($(this).val()));
                    num < self.current_page_total && self.current_page > num && (self.current_page = num);

                    fn(self.current_page);

                    obj.find("input").val($(this).val());
                    $(this).blur();

                }

            });
        }

    },


/*
        分页
        参数类型{}
    */
    go: function(param) {

        var self = this;

        //参数列表
        var get_page = param.page || 1; // 当前是第几页
        var data_total = param.total || 0; // 数据总数是多少(实际根据返回json中的总数数值获取)
        var limit = param.limit || 1; // 每页显示多少条数
        var show_num = param.show_num || 2; // 前页码左右两边显示的页码数量（默认为2个）
        var insert_pagination_obj = param.class; // 用于显示页码的class名称（必须是class）
        var callback_function = param.fn; // 分页回调方法名（也可以是obj.list这种格式）
        var hide_info = param.hide_info ? true : false; // 是否显示分页信息（默认为显示）
        var hide_goto = param.hide_goto ? true : false; // 是否显示跳转信息（默认为显示）
        var hide_loading = param.hide_loading ? true : false; // 是否显示loading图标（默认为显示）

        var hide_info_str = "";
        if (hide_info) {
            hide_info_str = ' style="display:none;"';
        }
        var hide_goto_str = "";
        if (hide_goto) {
            hide_goto_str = ' style="display:none;"';
        }

        self.is_get = false;
        self.current_page = get_page;
        self.current_total = data_total;

        //有数据则开始分页
        if (0 < data_total) {

            //最后一页及总页数
            var last_page = page_total = Math.ceil(data_total / limit);

            //若当前页面超出总页数
            if (get_page > page_total) {
                get_page = last_page;
            }

            var for_start = for_end = 0;
            var pagination_num = show_num * 2;
            var pagination_left_right_num = (pagination_num / 2);

            //计算向后翻页最大数
            if (parseInt(get_page + pagination_left_right_num) > last_page) {
                for_end = last_page;
            } else {
                for_end = parseInt(get_page + pagination_left_right_num);
            }

            //计算向前翻页数
            if (0 < get_page - (pagination_num - (for_end - get_page))) {
                for_start = get_page - (pagination_num - (for_end - get_page));
            } else {
                for_start = 1;
            }

            //计算向后翻页数
            if (pagination_num > (get_page + pagination_left_right_num) && last_page > (get_page + pagination_left_right_num)) {
                for (j = 1; j <= pagination_num - (get_page + pagination_left_right_num); j++) {
                    for_end++;
                }
            }

            //若当前页码小于初始页码
            if (get_page < Math.ceil((pagination_num + 0.1) / 2)) {
                for_end = pagination_num + 1;
                //若初始页码大于总页数
                if (for_end > page_total) {
                    for_end = page_total;
                }
            }

            var page_html = ""; // 所有页码html
            var page_goto_html = ""; // 跳转html
            var page_info_html = ""; // 分页信息html

            //设置向后翻页
            if (get_page != last_page) {
                page_html += '<a data-page="' + (get_page + 1) + '" class="a_arrow_r" title="下一页"></a>' 
                + '<a data-page="' + last_page + '" class="arrow_r" title="最后一页"></a>';
            } else {
                page_html += '<a data-page="0" class="a_arrow_r no_page"></a>' 
                + '<a data-page="0" class="arrow_r no_page"></a>';
            }

            //设置页码
            for (i = for_end; i >= for_start; i--) {
                if (i == get_page) {
                    page_html = "<b class='no_page'>" + i + "</b>" + page_html;
                } else {
                    page_html = '<a data-page="' + i + '">' + i + "</a>" + page_html;
                }
            }

            //设置向前翻页
            if (1 != get_page) {
                page_html = '<a data-page="1" class="arrow_l" title="第一页"></a>' 
                + '<a data-page="' + (get_page - 1) + '" class="a_arrow_l" title="上一页"></a>' + page_html;
            } else {
                page_html = '<a data-page="0" class="arrow_l no_page"></a>' 
                + '<a data-page="0" class="a_arrow_l no_page"></a>' + page_html;
            }

            page_goto_html = '<input size="2" class="goto_page_num" value=""'
             + hide_goto_str + '>' + '<code' + hide_goto_str + '>跳转</code>';

            page_info_html = '<span class="page">' 
            + '  <b class="page_info"' + hide_info_str + '>' 
            + '    当前第<tt class="data_total">' + get_page + '</tt>' 
            + '    <tt>' + self.current_page + '页<tt class="spacing_a">/</tt>' 
            + '    共<u class="page_total">' + page_total + '</u>页</tt>' 
            + '  </b>' 
            + '' + page_html + page_goto_html + '</span>';

            //记录总页数
            self.current_page_total = page_total;

            //插入分页信息
            $("." + insert_pagination_obj).html(page_info_html);

            //页码输入框按回车进行跳转
            $(".goto_page_num").unbind("keydown").keydown(function(event) {
                var key_code = event.which || event.keyCode;
                if (13 == key_code) {
                    self.change($(this).val(), callback_function, $(this).parent());
                }
            });

            //页码输入框鼠标点击选中文字
            $(".goto_page_num").unbind("click").click(function() {
                $(this).select()
            });
            //分页链接单击时
            $("." + insert_pagination_obj).find("a").unbind("click").click(function() {
                if (!self.is_get) {
                    if (!$(this).hasClass("no_page")) {
                        self.is_get = true;
                        if (!hide_loading) {
                            $(this).css({
                                "width": $(this).width()
                            }).html("").addClass("loading");
                        }
                    }
                    var data_page = $(this).attr("data-page");
                    if (0 == data_page) return !1;
                    self.change(data_page, callback_function, $(this).parent())
                }
            });

            //分页跳转按钮单击时
            $("." + insert_pagination_obj).find("code").unbind("click").click(function() {
                if($(this).prev().val()==''){
                    return;
                };
                $(this).css({
                    "width": $(this).width()
                }).html("").addClass("loading");
                self.change($(this).prev().val(), callback_function, $(this).parent())
            });
        }
    }
}