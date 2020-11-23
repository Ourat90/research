<!doctype html>
<html lang="en">
<?php
require "config/database.php";

if (!isset($_GET['username'])) {
    header("Location: index.php");
}
$user = $db->query("SELECT * FROM M_USER WHERE username = '" . $_GET['username'] . "'");
$user = $user->fetch_object();

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="modules/css/message_modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Password Generated</title>
    <link rel="icon" href="assets/image/title_logo.png" type="image/icon type">
</head>

<body>

    <div class="container-fluid main-content  border border-secondary" style="margin: 2em auto;">
        <div class="card o-hidden border-0 mt-2 mx-auto ">
            <div class="card-body text-center">
                <h4 class="card-title"><?= $user->username; ?></h4>
                <p class="card-text"><?= $user->name; ?></p>
            </div>
            <span class="imagePass">
                <img src="<?= $user->password; ?>">
            </span>
            <span style="padding: 0px 100px 0px; margin-top:20px; ">
                <a href="<?= $user->password; ?>" type="button" class="btn btn-primary download-button" download="generated-password.png" style="margin-bottom: 40px;">
                    <span> <i class=" fa fa-cloud-download mr-2"></i> Download</span>

                </a>
            </span>

            <span style=" padding: 0px 125px 0px; margin-bottom: 20px;">
                <a href="index.php" type="button" class="btn btn-outline-dark shadow download-button">
                    <span> <i class="fa fa-arrow-left"></i> &nbsp; Back </span>
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
        var a = document.createElement("a"); //Create <a>
        a.href = "<?= $user->password; ?>"; //Image Base64 Goes here
        a.download = "generated-password.png"; //File name Here
        a.click(); //Downloaded file
    </script>
</body>

</html>