<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Title -->
    <title>Sistema Capcitacion</title>

    <!-- Fav Icon -->
    <link rel="icon" href="img/FOTOLOGO.png">

    <!-- NFTMax Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome-all.min.css">
    <link rel="stylesheet" href="css/charts.min.css">
    <link rel="stylesheet" href="css/slickslider.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

    <!--[if IE]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
 <![endif]-->

    <div class="body-bg" style="background-image:url('img/body-bg.jpg')">
        <!-- NFTMax Welcome -->
        <section class="nftmax-wc nftmax-wc__full">
            <div class="container-fluid">
                <div class="row g-0">
                    <div class="col-xxl-6 col-lg-6 col-12 nftmax-hidden-rp">
                        <div class="nftmax-wc__inner nft-gr-primary">
                            <!-- Logo -->
                            {{-- <div class="nftmax-wc__logo">
                                <a href="#"><img src="img/AQUIERA" alt="#"></a>
                            </div> --}}
                            <br>
                            <!-- Middle Image -->
                            <div class="nftmax-wc__middle">
                                <a href="#"><img src="img/FOTOLOGO.png" alt="#"></a>
                            </div>
                            <!-- Welcome Heading -->
                            <div class="nftmax-wc__heading">
                                <h2 class="nftmax-wc__title">Sistema de Capacitacion <br>Unidad de Tecnologias de
                                    Informacion</h2>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-6 col-lg-6 col-12">
                        <!-- Welcome Form -->
                        <div class="nftmax-wc__form">
                            <div class="nftmax-wc__form-inner">
                                <div class="nftmax-wc__heading" style="text-align: center;">
                                    <a href="#">
                                        <img src="img/u.png" alt="#" style="width: 250px; height: auto;">
                                    </a>
                                </div>
                                <!-- Sign in Form -->
                                <form class="nftmax-wc__form-main" action="{{ route('login.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="nftmax-wc__form-label">Correo Electronico</label>
                                        <div class="form-group__input">
                                            <span class="nftmax-wc__icon"><svg class="inline"
                                                    xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                                    viewBox="0 0 22 20" fill="none">
                                                    <path
                                                        d="M21.7764 4.12903L14.1237 11.7818C13.2704 12.6329 12.1143 13.1109 10.9091 13.1109C9.7039 13.1109 8.54787 12.6329 7.69457 11.7818L0.0418183 4.12903C0.029091 4.27267 0 4.40267 0 4.54539V15.4545C0.00144351 16.6596 0.480803 17.8149 1.33293 18.6671C2.18506 19.5192 3.34038 19.9985 4.54547 20H17.2728C18.4779 19.9985 19.6332 19.5192 20.4853 18.6671C21.3374 17.8149 21.8168 16.6596 21.8182 15.4545V4.54539C21.8182 4.40267 21.7892 4.27267 21.7764 4.12903Z"
                                                        fill="#374557" fill-opacity="0.6"></path>
                                                    <path
                                                        d="M12.8389 10.4964L21.1425 2.19182C20.7403 1.52484 20.1729 0.972764 19.4952 0.588847C18.8175 0.204931 18.0523 0.00212789 17.2734 0H4.5461C3.76721 0.00212789 3.00201 0.204931 2.3243 0.588847C1.6466 0.972764 1.07926 1.52484 0.677002 2.19182L8.98066 10.4964C9.493 11.0067 10.1867 11.2932 10.9098 11.2932C11.6329 11.2932 12.3265 11.0067 12.8389 10.4964Z"
                                                        fill="#374557" fill-opacity="0.6"></path>
                                                </svg></span>
                                            <input class="nftmax-wc__form-input" type="email" name="email"
                                                placeholder="correo@gmail.com" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="nftmax-wc__form-label">Contraseña</label>
                                        <div class="form-group__input">
                                            <span class="nftmax-wc__icon"><svg class="inline" width="18"
                                                    height="21" viewBox="0 0 18 21" fill="none">
                                                    <path
                                                        d="M14.4467 7.1581V5.94904C14.4467 2.66455 11.7822 0 8.49771 0C5.21323 0 2.54867 2.66455 2.54867 5.94904V7.1581C1.00076 7.83194 -0.000366211 9.36059 -0.000366211 11.0471V16.149C0.0034843 18.494 1.90178 20.3961 4.25059 20.4H12.7525C15.0975 20.3961 16.9996 18.4978 17.0035 16.149V11.051C16.9919 9.36059 15.9908 7.83579 14.4467 7.1581ZM9.34482 14.451C9.34482 14.9207 8.96362 15.3019 8.49386 15.3019C8.0241 15.3019 7.6429 14.9207 7.6429 14.451V12.749C7.6429 12.2793 8.0241 11.8981 8.49386 11.8981C8.96362 11.8981 9.34482 12.2793 9.34482 12.749V14.451ZM12.7448 6.8H4.24289V5.94904C4.24289 3.60023 6.14505 1.69807 8.49386 1.69807C10.8427 1.69807 12.7448 3.60023 12.7448 5.94904V6.8Z"
                                                        fill="#374557" fill-opacity="0.6"></path>
                                                </svg></span>
                                            <input class="nftmax-wc__form-input"
                                                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                                                id="password-field" type="password" name="password" placeholder=""
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="nftmax-wc__check-inline" style="text-align: right; margin-top: 10px;">
                                            <div class="nftmax-wc__forgot">
                                                <a href="forgot-password.html"
                                                class="forgot-pass"
                                                style="
                                                    font-family: 'Poppins', sans-serif;
                                                    font-size: 1.0rem;
                                                    color: #2575fc;
                                                    text-decoration: none;
                                                    font-weight: bold;
                                                    transition: color 0.3s ease;
                                                ">
                                                    ¿Has olvidado tu contraseña?
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="nftmax-wc__button">
                                            <button class="ntfmax-wc__btn" type="submit">Ingresar</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="nftmax-wc__check-inline">
                                            <div class="nftmax-wc__forgot">
                                                <a href="{{ route('register') }}" class="forgot-pass">¿No tienes una cuenta? Regístrate</a>
                                            </div>

                                </form>
                                <!-- End Sign in Form -->
                            </div>
                        </div>
                        <!-- End Welcome Form -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End NFTMax Welcome -->

    </div>

    <!-- NFTMax Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slickslider.min.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/countdown.min.js"></script>
    <script src="js/final-countdown.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
