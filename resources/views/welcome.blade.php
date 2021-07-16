<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LVB Zekkour</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}</style>
        <style>body {font-family: 'Nunito', sans-serif;}</style>


        <!-- Favicons -->
        <link href="fonts/img/favicon.png" rel="icon">
        <link href="fonts/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="fonts/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="fonts/vendor/aos/aos.css" rel="stylesheet">
        <link href="fonts/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="fonts/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="fonts/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="fonts/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="fonts/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <link rel="stylesheet" href="/css/welcome.css">


    </head>
    <body style="background-image: url('{{ asset('img/imgAcceuil/1.svg')}}');
        background-size: cover;">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 class="text-light">
                    <a href="index.html">
                        <span>
                            <img src="../../img/lvb.png" alt="Project Logo" class="brand-image">
                            LVB Zekkour
                        </span>
                    </a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="fonts/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    @if (Route::has('login'))
                        @auth
                    <li>
                        <a class="active " href="{{ url('/home') }}">Home</a>
                    </li>
                        @else
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
{{--                            @if (Route::has('register'))--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('register') }}">Register</a>--}}
{{--                    </li>--}}
{{--                            @endif--}}
                        @endauth
                    @endif

                    <li><a href="#services"> Nos services </a></li>
                    <li><a href="#clients"> Nos clients </a></li>
                    <li><a href="#contact"> Contactez-nous</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Laboratoire Voies & Béton <span>Zekkour</span></h2>
                    <p class="animate__animated animate__fadeInUp">
                        Leader dans le domaine des études géotechniques et le contrôle des travaux de réalisation pour le BTPH,
                        les routes, les voies ferrées, les ouvrages d’art, les ouvrages hydrauliques..
                    </p>
                    <a href="#histoir" class="btn-get-started animate__animated animate__fadeInUp">Découvrez notre histoir</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Projets & clients</h2>
                    <p class="animate__animated animate__fadeInUp">
                        Abrantina, Andrade Gutierez, Bentini Construction,
                        China Civil, Cosider, CSCEC, Dar Al-handasah, Hyundai, OHL, Pizzarotti, APC, DLEP, DUC, DTP, OPGI...
                    </p>
                    <a href="#clients" class="btn-get-started animate__animated animate__fadeInUp">Nos principaux clients</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Prestations & services</h2>
                    <p class="animate__animated animate__fadeInUp">
                        Études géotechniques et contrôle des travaux de réalisation pour le BTPH, les routes,
                        les voies ferrées, les ouvrages d’art, ouvrages hydrauliques...
                    </p>
                    <a href="#services" class="btn-get-started animate__animated animate__fadeInUp">Consultez nos prestations</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section class="why-us section-bg"  data-aos="fade-up" date-aos-delay="200" id="histoir">
            <div class="container " style=" border-radius: 40px; background: linear-gradient(to bottom,#e7aa94, #527598);">
                <div class="row">
                    <div class="section-title">
                        <h2 style="margin-top: 40px;">Plus de 15 ans de métier</h2>
                        <p>
                            Le Laboratoire Voies & Béton Zekkour a été créé en Janvier 2005 sur agrément délivré par
                            le ministère des travaux publics auquel s’est ajouté un agrément du ministère de l’habitat en 2010.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 video-box">
                        <img src="/img/imgAcceuil/zekkour.jpg" class="img-fluid" alt="" style="border-radius: 60px">
{{--                        <a href="" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>--}}
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

                        <div class="icon-box">
                            <div class="icon"><i class='bx bxs-florist'></i></div>
                            <h4 class="title"><a href="">Création</a></h4>
                            <p class="description">
                                Depuis, la stratégie de développement opérée sur le plan de la technologie et des ressources humaines a permis un déploiement géographique dans 19 Wilayas du pays
                                (y compris celles du grand sud), un développement constant du domaine d’activité vers de nouvelles prestations,
                                ainsi que le perfectionnement des compétences avec l’acquisition d’une expertise reconnue dans les différents domaines d’intervention.
                            </p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class='bx bx-check-shield'></i></div>
                            <h4 class="title"><a href="">Certification ISO 9001:2015</a></h4>
                            <p class="description">
                                Enfin, pour garantir des performances en adéquation avec les exigences de ses clients et partenaires nationaux et étrangers,
                                et répondre aux standards internationaux, le laboratoire Voies & Béton Zekkour se démarque par son système de management de la qualité,
                                avec l'obtention en 2020 de sa Certification ISO 9001:2015,
                                résultat de plusieurs années d'expérience, de formations et de travail acharné.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Why Us Section -->


        <!-- ======= services Section ======= -->
        <section class="features" id="services">
            <div class="container" >
                <div class="section-title" >
                    <h2>Services</h2>
                    <p></p>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="/img/imgAcceuil/rc.jpg" class="img-fluid rounded-pill" alt="">
                    </div>
                    <div class="col-md-7 pt-4">
                        <h3> Routes, autoroutes, aéroports, voies ferrées, barrages ..</h3>
                        <ul>
                            <li><i class="bi bi-check"></i>Études géotechniques des tracés routiers</li>
                            <li><i class="bi bi-check"></i> Études de stabilité des routes</li>
                            <li><i class="bi bi-check"></i>Expertises et assistances diverses</li>
                            <li><i class="bi bi-check"></i> Analyses des matériaux</li>
                            <li><i class="bi bi-check"></i>Études de formulation de béton hydrocarboné</li>
                            <li><i class="bi bi-check"></i>Contrôles des travaux de réalisation</li>
                            <li><i class="bi bi-check"></i>Contrôles des travaux de signalisation routière (Verticale et horizontale)</li>
                        </ul>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="/img/imgAcceuil/lab.jpg" class="img-fluid rounded-pill" alt="">
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3> Bâtiment, ouvrages d’art, ouvrages hydrauliques ...</h3>
                        <ul>
                            <li><i class="bi bi-check"></i>Études géotechniques des tracés routiers</li>
                            <li><i class="bi bi-check"></i>Études des glissements de terrains</li>
                            <li><i class="bi bi-check"></i>Expertises et assistances diverses</li>
                            <li><i class="bi bi-check"></i>Expertises et assistances diverses</li>
                            <li><i class="bi bi-check"></i>Études de composition de béton</li>
                            <li><i class="bi bi-check"></i>Contrôle des travaux de béton hydraulique</li>
                            <li><i class="bi bi-check"></i>Essais de résistance à la composition</li>
                            <li><i class="bi bi-check"></i>Essais d’auscultation combinés à l’ultrason</li>
                            <li><i class="bi bi-check"></i>Auscultations soniques des pieux</li>
                        </ul>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="/img/imgAcceuil/gcm.jpg" class="img-fluid rounded-pill" alt="">
                    </div>
                    <div class="col-md-7 pt-5">
                        <h3>Gisements et carrières ...</h3>
                        <ul>
                            <li><i class="bi bi-check"></i>Estimations quantitatives des réserves</li>
                            <li><i class="bi bi-check"></i>Estimations des caractéristiques géotechnique de la roche</li>
                            <li><i class="bi bi-check"></i>Détermination des caractéristiques physiques, mécaniques et chimiques des produits de la carrière</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End services Section -->


        <!-- ======= Contact Section ======= -->
        <section class="services" id="contact" >
            <div class="container">
                <div class="section-title">
                    <h2> Contact</h2>
                    <p></p>
                </div>
                <div class="row">

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box icon-box-cyan">
                            <div class="icon"><i class="bx bx-file"></i></div>

                            <h4 class="title"><a href="">Agrément ministère des travaux publics</a></h4>
                            <p class="description" style="color: #e3342f"><strong>n°113/2005 • n°02/2020</strong></p>
                            <br>
                            <h4 class="title"><a href="">Agrément ministère de l'habitat</a></h4>
                            <p class="description" style="color: #e3342f"><strong>°01/398/369/2010 • n°07/930/717/2017/R </strong></p>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-pink">
                            <div class="icon"><i class='bx bxs-phone-call'></i></div>
                            <h4 class="title"><a href=""> Contactez-nous sur ces numèros </a></h4>

                            <p class="description"><a href="tel:213 31 733 169"><i class="bx bxs-phone"><strong>  +213 31 733 169 </strong></i> </a></p>
                            <p class="description"><a href="tel:+213 31 733 167"><i class="bx bxs-calculator"><strong>  +213 31 733 167 </strong></i></a></p>
                            <p class="description"><a href="tel: +213 550 471 092"><i class="bx bx-mobile-alt"><strong>  +213 550 471 092 </strong></i></a></p>
                            <br>
                            <h4 class="title"><a href="">Suivez-nous </a></h4>
                            <h2><a href="mailto:lvbeton@yahoo.fr" class="email"><i class="bx bxl-yahoo"></i></a>
                            <a href="https://www.facebook.com/lvbzekkour" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/lvbzekkour" class="instagram"><i class="bx bxl-instagram"></i></a>
                            </h2>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class='bx bxs-map'></i></div>
                            <h4 class="title"><a href=""> Adresse </a></h4>
                            <p class="description"> 25, rue Boutarfa (Ex Rue Voltaire), Sidi Mabrouk 25004, Constantine DZ<br></p>
                            <br>
                            <h4 class="title"><a href=""> Google Map </a></h4>
                            <div class="icon icon-box-red"><a href="#footer"><i class='bx bx-map-alt'></i> </a></div>
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class='bx bxs-direction-right'></i></div>

                            <h4 class="title"><a href=""> Directions </a></h4>
                            <p class="description"> Sidi Mabrouk Inférieur > Chemin Forestier > Esplanade École supérieure de comptabilité et finances (à droite) > LVB ZEKKOUR (Ruelle à gauche)<br></p>

                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->


        <!-- ======= Client Section ======= -->
        <section class="features" id="clients">
            <div class="container" >
                <div class="section-title" >
                    <h2>Principaux clients</h2>
                    <p></p>
                </div>

                <div class="row" data-aos="fade-up" style="text-align: center;">
                    <div class="col" >
                        <img src="/img/imgAcceuil/clients/pizza.png" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/abrantina.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/ag.png" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/bentini.png" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/chc.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/cevital.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/idom.png" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                    </div>
                </div>

                <div class="row" data-aos="fade-up" style="text-align: center;">
                    <div class="col" >
                        <img src="/img/imgAcceuil/clients/ohl.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/cojaal.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/cec.png" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/dar.jpeg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/energa.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/hyundai.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/rizzani.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <img src="/img/imgAcceuil/clients/youkais.jpg" class="img-fluid" alt="" style="width: 100px; hight:100px;">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Client Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" id="contact">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- ======= Le MAP ======= -->
                    <div class="col footer-links" >
                        <div class="col-lg-3 col-md-6 footer-info">
                            <h3>Localisation</h3>
                        </div>

                        <div class="col-md-8 map-w3-agileits">
                            <iframe style="width: 150%; min-height: 334px;"
                                    src="https://www.google.com/maps/embed/v1/place?q=LVB%20Zekkour&key=AIzaSyDkwtxnJHkgWcmweK-jEV9aCw4feG5SufQ">
                            </iframe>
                        </div><br>
                    </div>
                    <!-- ======= Ffin MAP ======= -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span> NTIC </span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <div class="copy-text">Created with <i class='bx bxs-heart'></i> BY R&A</div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="fonts/vendor/aos/aos.js"></script>
    <script src="fonts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fonts/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="fonts/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="fonts/vendor/php-email-form/validate.js"></script>
    <script src="fonts/vendor/purecounter/purecounter.js"></script>
    <script src="fonts/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="fonts/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>

    </body>

</html>
