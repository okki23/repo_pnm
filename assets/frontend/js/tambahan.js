$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100); 
     $("#register-form").fadeOut(100);
    $("#forgot-pass").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $('#forgot-form-link').removeClass('active');  
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $("#forgot-pass").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $('#forgot-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#forgot-form-link').click(function(e) {
    $("#forgot-pass").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $("#register-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});

$("#login-submit").on("click",function(){
    alert('ente login');
});

$("#register-submit").on("click",function(){
    alert('ente register');
});

$("#forgot-submit").on("click",function(){
    alert('ente forgot');
});