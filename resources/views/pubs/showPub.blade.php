@extends('layouts.layout')

@section('contenu') 
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- =======================Debut Modal ======================================= -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="deleteForm" method="GET">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" id="token" />
                        <div class="modal-body">
                            <input type="hidden" name="deleteProd" id="valInput"/>
                            <p>Etes-vous sûr de vouloir supprimer cette pub ??</p> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary deleteProduit">Supprimer</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- ======================= Fin Modal ======================================= -->  
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
            @if(session('messageAdd'))
                <div class="alert-success successValidate">{{ session('messageAdd') }}</div>
            @elseif(session('messageUpdate'))
                <div class="alert-success successValidate">{{ session('messageUpdate') }}</div>
            @elseif(session('messageDelete'))
                <div class="alert-danger successValidate">{{ session('messageDelete') }}</div>
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
                                                <button class="btnBorder"><i class='far fa-edit' style='font-size:15px;color:rgb(115, 194, 251);'></i></button>
                                            </a>&nbsp;&nbsp;
                                            <a href="" >
                                                <button class="btnBorder"><i class='fas fa-info' style='font-size:15px;color:rgb(0, 255, 0)'></i></button>
                                            </a>&nbsp;&nbsp;&nbsp;
                                            <!-- <a href="{{ url('/destroyPub/'.$pub->id)}}" data-toggle="modal" data-target="#exampleModal"> -->
                                            <a href="" data-toggle="modal" data-target="#exampleModal">
                                                <button class="lien btnBorder" value="{{ $pub->id }}"><i class='far fa-trash-alt' style='font-size:15px;color:red'></i></button>
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
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
     $(document).ready(function(){
         $('.lien').on('click',function(){
            var id = $(this).val();
            // $('#valInput').val(id);

            $('#deleteForm').attr('action','/destroyPub/'+id)
         })
     });
</script>
@endsection