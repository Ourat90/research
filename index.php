<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Power Point</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card o-hidden border-0 mt-2 mx-auto ">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row main-content">
                    <div class="col-md-6 text-center company__info">
                        <span class="holder">
                            <img src="assets/image/8401.jpg">
                        </span>
                        <!-- <a href="#" class="signup-image-link">I am already member</a> -->
                    </div>

                    <div class="col-md-6 col-xs-12 col-sm-12 login_form ">

                        <div class="form-title mb-4">
                            <h3>Sign Up</h3>
                        </div>

                        <form control="" class="form-group">
                            <div class="row mb-2">
                                <span class="fa fa-user icon"></span>
                                <input type="text" name="username" id="Username" class="form__input" placeholder="Username">
                            </div>
                            <div class="row mb-2">
                                <span class="fa fa-lock icon"></span>
                                <input type="password" name="password1" id="Password1" class="form__input" placeholder="Password">
                            </div>
                            <div class="row mb-2">
                                <span class="fa fa-lock icon"></span>
                                <input type="password" name="password2" id="Password2" class="form__input" placeholder="Confirm Password">
                            </div>
                            <div class="row mb-2">
                                <span class="fa fa-address-card icon"></span>
                                <input type="text" name="name" id="Name" class="form__input" placeholder="Name">
                            </div>


                            <div class="row mt-4 text-center">
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <div class="preview-zone hidden">
                                            <div class="box box-solid">

                                                <div class="box-body">

                                                </div>
                                                <div class="" id="closePreview">
                                                    <button type="button" class="btn btn-danger btn-sm remove-preview mt-3">
                                                        Close Preview
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropzone-wrapper" id="selectFile">
                                            <div class="dropzone-desc">
                                                <i class="fa fa-download"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="img_logo" class="dropzone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row ">
                                <input type="submit" value="Submit" class="btn-form">
                                <span class="login_form">
                                    <a href="#">I am already member</a>
                                </span>
                            </div>

                        </form>
                    </div>
                </div>
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
</body>
<script src="modules/js/draganddrop.js"></script>
<script src="modules/js/function.js"></script>

</html>