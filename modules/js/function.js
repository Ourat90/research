
 

    var timefade = 300;

    // Tambahan code sendiri buat halaman login by maverick
    $(document).ready(function() {
        console.log( "document loaded" );
        $('#sign-in').hide();
        $('#signup').fadeIn(timefade);

        $('#to-sign-in').click(function() {
            $('#signup').fadeOut(timefade, 'linear', function() {
                $('#sign-in').fadeIn(timefade);
            });                
        });

        $('#to-sign-up').click(function() {
            $('#sign-in').fadeOut(timefade, 'linear', function() {
                $('#signup').fadeIn(timefade);
            });                 
        });

    });
