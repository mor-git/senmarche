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
                        <h2 class="pageheader-title">Ventes</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ventes entre date</li>
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
            <br> 
            <!-- <form action="{ url('/vente_Entre_Date')}}" method="get"> -->
                <div class="form-group row">
                    <!-- <input type="hidden" value="{csrf_token()}}" name="_token" id="token" /> -->
                    <!-- <label class="col-12 col-sm-3 col-form-label text-sm-right"></label> -->
                    <div class="col-12 col-sm-2 col-form-label text-sm-right" style='font-size:16px;color:red' id="total">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" class="form-control" name="dateDebut" id="dateDebut">  
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" class="form-control" name="dateFin" id="dateFin">
                    </div>
                    <div class="col col-md-4 offset-sm-1 offset-lg-0  ajout">
                        <button type="submit" class="btn btn-space btn-success" >Ajouter</button>
                        <button type="reset" class="btn btn-space btn-secondary" id="btnAnnuler">Annuler</button>
                    </div>
                </div>
            <!-- </form> -->
            <br>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card" id="liste">
                    <h5 class="card-header">Liste des Ventes</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0" style="text-align: center;">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Produit</th>
                                        <th class="border-0">Prix Unitaire</th>
                                        <th class="border-0">Nombre de Kg</th>
                                        <th class="border-0">Montant</th>
                                        <th class="border-0">Total Paye</th>
                                        <th class="border-0">Date Vente</th>
                                        <!-- <th class="border-0">Action</th>  -->
                                    </tr>
                                </thead>
                                <tbody id="panier">
                              
                                    <!-- <tr>
                                        <td colspan="12"></td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- {-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {ventes->links() !!}
                    </div> -->
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
        $('#liste').hide();
        var $i = 1;

         $('.btn').click(function(){
            $('#liste').show();
            var dateDeb = $('#dateDebut').val(); 
            var dateFin = $('#dateFin').val();

            $.ajax({ 
                type:"GET",
                url : "{{ url('vente_Entre_Date')}}",
                data: {'dateDebut': dateDeb,'dateFin': dateFin},
                dataType : "JSON",
                success : function(mesdonnes){
                    console.log("Mes donnes", mesdonnes);
                    $.each(mesdonnes, function(index, value){
                        // $(this).each(function(i, value){
                        console.log(value);
                        $('#panier').append("<tr id='tr-"+$i+"'  style='text-align:center;'><td>"+$i+"</td><td id='produit'>"
                        +value.name+"</td><td>"
                        +value.prixUnitaire+"</td><td>"
                        +value.nombre+"</td><td>"
                        +value.montant+"</td><td>"
                        +value.total+"</td><td>" 
                        +value.created_at+"</td></tr>");
                        $i+=1;
                        // });
                   });
                   
                },
                error:function(errors){
                    alert("mangui si biir erreurr bi");
                }
            });
         });
     });
</script>
@endsection
    
