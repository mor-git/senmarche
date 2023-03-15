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
                            <!-- <input type="hidden" name="deleteProd" id="valInput"/> -->
                            <p>Etes-vous sûr de vouloir supprimer cette catégorie ??</p> 
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
            @if(session('messageAdd'))
                <div class="alert-success successValidate">{{ session('messageAdd') }}</div>
            @elseif(session('messageUpdate'))
                <div class="alert-success successValidate">{{ session('messageUpdate') }}</div>
            @elseif(session('messageDelete'))
                <div class="alert-danger successValidate">{{ session('messageDelete') }}</div>
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
                                            <button class="btnBorder"><i class='fas fa-edit' style='font-size:15px;color:green;'></i></button>
                                            </a>&nbsp;
                                            <!-- <a href="{{ url('/supp_Categorie', $categorie->id ) }}" >
                                                <i class='fas fa-trash-alt' style='font-size:15px;color:red'></i>
                                            </a> -->
                                            <a href=""  data-toggle="modal" data-target="#exampleModal">    
                                                <button class="lien btnBorder" value="{{ $categorie->id }}"><i class='fas fa-trash-alt' style='font-size:15px;color:red'></i></button>
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
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
     $(document).ready(function(){
         $('.lien').on('click',function(){
            var id = $(this).val();
            // $('#valInput').val(id);

            $('#deleteForm').attr('action','/supp_Categorie/'+id)
         })
     });
</script>
@endsection
    