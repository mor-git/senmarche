@extends('layouts.layout')
@section('contenu')
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- =======================Debut Modal ======================================= -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
                        <h2 class="pageheader-title">Produits</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Liste des Produits</li>
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
                <div class="alert-success successValidate" role="alert">{{ session('message') }}</div>
            @endif
            <br>
            <div style="text-align : right; margin-right : 12px;"><a href="{{ url('/addProduit')}}" class="btn btn-outline-success">Nouveau Produit</a></div><br>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Liste Produits</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Produit</th>
                                        <!-- <th class="border-0">Catégorie</th> -->
                                        <th class="border-0">Nom Produit</th>
                                        <th class="border-0">Prix / Kg</th>
                                        <th class="border-0">statut</th>
                                        <th class="border-0">Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?> 
                                @foreach($produits as $produit)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><img class="taille" src="{{ asset('assets/images/'.$produit->legende) }}"/></td>
                                        <!-- <td>{{ $produit->categories->name }}</td> -->
                                        <td>{{ $produit->name }}</td>
                                        <td>{{ $produit->prix }}&nbsp;f</td> 
                                        @if($produit->statut == 0 )
                                            <td style="color: red">Indisponible</td>
                                        @else
                                            <td style="color: green">Disponible</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('edit_Produit',$produit->id) }}">
                                                <i class='fas fa-edit' style='font-size:15px;color:green;'></i>
                                            </a>&nbsp;
                                            <!-- <a href="{{ url('supp_Produit',$produit->id) }}"> -->
                                            <a href=""  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class='fas fa-trash-alt' style='font-size:15px;color:red' ></i>
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
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $produits->links() !!}
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- end recent orders  -->
            <!-- ============================================================== -->

            <!-- =======================Debut Modal ======================================= -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
            </button>

            
            <!-- ======================= Fin Modal ======================================= -->
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
    <script>
        $(document).ready(function(){
            $('#exampleModal').click(function(e){
                e.preventDefault();

                // $(.deleteModalBtn)
            })
        });
    </script>
@endsection
    
