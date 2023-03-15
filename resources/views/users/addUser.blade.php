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
                        <h2 class="pageheader-title">Utilisateur</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ajout Utilisateur</li>
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
                        <h5 class="card-header">Ajouter un Utilisateur</h5>
                        <div class="card-body">
                        
                            <form method="post" action="{{ url('/storeUser') }}" id="validationform">
                                @csrf
                                <div class="form-group row">
                                    <label for="nom" class="col-12 col-sm-3 col-form-label text-sm-right">Nom..</label>
                                    <div class="col-12 col-md-5">
                                        <input id="nom" name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}"  autocomplete="nom" autofocus>
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-12 col-sm-3 col-form-label text-sm-right">Phone</label>
                                    <div class="col-12 col-md-5">
                                        <input id="phone" name="phone" type="text" min="1" max="100"  class="form-control @error('phone') is-invalid @enderror"  autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="adresse" class="col-12 col-sm-3 col-form-label text-sm-right">Adresse</label>
                                    <div class="col-12 col-md-5">
                                        <input id="adresse" type="text" name="adresse" class="form-control @error('phone') is-invalid @enderror">
                                        @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                    <div class="col-12 col-md-5">
                                        <input id="email" name="email" type="email" min="1" max="100"  class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                    <div class="col-12 col-md-5">
                                        <input id="password" name="password" type="password" min="1" max="100" class="form-control @error('phone') is-invalid @enderror">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profil" class="col-12 col-sm-3 col-form-label text-sm-right">Profil</label>
                                    <div class="col-12 col-md-5">
                                        <select name="profil" id="profil"  class="form-control @error('profil') is-invalid @enderror">
                                            <option></option>
                                            @foreach($profils as $profil)
                                                <option value="{{ $profil->id }}">{{ $profil->name }}</option>
                                            @endforeach
                                        </select> 
                                        @error('profil')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categProfils" class="col-12 col-sm-3 col-form-label text-sm-right">Domaine</label>
                                    <div class="col-12 col-md-5">
                                        <select name="categProfils" id="categProfils"  class="form-control @error('categProfils') is-invalid @enderror">
                                            <option></option>
                                            @foreach($categProfils as $profil)
                                                <option value="{{ $profil->id }}">{{ $profil->name }}</option>
                                            @endforeach
                                        </select> 
                                        @error('categProfils')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row text-center">
                                    <div class="col col-md-10 offset-sm-1 offset-lg-0">
                                        <button type="submit" class="btn btn-space btn-success">Valider</button>
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
