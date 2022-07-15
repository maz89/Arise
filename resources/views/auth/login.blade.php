<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/interactive/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jul 2022 11:52:40 GMT -->
<head>

    <meta charset="utf-8" />
    <title>PIA-M|Authentication </title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

    <!-- Layout config Js -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />


</head>

<body>

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <!--
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <!--
                        <div>
                            <a href="" class="d-inline-block auth-logo">
                                <img src="{{asset('assets/images/logo.png')}}" alt="" height="100">
                            </a>
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">   
                            <div class="text-center mt-2">                        
                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="200">                  
                            </div>
                            <div class="p-2 mt-4">                                
                                <form action="">
                                    <h4 class="text-center mt-2">SIGN IN </h4>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Login </label>
                                        <input type="text" class="form-control" id="login" name="login" placeholder="Enter username">
                                        <span class="text-danger" id="erreurLogin">  </span>
                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label" for="password-input">Password </label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5" placeholder="Enter password" id="mot_passe" name="mot_passe">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>

                                        <span class="text-danger" id="erreurMotpasse">  </span>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-danger w-100" type="submit" id="authentifier">Sign in </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <div class="text-center">
            <p class="mb-0 text-muted">&copy;
                <script>document.write(new Date().getFullYear())</script> PIA-TOGO.
            </p>
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer 
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>document.write(new Date().getFullYear())</script> PIA-TOGO.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- particles js -->
<script src="{{asset('assets/libs/particles.js/particles.js')}}"></script>
<!-- particles app js -->
<script src="{{asset('assets/js/pages/particles.app.js')}}"></script>
<!-- password-addon init -->
<script src="{{asset('assets/js/pages/password-addon.init.js')}}"></script>

<script src="{{asset('assets/jquery-3.6.0.min.js')}}" ></script>

<script>


    jQuery(document).ready(function(){



        $( "#authentifier" ).click(function( event ) {
            event.preventDefault();


            authentifier()
        });



        clearData()

    });

    function clearData() {


        $('#login').val('');
        $('#mot_passe').val('');


        $('#erreurLogin').text('');
        $('#erreurMotpasse').text('');




    }



    //------------------------ fonction d' authentification
    function authentifier() {

        let allValid = true;

        let login =  $('#login').val();
        let mot_passe =  $('#mot_passe').val();





        if(login ==='')
        {
            $('#erreurLogin').text("Required  " );
            allValid = false;

        }




        if(mot_passe === '')
        {
            $('#erreurMotpasse').text("Required  " );
            allValid = false;

        }



        if (allValid) {

            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: "{{route('utilisateur_authenticate')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{

                    login:login,

                    mot_passe:mot_passe,



                } ,

                success: function(data) {
 console.log(data.data)
                    if(data.data.isValid)
                    {
                       location.href ='{{route('dashboard')}}'




                    }else {




                        $('#erreurLogin').text(data.data.erreurLogin);
                        $('#erreurMotpasse').text(data.data.erreurMotpasse);



                    }




                },




            });

        }




    }




</script>

</body>



</html>
