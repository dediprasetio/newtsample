<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Login - - IoT Webb APP
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url("assets/dist/") ?>css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url("assets/dist/") ?>css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <!-- <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("assets/dist/") ?>img/favicon/apple-touch-icon.png"> -->
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("assets/dist/") ?>img/logo.png">
        <link rel="mask-icon" href="<?php echo base_url("assets/dist/") ?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url("assets/dist/") ?>css/page-login.css">
        <!-- Sweet alert -->
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url() . "assets/dist/" ?>css/notifications/sweetalert2/sweetalert2.bundle.css">
    </head>
    <body style="
      background-image: url('<?php echo base_url("assets/dist/img/background.png") ?>');
      width: 20px;
    ">
        <div class="blankpage-form-field">
            <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4" style="background-color:  #7976b3;">
                <a href="<?php echo base_url("assets/dist/") ?>javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                    <img src="<?php echo base_url("assets/dist/") ?>img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo" style="width:40px">
                    <span class="page-logo-text mr-1">IoT WebApp</span>
                    <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                </a>
            </div>
            <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                <form id="FormLogin" class="needs-validation" novalidate="" action="javascript:void(0);">
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autocomplete="off">
                        <span class="help-block">
                            Your unique username to app
                        </span>
                        <div class="invalid-feedback">Sorry, you missed this one.</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="password" required autocomplete="off">
                        <div class="invalid-feedback">Sorry, you missed this one.</div>
                        <span class="help-block">
                            Your password
                        </span>
                    </div>
                    <div class="form-group text-left">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme"> Remember me for the next 30 days</label>
                        </div>
                    </div>
                    <div class="spinner-grow text-secondary d-none" id="spinnertwo" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success d-none" id="spinnerthree" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info d-none" id="spinnerone" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <button type="submit" class="btn btn-default float-right">Secure login</button>
                </form>
            </div>
            <!-- <div class="blankpage-footer text-center">
                <a href="<?php echo base_url("assets/dist/") ?>#"><strong>Recover Password</strong></a> | <a href="<?php echo base_url("assets/dist/") ?>#"><strong>Register Account</strong></a>
            </div> -->
        </div>
        <!-- <div class="login-footer p-2">
            <div class="row">
                <div class="col col-sm-12 text-center">
                    <i><strong>System Message:</strong> You were logged out from 198.164.246.1 on Saturday, March, 2017 at 10.56AM</i>
                </div>
            </div>
        </div> -->
        <!-- <video poster="<?php echo base_url("assets/dist/") ?>img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
            <source src="<?php echo base_url("assets/dist/") ?>media/video/cc.webm" type="video/webm">
            <source src="<?php echo base_url("assets/dist/") ?>media/video/cc.mp4" type="video/mp4">
        </video> -->
        <script src="<?php echo base_url("assets/dist/") ?>js/vendors.bundle.js"></script>
        <script src="<?php echo base_url("assets/dist/") ?>js/app.bundle.js"></script>
        <!-- Page related scripts -->
        <!-- Sweet alert -->
        <script src="<?php echo base_url() ?>assets/dist/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
    </body>
    

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        
                        document.getElementById("spinnerone").classList.remove("d-none");
                        document.getElementById("spinnertwo").classList.remove("d-none");
                        document.getElementById("spinnerthree").classList.remove("d-none");
                        
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('Auth/ActionLogin') ?>",
                            dataType: "JSON",
                            data: $('#FormLogin').serialize(),
                            success: function(data) {
                                if (data.status_code == 200) {
                                    document.getElementById("spinnerone").classList.add("d-none");
                                    document.getElementById("spinnertwo").classList.add("d-none");
                                    document.getElementById("spinnerthree").classList.add("d-none");
                                    window.location = "<?php echo base_url() . "dashboard" ?>";
                                }else{
                                    document.getElementById("spinnerone").classList.add("d-none");
                                    document.getElementById("spinnertwo").classList.add("d-none");
                                    document.getElementById("spinnerthree").classList.add("d-none");
                                    SwalError('error', 'oopss...', data.message, 'Please login again');
                                }
                            }
                        });
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    function SwalError(typeAlert, titleAlert, messageAlert, footerAlert) {
        Swal.fire({
            type: typeAlert, //As sample success / error
            title: titleAlert, //As sample "oopsss..."
            text: messageAlert, //As sample "Your email or password is incorect!!"
            footer: footerAlert //As sample "Please Login Again"
        });
    };
</script>

</html>
