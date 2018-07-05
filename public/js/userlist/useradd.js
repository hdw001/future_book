$(function () {
    $('#addyes').on("click",function(){
        $.post('/useradd',{
            name:$('#user_name').val(),
            email:$('#user_email').val(),
            phone:$('#user_phone').val(),
            work_number:$('#user_work').val(),
            role_id:$('#user_role').val(),
            sex: $("input[name='user_sex']:checked").val(),
            age:$('#user_age').val(),
            password:$('#user_pass').val(),
        },function(data){
            if(data.code==2000){
                $("#error_msg").hide();
                // window.location.href='/userlist'
            }else{
                $("#error_msg").show();
                console.log(data.msg)
                $("#error_msg").find('.error_msg').html(data.msg)
            }
        })
    })
})