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
    $('#addyes').on("click",function(){
        var bookname=$('#book_name').val();
        var bookauth=$('#book_auth').val();
        var bookpress=$('#book_press').val();
        var bookclass=$('#bookclass').val();
        var bookintroduction=$('#book_introduction').val();
        var bookdetail=$("#book_detail").val();
        var bookurl=$("#book_img")[0].files[0];
        var booknumber=$("#book_number").val();
        var formData = new FormData();
        formData.append('book_cate_id',bookclass);
        formData.append('book_name',bookname);
        formData.append('book_author',bookauth);
        formData.append('book_press',bookpress);
        formData.append('book_introduction',bookintroduction);
        formData.append('book_detail',bookdetail);
        formData.append('book_url',bookurl);
        formData.append('book_number',booknumber);
        $.ajax({
            type: "POST", // 数据提交类型
            url: "/addbook", // 发送地址
            data: formData, //发送数据
            async: true, // 是否异步
            processData: false,
            contentType: false,
            success:function(data){
                console.log(data)
                if(data.code==2000){
                    window.location.href='/booklist';
                }else{
                    $("#error_msg").show();
                    $("#error_msg").find('.error_msg').html(data.msg)
                }
            }
        });
    })
})