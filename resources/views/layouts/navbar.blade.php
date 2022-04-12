<div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header"> 
            <nav class="navbar navbar-expand-lg bg-success fixed-top">
                <a  href="#"><img src="{{ asset('assets/images/valider.png')}}" alt="" style="height: 50px; weight: 50px;"><span style="color: white; padding-top: 80%;">Sen Marché</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!-- <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li> -->
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: #2EC551;">
                                    <h5 class="mb-0 text-white nav-user-name">Name</h5>
                                    <span class="status"></span><span class="ml-2">libelle</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off mr-2"></i>Logout
                                </a>
                                <form id="logout-form" action="" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <!-- <div class="nav-left-sidebar sidebar-dark" style="background-color: gray;"> -->
        <div class="nav-left-sidebar">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item" style="color: white;">
                                <a class="nav-link active" href="{{ url('/addCategorie')}}" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                                <!-- <a class="nav-link" href="index.html">E Commerce Dashboard</a> -->
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Produits</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/addProduit')}}">Nouveau Produit</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/produits')}}">Liste Produits</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fab fa-fw fa-wpforms"></i>Commande</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/addCategorie')}}">Ajout Commande</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/addCategorie')}}">Liste Commandes</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fab fa-fw fa-wpforms"></i>Publicitè</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/addCategorie')}}">Add Pub</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/addCategorie')}}">Liste Pub</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->


                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Paramétres</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/categories')}}">Catégories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/profils')}}">Profils</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/addCategorie')}}">Users</a>
                                        </li>
                                        
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/addCategorie')}}">Communes</a>
                                        </li> -->
                                        <li>
                                            <a class="dropdown-item nav-link" href=""
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                <i class="fas fa-power-off mr-2"></i>Logout
                                            </a>
                                            <form id="logout-form" action="" method="POST" style="display: none;">
                                                    @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
</div>
