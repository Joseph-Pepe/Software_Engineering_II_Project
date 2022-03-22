$('.showLogin').on('click', function() {
    $('.signUpForm').hide();
    $('.loginForm').show();
});

$('.showCreate').on('click', function() {
    $('.loginForm').hide();
    $('.signUpForm').show();
});
