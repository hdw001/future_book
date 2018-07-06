$(function () {
    $.post('/getbookcateall',{},function(data){
        if(data.code==2000){
            var data=data.data;
            var str=''
            for(var item in data){
                str+='<option value="'+item+'">'+data[item]+'</option>'
            }
            $('#bookclass').append(str);
        }
    })
    $.post('/editbookview',{
        book_id:getQueryString('id')
    },function(data){
        if(data.code==2000){
            var data=data.data;
            $('#book_name').val(data.book_name);
            $('#book_auth').val(data.book_author);
            $('#book_press').val(data.book_press);
            $('#bookclass').val(data.book_cate_id);
            $('#book_introduction').val(data.book_introduction);
            $("#book_detail").val(data.book_detail);
            $("#book_number").val(data.book_number);
            $('#book_img').attr('src',data.book_url)
        }
    })
})
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}