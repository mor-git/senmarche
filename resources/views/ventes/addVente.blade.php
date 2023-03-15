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
                        <!-- <h2 class="pageheader-title">Vente</h2> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ajout Vente</li>
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
                        <h5 class="card-header">Ajouter une Vente</h5>
                        <div class="card-body">
                        
                            <!-- <form  id="validationform"> -->
                                <!-- <input type="hidden" value="{{csrf_token()}}" name="_token" id="token" /> -->
                                
                                <div class="form-group row">
                                    <!-- <label class="col-12 col-sm-3 col-form-label text-sm-right"></label> -->
                                    <div class="col-12 col-sm-3 col-form-label text-sm-right" style='font-size:16px;color:red' id="total">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <select name="Catégorie" id="produit"  class="form-control">
                                            <option>---- Choix Produit ----</option>
                                            @foreach($produits as $produit)
                                                <option value="{{ $produit->id }}" required="">{{ $produit->name }}</option>
                                            @endforeach
                                        </select> 
                                        
                                        <!-- error('Catégorie')
                                        <div class="alert-danger">{$message }}</div>
                                        enderror -->
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <input type="number" name="nombreKg" required=""  id="kg" class="form-control" placeholder="Nbr de Kg."> 
                                    </div>
                                    
                                    <div class="col col-md-4 offset-sm-1 offset-lg-0  ajout">
                                        <button type="submit" class="btn btn-space btn-success" id="btn">Ajouter</button>
                                        <button type="reset" class="btn btn-space btn-secondary" id="btnAnnuler">Annuler</button>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- end valifation types -->
            <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " >
                <div class="card liste"  id="liste">
                    <!-- <h5 class="card-header">Liste des Secteurs</h5> -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0" style='text-align:center;'>
                                        <th class="border-0">#</th>
                                        <th class="border-0">Produit</th>
                                        <th class="border-0">Prix Unitaire</th>
                                        <th class="border-0">Nombre de Kg</th>
                                        <th class="border-0">Montant</th>
                                        <th class="border-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="panier">
                                    
                                    <!-- <tr >
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href=""  data-toggle="modal" data-target="#exampleModal">    
                                                <button class="lien btnBorder" value=""><i class='fas fa-trash-alt' style='font-size:15px;color:red'></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12"></td>
                                    </tr> -->
                                    
                                </tbody>
                                
                            </table>
                            <div><button type="button" class="btn btn-outline-success btn-block" id="btnValider">Valider</button></div>
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
    <!-- end main wrapper --> 
    <!-- ============================================================== -->
@endsection
@section('script')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" 
    integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script> -->
<script>
$(document).ready(function(){
    $('#btnValider').hide();
    $('#liste').hide();
    var $i=0;
    var total = 0;

    // Pour ajouter dans le panier

   $('#btn').click(function(){ 
        $('#liste').show();
        var id=$("#produit").val();
        var nombreKg=$('#kg').val();
        
        $.ajax({
            type: "GET", 	                 
            url: "{{url('avendre')}}/"+id,  
            dataType: "json",
            success : function (data) {
                var montant = data.prix * nombreKg;
                $('#panier').append("<tr id='tr-"+$i+"'  style='text-align:center;'><td>"+$i+"</td><td id='produit'>"
                +data.name+"</td><td>"
                +data.prix+"</td><td>"
                +nombreKg+"</td><td>"
                +montant+"</td><td id='supprimer'><i class='far fa-trash-alt' style='font-size:15px;color:red'></i></td></tr>");
                console.log(data);
                total = total + montant;
                $('#total').html(total); 

                console.log('tr-'+$i);
            }   
        });
        $i++;
        $('#btnValider').show();
        $('#kg').val("");
        $('#produit').val(""); 
        console.log(total);
        
    });

// Pour spprimer une ligne 

    // $("#'tr-'+$i").click(function(){
    //     $(this).remove();
    //     // return false;
    // });

// Annler la panier  
$('#btnAnnuler').click(function() {
        location.reload(true);
    });

// Pour enregistrer dans la table 

    $('#btnValider').click(function(){ 
        var tabs = [];
        var total = $("#total").html();

        $('#panier tr').each(function(){
            var produit = $(this).find("td:eq(1)").html();
            var prixUnit = $(this).find("td:eq(2)").html();
            var nmbreKg = $(this).find("td:eq(3)").html();
            var montant = $(this).find("td:eq(4)").html();

            tabs.push({'nom':produit,'pu':prixUnit,'qt':nmbreKg,'montant':montant,'total':total});
            
        }); 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                }
        }); 
        var urlVentes = "{{ url('ventes')}}";
        $.ajax({
            type: "POST", 	               
            url: "{{ url('storeVente')}}",  
            data: {'content': tabs},
            dataType : "JSON",
            success : function (data) { 
               console.log(data);
               window.location.href = urlVentes;
            // window.location.replace("{{ url('ventes')}}");
            },
            error: function(err){
                alert("Erreur ajax :",err.responseText);
            }
        });
        
    });
}); 
</script>
@endsection