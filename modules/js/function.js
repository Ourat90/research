    var timefade = 300;

    // Tambahan code sendiri buat halaman login by maverick
console.log("document loaded");
        $('#forgot-password').hide();
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

$('#up-to-forgot-password').click(function () {
    console.log("FORGOT PASSWORD");
    $('.remove-preview').click();
            $('#signup').fadeOut(timefade, 'linear', function() {
                $('#forgot-password').fadeIn(timefade);
            });                 
});
$('#in-to-forgot-password').click(function () {
    console.log("FORGOT PASSWORD");
    $('.remove-preview').click();
            $('#sign-in').fadeOut(timefade, 'linear', function() {
                $('#forgot-password').fadeIn(timefade);
            });                 
});

$('#back-to-sign-in').click(function () {
    console.log("SIGN IN");
    $('.remove-preview').click();
            $('#forgot-password').fadeOut(timefade, 'linear', function() {
                $('#sign-in').fadeIn(timefade);
            });                
});

const inputPassword1 = document.getElementById("Password1");
const inputPassword2 = document.getElementById("Password2");
const inputPassword_reset = document.getElementById("Password_reset");
const inputConfirmPassword_reset = document.getElementById("confirmPassword_reset");

const togglePassword = document.getElementById("togglePassword");
const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
const togglePassword_reset = document.getElementById("togglePassword_reset");
const toggleConfirmPassword_reset = document.getElementById("toggleConfirmPassword_reset");

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

const onToggleTypePassword_reset = () => {
    togglePassword_reset.classList.toggle("fa-eye-slash");

    if (inputPassword_reset.type === "password") {
        inputPassword_reset.type = "text";
    } else {
        inputPassword_reset.type = "password";
    }
};
togglePassword_reset.addEventListener("click", onToggleTypePassword_reset);

const onToggleTypeConfirmPassword_reset = () => {
    toggleConfirmPassword_reset.classList.toggle("fa-eye-slash");

    if (inputConfirmPassword_reset.type === "password") {
        inputConfirmPassword_reset.type = "text";
    } else {
        inputConfirmPassword_reset.type = "password";
    }
};

toggleConfirmPassword_reset.addEventListener("click", onToggleTypeConfirmPassword_reset);

$('#formSignUp').on('change keyup', function() {
    if (formIsValid()) {
        $('#btn-submit').removeAttr('disabled');
    }
});

$('#formResetPassword').on('change keyup', function() {
    if (formIsValid_reset()) {
        $('#btn-submit2').removeAttr('disabled');
    }
});

function formIsValid() {
    if (isBlank($('#Username').val())) return false;

    if (isBlank($('#Password1').val()) && isBlank($('#Password2').val())) return false;

    if ($('#Password1').val() != $('#Password2').val()) return false;

    if (isBlank($('#file1').val())) return false;

    if (isBlank($('#Name').val())) return false;

    return true;
}

function formIsValid_reset() {
    if (isBlank($('#Username2').val())) return false;

    if (isBlank($('#Password_reset').val()) && isBlank($('#confirmPassword_reset').val())) return false;

    if ($('#Password_reset').val() != $('#confirmPassword_reset').val()) return false;

    if (isBlank($('#file3').val())) return false;

    return true;
}


function isBlank(param) {
    if (param == null|| param == undefined || param == '') {
        return true;
    }
    return false;
}