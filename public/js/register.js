function getuid(){
    //     var email = $('#email');
        
    
    // email.on('input',()=>{
    //   if(email.prop('validity').typeMismatch){
    //     console.log('Invalid email syntax');
    //   }
    // });
    let uidv = document.getElementById("uid").value;
    let uid = document.getElementById("uid");
    let registModal = new bootstrap.Modal(document.getElementById('registConfirmModal'));
     if(uidv !== ''){
         if(uid.checkValidity()){
             document.getElementById('display-uid').innerHTML = uidv;
             registModal.show();
            } else{
                document.getElementById("errmsg").innerHTML = "Formatnya salah. contoh: email@domain.com";
            }
    }else {
        document.getElementById("errmsg").innerHTML = "Isi dulu emailnya"
    }
} 

function submit() {
    document.getElementById("register-form").submit();
}

$(function(){
    $("#btn-submit-regis").on('click', function(){
        const email = document.getElementById("uid").value;
        // location.replace("http://localhost/123190123-rarabakery/public/register/verify");
        // window.location = "http://localhost/123190123-rarabakery/public/register/verify";
        
       
        $.ajax({
            url: 'http://localhost/123190123-rarabakery/public/register/generateVerify',
            data: {
                email: email
            },
            method: 'POST',
            dataType: 'json',
            success: function(data){
                if(data.msg){
                    $('#errmsg').html(data.msg);
                } else {
                    window.location.replace("http://localhost/123190123-rarabakery/public/register/verify/"+email);
                }
            },
            error: function(){
                console.log("error");
            } 
        });
       
    });

    $("#btn-submit-verif").on('click', function(){
        const email = document.getElementById("email").value;
        const code = document.getElementById("code").value;
        
       
        $.ajax({
            url: 'http://localhost/123190123-rarabakery/public/register/verifyCode',
            data: {
                email: email,
                code: code
            },
            method: 'POST',
            dataType: 'json',
            success: function(data){
                if(data.msg){
                    $('#errmsg').html(data.msg);
                } else {
                    window.location.replace("http://localhost/123190123-rarabakery/public/register/");
                }
            },
            error: function(){
                console.log("error");
            } 
        });
       
    });
    $("#btn-submit-login").on('click', function(){
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        console.log(email);
        console.log(password);
        $.ajax({
            url: 'http://localhost/123190123-rarabakery/public/login/loginverify',
            data: {
                email: email,
                password: password
            },
            method: 'POST',
            dataType: 'json',
            success: function(data){
                

                if(data.msg1)
                $('#errmsg1').html(data.msg1);
                else 
                $('#errmsg1').html('');
                if(data.msg2)
                $('#errmsg2').html(data.msg2);
                else
                $('#errmsg2').html('');
                if(data.login)
                    window.location.replace("http://localhost/123190123-rarabakery/public/home");
                },
            error: function(){
                console.log("error");
            } 
        });
       
    });
});