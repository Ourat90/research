
 

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
