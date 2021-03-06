$(function () {

    //初始化分页
    $('#page_limit').change(function () {
        list();
    });
    $("#seachbtn").on('click', function () {
        list();
    })
//4.获取列表数据
    list();

    $('#tabledata').on('click', '.delbooklist', function () {
        var id = $(this).attr('data-id')
        $.post('/deletebook', {book_id: id}, function (data) {
            if (data.code == 2000) {
                alert('删除图书成功！');
                list()
            }
        })

    });

    $.post('/getbookcateall', {}, function (data) {
        if (data.code == 2000) {
            var data = data.data;
            var str = '';
            for (var item in data) {
                str += '<option value="' + item + '">' + data[item] + '</option>'
            }
            $('#bookclass').append(str);
        }
    })
    $('#tabledata').on('click', '.reservebook', function () {
        var bookid = $(this).attr('data-reserve');
        $.post('/addbookborrow', {
            book_id: bookid
        }, function (data) {
            if (data.code == 2000) {
                alert('预定成功！')
            } else {
                alert('预定失败！')
            }
        })
    })
})

function list(a) {
    var roleid = getCookie('role');
    var showrole = '';
    if (roleid == 1 || roleid == 2) {
        showrole = 'display:inline-block';
        $("#showrolelist").css("display","inline-block");
    } else {
        showrole = 'display:none';
        $("#showrolelist").css("display","none");
    }
    var _page = a || 1;
    var _limit = $('#page_limit').val();
    var names = $('#bookname').val();
    var bookclass = $('#bookclass').val();
    $.post("/selectbooklist", {
        book_name: names,
        page: _page,
        pageSize: _limit,
        book_cate_id: bookclass
    }, function (d) {
        if (d.code == 2000) {
            var data = d.data.data;
            var str = '';

            $.each(data, function (index, val) {
                str += '<tr>' +
                    '<td>' + data[index].id + '</td>' +
                    '<td>' + data[index].book_name + '</td>' +
                    '<td>' + data[index].book_author + '</td>' +
                    '<td>' + data[index].book_press + '</td>' +
                    '<td>' + data[index].book_introduction + '</td>' +
                    '<td>' + data[index].book_number + '</td>' +
                    '<td>' +
                    '<button type="button" class="reservebook btn btn-info"  style="cursor: pointer;" data-reserve="' + data[index].id + '">预定</button>' +
                    '<a style="margin-left:20px;' + showrole + '"  href="/bookedit?id=' + data[index].id + '"> ' +
                    '<button type="button" class="btn btn-primary m-b-5">编辑</button></a>' +
                    '<button type="button"  data-id="' + data[index].id + '" style="margin-left:20px;' + showrole + '"  class="delbooklist btn btn-danger m-b-5">删除</button>' +
                    '<a style="margin-left:20px;"  href="/bookdetail?id=' + data[index].id + '"> ' +
                    '<button type="button" class="btn btn-success m-b-5">详情</button>' +
                    '</a>' +
                    '</td>' +
                    '</tr>'
            });
            $("#tabledata").find('tbody').html(str);
            $('.pagination').html('');
            page.go({
                page: _page,
                limit: _limit,
                total: d.data.total,
                hide_loading: false,
                class: "pagination",
                fn: "list"
            });
        }
    });
}