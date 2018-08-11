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
    $('#tabledata').on('click', '.deluserid', function () {
        var id = $(this).attr('data-id')
        $.post('/deleteuser', {user_id: id}, function (data) {
            if (data.code == 2000) {
                alert('删除用户成功！');
                $('#work_number').val("");
                list();
            }
        })

    });
})

function list(a) {
    var _page = a || 1;
    var _limit = $('#page_limit').val();
    var names = $('#username').val();
    var work_number = $('#work_number').val();
    $.post("/userlist", {
        name: names,
        page: _page,
        pageSize: _limit,
        work_number: work_number
    }, function (d) {
        if (d.code == 2000) {
            var data = d.data.data;
            var str = '';
            $.each(data, function (index, val) {
                var rolename = ''
                if (data[index].role_id == 1) {
                    rolename = '管理员'
                    // showrole = 'display:inline-block';
                }
                if (data[index].role_id == 2) {
                    rolename = '工作人员'
                }
                if (data[index].role_id == 3) {
                    rolename = '普通用户'
                }
                str += '<tr>' +
                    '<td>' + data[index].id + '</td>' +
                    '<td>' + data[index].name + '</td>' +
                    '<td>' + (data[index].sex == 1 ? "男" : "女") + '</td>' +
                    '<td>' + data[index].age + '</td>' +
                    '<td>' + data[index].email + '</td>' +
                    '<td>' + data[index].phone + '</td>' +
                    '<td>' + data[index].work_number + '</td>' +
                    '<td>' + rolename + '</td>' +
                    '<td><a href="/useredit?id=' + data[index].id + '">' +
                    '<button type="button" class="btn btn-success m-b-5">编辑</button>' +
                    '</a></td>' +
                    '<td><button type="button"  data-id="' + data[index].id + '" class="deluserid btn btn-danger m-b-5">删除</button></td>' +
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