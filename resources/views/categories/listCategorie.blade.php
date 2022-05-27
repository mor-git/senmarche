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
                        <h2 class="pageheader-title">Catégories</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Liste des Catégories</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- recent orders  -->
            <!-- ============================================================== -->
            @if(session('message'))
                <div class="alert-success successValidate">{{ session('message') }}</div>
            @endif
            <br>
            <div style="text-align : right; margin-right : 12px;"><a href="{{ url('/addCategorie')}}" class="btn btn-outline-success">Nouvelle Catégorie</a></div><br>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Liste des Catégories</h5>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Name</th>
                                        <th class="border-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?> 
                                @foreach($categories as $categorie)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $categorie->name }}</td>
                                        <td>
                                            <a href="{{ url('/edit_Categorie', $categorie->id) }}" >
                                                <i class='fas fa-edit' style='font-size:15px;color:green;'></i>
                                            </a>&nbsp;
                                            <a href="{{ url('/supp_Categorie', $categorie->id ) }}" >
                                                <i class='fas fa-trash-alt' style='font-size:15px;color:red'></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php $i++; ?>
                                @endforeach
                                    <tr>
                                        <td colspan="12"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end recent orders  -->
            <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
@endsection
    