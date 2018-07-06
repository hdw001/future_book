$(function () {
    $.post('/editbookcateview',{
        book_cate_id:getQueryString('id')
    },function (data) {
        if (data.code == 2000) {
            var data = data.data;
            $('#book_cate_name').val(data.book_cate_name);
        }
    })
    $('#addyes').on("click",function(){
        $.post('/updatebookcate',{
            book_cate_id:getQueryString('id'),
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
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}