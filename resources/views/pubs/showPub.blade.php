@extends('layouts.layout')

@section('contenu') 
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Publicitès</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Liste des Pubs</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            @if(session('message'))
                <div class="alert-success successValidate">{{ session('message') }}</div>
            @endif
            <br>
            <div style="text-align : right; margin-right : 12px;"><a href="{{ url('/addPub')}}" class="btn btn-outline-success">Nouvelle Pub</a></div><br>
            
            <div class="row">
            <!-- ============================================================== -->
            <!-- valifation types -->
            <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">La liste des Pubs</h5>
                        <div class="card-body">
                        <!-- ========================Liste des Pubs ====================================== -->
                            <div class="container">
                                <div class="row">
                                    @foreach($pubs as $pub)
                                    <div class="col-2 elem">
                                        <img class="taille" src="{{ asset('assets/images/'.$pub->chemin) }}"/><br>
                                        {{ $pub->libele }} <br> 
                                        {{ $pub->datePub }} <br> <br> 
                                        
                                        <div>
                                            <a href="{{ url('/editPub/'.$pub->id)}}" >
                                                <i class='far fa-edit' style='font-size:15px;color:rgb(115, 194, 251);'></i>
                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="" >
                                                <i class='fas fa-info' style='font-size:15px;color:rgb(0, 255, 0)'></i>
                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ url('/destroyPub/'.$pub->id)}}" >
                                                <i class='far fa-trash-alt' style='font-size:15px;color:red'></i>
                                            </a>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <br><br>
                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center">
                                <!-- { $pubs->links() !!} -->
                            </div>
                        <!-- ============================Fin Liste================================== -->
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- end valifation types -->
            <!-- ============================================================== -->
            </div>
        </div>     
    </div>
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->

@endsection