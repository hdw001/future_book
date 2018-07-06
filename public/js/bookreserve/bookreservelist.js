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
    $('#tabledata').on('click','.borrowbook',function(){
        var reserveId=$(this).attr('data-reserve');
        $.post('/updatebookstatus',{
            book_borrow_id:reserveId,
            book_status:2
        },function(data){
            if(data.code==2000){
                alert('借阅成功！')
                list();
            }else{
                alert('借阅失败！')
            }
        })
    })
    $('#tabledata').on('click','.stillbook',function(){
        var reserveId=$(this).attr('data-reserve');
        $.post('/updatebookstatus',{
            book_borrow_id:reserveId,
            book_status:3
        },function(data){
            if(data.code==2000){
                alert('还书成功！')
                list();
            }else{
                alert('还书失败！')
            }
        })
    })
})

function list(a){
    var _page=a || 1;
    var _limit=$('#page_limit').val();
    var names=$('#bookname').val()
    var bookclass=$('#bookclass').val()
    $.post("/getbookborrowlist",{
        page:_page,
        pageSize:_limit,
        book_name:names,
        book_cate_id:bookclass
    },function(d){
        if(d.code==2000){
            var data=d.data.data;
            var str='';
            $.each(data,function (index,val) {
                var reservestatus=''
                if(data[index].book_status==1){
                    reservestatus='预定中'
                }
                if(data[index].book_status==2){
                    reservestatus='已借阅'
                }
                if(data[index].book_status==3){
                    reservestatus='已归还'
                }
                str+='<tr>' +
                        '<td>'+data[index].id+'</td>' +
                        '<td>'+data[index].book_borrow_date+'</td>' +
                        '<td>'+data[index].name+'</td>' +
                        '<td>'+data[index].book_name+'</td>' +
                        '<td>'+reservestatus+'</td>' +
                         '<td>' +
                             '<button class="borrowbook btn btn-info" style="cursor: pointer" data-reserve="'+data[index].id+'">借阅</button>' +
                    '<button class="stillbook btn btn-success" style="margin-left:20px;cursor: pointer" data-reserve="'+data[index].id+'">归还</button>' +
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