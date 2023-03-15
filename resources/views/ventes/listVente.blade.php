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
                    <form id="deleteForm" method="POST">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" id="token" />
                        <div class="modal-body">
                            <input type="text" name="dateSup" id="valInput1"/> 
                            <input type="text"  id="valInput2"/>
                            <p>Etes-vous sûr de vouloir supprimer cette vente ??</p> 
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
                        <h2 class="pageheader-title">Ventes</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Liste des Ventes</li>
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
            <!-- <br> 
            <form action="{{ url('/recherches')}}" method="get" class="d-flex">
                <div class="form-group mb-0 mr-3">
                    <input type="text" name="chearch"  class="form-control" value="">
                </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form> -->
            <div style="text-align : right; margin-right : 12px;"><a href="{{ url('/addVente')}}" class="btn btn-outline-success">Nouvelle Vente</a></div><br>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Liste des Ventes</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0" style="text-align: center;">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Produit</th>
                                        <th class="border-0">Nombre de Kg</th>
                                        <th class="border-0">Montant</th>
                                        <th class="border-0">Total Paye</th>
                                        <th class="border-0">Date Vente</th>
                                        <!-- <th class="border-0">Action</th>  -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?> 
                                @foreach($ventes as $vente)  
                                    <tr style="text-align: center;">
                                        <td>{{ $i }}</td>
                                        <td>{{ $vente->produits->name }}</td>
                                        <td>{{ $vente->nombre }}&nbsp;kg</td>
                                        <td>{{ $vente->montant }}&nbsp;f</td>
                                        <td>{{ $vente->total }}&nbsp;f</td>
                                        <td>{{ $vente->created_at }}</td>
                                        <!-- <td>
                                            <a href="{{ url('edit_Commande',$vente->id) }}">
                                                <button class="btnBorder"><i class='fas fa-edit' style='font-size:15px;color:green;'></i></button>       
                                            </a>&nbsp;
                                            <a href="{{ url('detail_commande',$vente->user_id) }}">
                                                <button class="btnBorder"><i class='fas fa-info' style='font-size:15px;color:blue;'></i></button>       
                                            </a>&nbsp;
                                            <a href="" data-toggle="modal" data-target="#exampleModal">
                                                <button class="lien btnBorder" value="{{ $vente->created_at }}">
                                                    <input type="hidden" class="IdUser" value="{{ $vente->user_id }}">
                                                    <i class='fas fa-trash-alt' style='font-size:15px;color:red'></i>
                                                </button>
                                            </a>
                                        </td> -->
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
                        {!! $ventes->links() !!}
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
<!-- @section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
     $(document).ready(function(){
         $('.lien').on('click',function(){
            var dateCreate = $(this).val();
            var user_id = $('.IdUser').val();
            $('#valInput1').val(dateCreate);
            $('#valInput2').val(user_id);
            $('#deleteForm').attr('action','/supp_Commande')
         })
         $('.IdUser').val() == 0;
     });
</script>
@endsection -->
    
