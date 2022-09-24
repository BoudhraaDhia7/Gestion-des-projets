@extends('layouts.admin-master')

@section('title')
Mise a jour des projet
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@if(Session::get('alert')=="User was successful added!")
<script type='text/javascript'>
    document.addEventListener("DOMContentLoaded", function(event) {
        swal("Succès","Le projet a été modifié avec succès!","success",{
        button:"D'accord",
    });
    });
</script>


@endif
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
     $('.confirm').click(function (e) {
         e.preventDefault();
         var deleted_id=$(this).closest("tr").find('.deleteval').val();

         swal({
                 title:"Êtes-vous sûr?",
                 text:"Une fois supprimées, vous ne pourrez plus récupérer ces données!",
                 icon:"warning",
                 buttons:true,
                 dangerMode:true,
             })
         .then((willDelete)=>{
             if(willDelete){
               var data={
                   "_token":$('input[name="csrf-token"]').val(),
                   "id":deleted_id,
               }
               $.ajax({
                        type:"GET",
                        url:"/home/projet/"+deleted_id+"/d",
                        data:data,
                        success:function (response) {
                            swal("Vos données ont été supprimées",{
                             icon:"success",
                      })
                      .then((willDelete)=>{
                        location.reload();
                      }
                      );
                        }
                    });
             }
         });
     });
 });
 </script>
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Mise a jour des projet</h1>
    </div>

    <div class="section-body" >

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Mise a jour Projet ({{count($data)}})</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped" id="font-table">
                                <tbody>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Adresse</th>
                                        <th>Responsable de projet</th>
                                        <th>Catégorie</th>
                                        <th>Etat</th>
                                        <th>Budget</th>
                                        <th>Date de départ</th>
                                        <th>Date de termination</th>
                                        <th></th>


                                    </tr>
                                    @foreach ($data as $item)
                                    <tr>

                                        <input type="hidden" class="deleteval" value="{{$item->id}}">
                                        <td>{{$item->Titre}}</td>
                                        <td>{{$item->Adresse}}</td>
                                        <td>{{$item->emp}}</td>
                                        <td>{{$item->Cat}}</td>
                                        <td>{{$item->Type=="Encours"?"En cours":$item->Type}}</td>
                                        <td>{{$item->Budget}}</td>
                                        <td>{{$item->DateLancement}}</td>
                                        <td>{{$item->DateFinal}}</td>
                                        <td class="text-right" style="height: 60px;weight: 208px;">
                                            <a href="/home/projet/{{$item->id}}/edit" ><button class="btn btn-primary" style="height: 40px;weight: 40px;" ><i class="fa fa-edit"></i></button>
                                            </a>
                                            <a href="/home/projet/{{$item->id}}/d "class="confirm"><button class="btn btn-danger"style="height: 40px;weight: 40px;" ><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                 </div>
            </div>


    </div>
  </section>
  @endsection

