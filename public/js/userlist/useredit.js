$(function () {
    $.get('/userinfo',{
        user_id:getQueryString('id')
    },function (data) {
            if (data.code == 2000) {
                var data = data.data;
                $('#user_name').val(data.name);
                $('#user_email').val(data.email)
                $('#user_phone').val(data.phone)
                $('#user_work').val(data.work_number)
                $('#user_role').val(data.role_id)
                $("input[name='user_sex'][value='"+data.sex+"']").prop('checked',true);
                $('#user_age').val(data.age)
                $('#user_pass').val(data.password)
            }
    })
    $('#addyes').on("click",function(){
        $.post('/userupdate',{
            user_id:getQueryString('id'),
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
                 window.location.href='/userlist'
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