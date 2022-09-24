@extends('layouts.admin-master')

@section('title')
Messagerie
@endsection
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
                        url:"/messagerie/"+deleted_id+"/d",
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
    <h1>Boite de reception</h1>
  </div>

  <div class="section-body">
    <div class="container-fluid p-0 m-0">

        <div class="card">
            <div class="card-header">
            <h4>Repondez aux nouveaux messages ({{count($data)}})</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Email</th>
                                <th>Némuro</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th></th>

                            </tr>
                            @foreach ($data as $item)
                            <tr>
                                <input type="hidden" class="deleteval" value="{{$item->id}}">
                                <td id="mailid">{{$item->Sender}}</td>
                                <td id="mailid">{{$item->Number}}</td>
                                <td id="mailid">{{$item->Sujet}}</td>
                                <td id="mailid">{{$item->Msg}}</td>
                                <td id="mailid">{{$item->created_at}}</td>

                                <td class="text-right" id="mailid" >
                                    <a href="/messagerie/{{$item->Sender}}/{{$item->Sujet}}/repondre" ><button class="btn btn-primary" style="height: 40px;weight: 40px;"><i class="fas fa-reply"></i></button></a>
                                    <a href="" class="confirm" ><button style="height: 40px;weight: 40px;" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>

            </div>
        </div>

</section>
@endsection
