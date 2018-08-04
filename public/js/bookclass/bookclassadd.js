$(function () {
    $('#addyes').on("click",function(){
        $.post('/addbookcate',{
            book_cate_name:$('#book_cate_name').val(),

        },function(data){
            if(data.code==2000){
                $("#error_msg").hide();
                window.location.href='/bookclasslist'
            }else{
                $("#error_msg").show();
                $("#error_msg").find('.error_msg').html(data.msg)
            }
        })
    })
})