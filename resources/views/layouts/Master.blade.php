<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LVB Zekkour </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper" id="app">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light"style="background: #f87f51 !important;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-dark " style=" margin-left : 25px;"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto ">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <div class="user-panel ml-auto">
                    <div class="image">
                        <img src="./img/logout.png" style="margin-top: -4%;" alt="User Image">
                    </div></div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf </form>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-5">
        <!-- Brand Logo -->
        <a  href="{{ url('/') }}" class="brand-link">
            <img src="./img/lvb.png" alt="Project Logo" class="brand-image">
            <span class="brand-text font-weight-light"> LVB Zekkour </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

{{--            <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--                <div class="image">--}}
{{--                    <img src="./img/profile.png" class="" alt="User Image">--}}
{{--                </div>--}}
{{--                <div class="info">--}}
{{--                    <a href="/profile" class="d-block text-capitalize te--}}
{{--                    xt " style="font-size: 1rem">--}}

{{--                        @switch(Auth::user()->usertable_type)--}}
{{--                            @case("ChargePrj")--}}
{{--                            Charge du projet--}}
{{--                            @break--}}
{{--                            @case("AgentTC")--}}
{{--                            Technico-Commercial--}}
{{--                            @break--}}
{{--                            @case("Directeur")--}}
{{--                            Directeur--}}
{{--                            @break--}}
{{--                            @case("Intervenant")--}}
{{--                            Intervenant--}}
{{--                            @break--}}
{{--                            @case("Admin")--}}
{{--                            Admin--}}
{{--                            @break--}}
{{--                        @endswitch--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="./img/prof.svg" class="img-circle elevation-2 " alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block text-capitalize text " style="font-size: 1rem">
                        {{ Auth::user()->nomUtilis }} {{ Auth::user()->prenomUtilis}}
                    </a>
                    <div class="info">
                        <a href="/#" class="d-block text-capitalize text " style="font-size: 1rem">

                            @switch(Auth::user()->usertable_type)
                                @case("ChargePrj")
                                Charge du projet
                                @break
                                @case("AgentTC")
                                Technico-Commercial
                                @break
                                @case("Directeur")
                                Directeur
                                @break
                                @case("Intervenant")
                                Intervenant
                                @break
                                @case("Admin")
                                Admin
                                @break
                            @endswitch
                        </a>
                    </div>
                </div>
            </div>

            <!-- SidebarSearch Form -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
{{--                    <li class="nav-item">--}}
{{--                        <router-link to="/dashboard"  class="nav-link">--}}
{{--                            <img src="./img/speedometer.png" class="nav-icon " alt="User Image">--}}
{{--                            <p>Tableau de bord</p>--}}
{{--                        </router-link>--}}
{{--                    </li>--}}



                        @can('isAgentTCOrChargePrjOrDirecteur')
                            <li class="nav-item">
                                <router-link to="/Intervenant" class="nav-link">
                                    <img src="./img/teamwork.png" class="nav-icon " alt="User Image">
                                    @switch(Auth::user()->usertable_type)
                                        @case("AgentTC")
                                        <p> Gerer Intervenant</p>
                                        @break
                                        @case("Directeur")
                                        <p>Consulter Intervenant</p>
                                        @break
                                        @case("ChargePrj")
                                        <p>Consulter Intervenant</p>
                                        @break
                                    @endswitch
                                </router-link>
                            </li>

                        @can('isChargePrj')
                            <li class="nav-item">
                                <router-link to="/ManipIntervPrj"  class="nav-link">
                                    <img src="./img/gear.png" class="nav-icon fas fa-spin" alt="User Image">
                                    <p> Manipuler Intervenants </p>
                                </router-link>
                            </li>
                        @endcan

                        @can('isAgentTCOrDirecteur')

                            <li class="nav-item">
                                <router-link to="/client"  class="nav-link">
                                    <img src="./img/value.png" class="nav-icon " alt="User Image">
                                    @switch(Auth::user()->usertable_type)
                                        @case("AgentTC")
                                        <p>Gerer Client</p>
                                        @break
                                        @case("Directeur")
                                        <p>Consulter Client</p>
                                        @break
                                    @endswitch
                                </router-link>
                            </li>
                            @can('isAgentTC')
                                <li class="nav-item">
                                    <router-link to="/Projet" class="nav-link">
                                        <img src="./img/proj.png" class="nav-icon " alt="User Image">
                                        <p>Gerer Projet</p>
                                    </router-link>
                                </li>
                            @endcan
                        @endcan
                    @endcan
                    @can('isAdmin')
                        <li class="nav-item">
                            <router-link to="/users" class="nav-link">
                                <img src="./img/target.png" class="nav-icon " alt="User Image">
                                <p>Gestion des utilisateurs</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/ConsulterArchive" class="nav-link">
                                <img src="./img/archive.png" class="nav-icon " alt="User Image">
                                <p>Consulter l'archive</p>
                            </router-link>
                        </li>
                    @endcan
{{--________FIN SWIPYY__________________--}}
                    @can('isIntervenant')
                    <li class="nav-item">
                        <router-link to="/Fiche"  class="nav-link">
                            <img src="./img/clipBoard.png" class="nav-icon " alt="User Image">
                            <p> Fiches Laboratoire</p>
                        </router-link>
                    </li>
                    @endcan


                    @can('isChargePrj')
                        <li class="nav-item">
                            <hr style="height:6px; color:black;">
                            <router-link to="/FichesSuivie"  class="nav-link">
                                <img src="./img/cnt.svg" class="nav-icon " alt="User Image">
                                <p> Fiches suivi non valides</p>
                            </router-link>
                        </li>
                    @endcan
                    @can('isChargePrjOrDirecteur')
{{--                        <li class="nav-item">--}}
{{--                            <router-link to="/ImprimerPV"  class="nav-link">--}}
{{--                                <img src="./img/printer.png" class="nav-icon " alt="User Image">--}}
{{--                                <p> Generer en Excel PVs </p>--}}
{{--                            </router-link>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <router-link to="/ConsulterPrj"  class="nav-link">
                                <img src="./img/project.png" class="nav-icon " alt="User Image">
                                <p> Consulter Projet </p>
                            </router-link>
                        </li>
                    @endcan
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <div class="content-wrapper ">
        <div class="content">

            <div class="container-fluid">
                <router-view></router-view>
                <vue-progress-bar></vue-progress-bar>
            </div>

        </div>
    </div>
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <div class="copy-text">Created with <i class='fas fa-heart'></i> BY R&A</div>
        </div>
        <!-- Default to the left -->
        <strong style="margin-left: 15px">Copyright &copy; PFE 2021 </strong>
    </footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->

<script>
    @auth
        window.user = @json(auth()->user())
    @endauth
</script>

{{--<script src="/js/app.js"></script>--}}
<script src={{mix("/js/app.js")}}></script>
</body>
</html>
