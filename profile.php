<!doctype html>
<html lang="en">
<?php
require "config/database.php";
require "modules/passwordDecryptor.php";

if (!isset($_GET['username'])) {
    header("Location: index.php");
}
$user = $db->query("SELECT * FROM M_USER WHERE username = '" . $_GET['username'] . "'");
$user = $user->fetch_object();

if ($user->password != null) {
    /* Execute decrypt from file upload */
    $decode64 = base64_decode(explode(",", $user->password)[1]);

    // Load GD resource from binary data
    $im = imageCreateFromString($decode64);


    /* 
    Make sure that the GD library was able to load the image
    This is important, because you should not miss corrupted or unsupported images
    */
    if (!$im) {
        header("Location: index.php?message=Password value is not a valid image");
    }

    // Specify the location where you want to save the image
    $imagefile = 'data/passwordDB.png';

    /*
    Save the GD resource as PNG in the best possible quality (no compression)
    This will strip any metadata or invalid contents (including, the PHP backdoor)
    To block any possible exploits, consider increasing the compression level
    */
    imagepng($im, $imagefile, 0);

    
    // $img = imagecreatefrompng($src); //Returns image identifier
    $imgDB = imagecreatefrompng($imagefile); //Returns image identifier

    $decryptedPasswordDB = runDecrypt($imagefile, $imgDB);
} else {
    header("Location: index.php");
}

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="modules/css/message_modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Power Point</title>
</head>

<body>

    <div class="container-fluid main-content">
        <div class="card o-hidden border-0 mt-2 mx-auto ">
            <div class="card-body text-center">
                <h4 class="card-title"><?= $user->name; ?></h4>
                <p class="card-text">@<?= $user->username; ?></p>
                <p class="card-text badge badge-success">Your password : <strong><?= $decryptedPasswordDB; ?></strong></p>
            </div>
            <span class="imagePass">
                <img src="<?= $user->password; ?>">
            </span>
            <span class="mb-4" style="padding: 0px 75px 0px;">
                <a href="<?= $user->password; ?>" type="button" class="btn btn-primary download-button" download="generated-password.png">
                    <span> <i class="fa fa-cloud-download mr-2"></i> Download</span>

                </a>
            </span>
        </div>

    </div>
    </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="modules/js/draganddrop.js"></script>
    <script src="modules/js/function.js"></script>
    <script>
        // var a = document.createElement("a"); //Create <a>
        // a.href = "<?= $user->password; ?>"; //Image Base64 Goes here
        // a.download = "generated-password.png"; //File name Here
        // a.click(); //Downloaded file
    </script>
</body>

</html>