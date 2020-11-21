
 

    var timefade = 300;

    // Tambahan code sendiri buat halaman login by maverick
    console.log( "document loaded" );
        $('#sign-in').hide();
        $('#signup').fadeIn(timefade);

$('#to-sign-in').click(function () {
    console.log("SIGN IN");
    $('.remove-preview').click();
            $('#signup').fadeOut(timefade, 'linear', function() {
                $('#sign-in').fadeIn(timefade);
            });                
});
        
$('#to-sign-up').click(function () {
    console.log("SIGN UP");
    $('.remove-preview').click();
            $('#sign-in').fadeOut(timefade, 'linear', function() {
                $('#signup').fadeIn(timefade);
            });                 
});

const inputPassword1 = document.getElementById("Password1");
const inputPassword2 = document.getElementById("Password2");
const togglePassword = document.getElementById("togglePassword");
const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");

const onToggleTypePassword1 = () => {
    togglePassword.classList.toggle("fa-eye-slash");
    if (inputPassword1.type === "password") {
        inputPassword1.type = "text";
    } else {
        inputPassword1.type = "password";
    }

};
togglePassword.addEventListener("click", onToggleTypePassword1);

const onToggleTypePassword2 = () => {
    toggleConfirmPassword.classList.toggle("fa-eye-slash");

    if (inputPassword2.type === "password") {
        inputPassword2.type = "text";
    } else {
        inputPassword2.type = "password";
    }
};

toggleConfirmPassword.addEventListener("click", onToggleTypePassword2);