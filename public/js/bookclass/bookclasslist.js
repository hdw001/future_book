$(function(){

    //初始化分页
    $('#page_limit').change(function(){
        list();
    });
    $("#seachbtn").on('click',function(){
        list();
    })
//4.获取列表数据
    list();
})

function list(a){
    var _page=a || 1;
    var _limit=$('#page_limit').val();
    $.post("/selectbookcatelist",{
        page:_page,
        pageSize:_limit
    },function(d){
        if(d.code==2000){
            var data=d.data.data;
            var str='';
            $.each(data,function (index,val) {
                str+='<tr>' +
                        '<td>'+data[index].id+'</td>' +
                        '<td>'+data[index].book_cate_name+'</td>' +
                         '<td>' +
                             '<a href="/bookclassedit?id='+data[index].id+'">' +
                    '<button type="button" class="btn btn-primary m-b-5">编辑</button>'+
                    '</a>' +
                         '</td>' +
                    '</tr>'
            });
            $("#tabledata").find('tbody').html(str);
            $('.pagination').html('');
            page.go({
                page:_page,
                limit:_limit,
                total:d.data.total,
                hide_loading:false,
                class:"pagination",
                fn:"list"
            });
        }
    });
}