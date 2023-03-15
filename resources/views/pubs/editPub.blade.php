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
                        <h2 class="pageheader-title">Publicitè </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Modifier Pub</li>
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
                        <h5 class="card-header">Modifier le Pub</h5>
                        <div class="card-body">
                            <form method="post" action="{{ url('/modifierPub',$pub->id ) }}" id="validationform" enctype="multipart/form-data">
                                <input type="hidden" value="{{csrf_token()}}" name="_token" id="token" />
                                 
                                <!-- <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
                                    <div class="col-12 col-md-5">
                                        <input type="file" name="image"  value="{{ $pub->chemin }}" class="form-control">
                                    </div>
                                </div> -->
                                <input type="hidden" value="{{ $pub->chemin }}" name="image" />
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Nom Pub</label>
                                    <div class="col-12 col-md-5">
                                        <input required="" name="libele" type="text"  value="{{ $pub->libele }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Statut</label>
                                    <div class="col-12 col-md-5">
                                        <select required="" name="statut" id=""  class="form-control">
                                            <option></option>
                                            <option value="1">Activer Publicitè</option>
                                            <option value="0">Désactiver Publicitè</option>
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