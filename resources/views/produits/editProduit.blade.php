@extends('layouts.layout')

@section('contenu') 
 <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Produit</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Modifier Produit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->        
            <div class="row">
            <!-- ============================================================== -->
            <!-- valifation types -->
            <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Modifier un Produit</h5>
                        <div class="card-body">
                            <form method="post" action="{{ url('/modif_Produit',$produit->id) }}" id="validationform" enctype="multipart/form-data">
                                <input type="hidden" value="{{csrf_token()}}" name="_token" id="token" />
                                
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Image Produit</label>
                                    <div class="col-12 col-md-5">
                                        <input type="file" name="image"  data-parsley-minlength="6" value="{{ $produit->legende }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Nom Produit</label>
                                    <div class="col-12 col-md-5">
                                        <input required="" name="name" type="text" min="6" max="100" value="{{ $produit->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Prix Produit</label>
                                    <div class="col-12 col-md-5">
                                        <input type="text" name="prix" required="" data-parsley-maxlength="6" value="{{ $produit->prix }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Statut</label>
                                    <div class="col-12 col-md-5">
                                        <select name="statut"  class="form-control" required="">
                                            <option></option>
                                            <option value="1">Activer Produit</option>
                                            <option value="0">Désactiver Produit</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Catégorie</label>
                                    <div class="col-12 col-md-5">
                                        <select name="categorie"   class="form-control"  required="">
                                            <option></option>
                                            @foreach($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                            
                                <div class="form-group row text-center">
                                    <div class="col col-md-10 offset-sm-1 offset-lg-0">
                                        <button type="submit" class="btn btn-space btn-success">Modifier</button>
                                        <button type="reset" class="btn btn-space btn-secondary">Annuler</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- end valifation types -->
            <!-- ============================================================== -->
            </div>
        
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper --> 
    <!-- ============================================================== -->
@endsection