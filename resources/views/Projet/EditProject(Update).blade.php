@extends('layouts.admin-master')

@section('title')
Mise a jour des projet
@endsection
@foreach ($data as $item )

@endforeach
<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="application/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
<script type="application/javascript">
 $(function(){

var latlng=new google.maps.LatLng(35.67743306240599, 10.097028163014665);
var map=new google.maps.Map(document.getElementById('gmap'),{
                                                    zoom:13.5,
                                                    center:latlng,
                                                    mapTypeId:google.maps.MapTypeId.ROADMAP
                                                    });

var id = "{{$item->id}}";

 $.ajax({
     url:'/tt/'+id,
     type: 'get',
     dataType:'json',
     success:function(response){

        

         var len=1;

        console.log(response)
         if(len>0){
                console.log(id)
                 var x=response['data'][0].Lat;
                 var y=response['data'][0].Lon;
                    console.log(x+"y:"+y);
                 var marker=new google.maps.Marker({
                           position:new google.maps.LatLng(x, y),
                           map:map,
                           draggable:true,
                           animation:google.maps.Animation.DROP
                       });

         }
document.getElementById("la").value = marker.getPosition().lat();
document.getElementById("ln").value = marker.getPosition().lng();

//change on map
marker.addListener( 'mouseover', function(event) {
    document.getElementById("la").value = event.latLng.lat();
    document.getElementById("ln").value = event.latLng.lng();
});
marker.addListener( 'mouseout', function(event) {
    document.getElementById("la").value = event.latLng.lat();
    document.getElementById("ln").value = event.latLng.lng();
});
     }
 });

});



//end change on map
</script>
@section('content')

<section class="section">

<div class="section-header">
    <h1>Mise a jour d'un projet</h1>
  </div>

  <div class="section-body" >
    <div class="container-fluid">
        <div class="row justify-content-center">


            <div class="col-md-6  mt-3"><div id="gmap" class="col-md-12"style="height:820px"></div></div>
            <div class="col-md-5 mt-3">
                <form action="/home/projet/{{$item->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                      <label for="ProjectName">Titre de Project</label>
                      <input type="Text" class="form-control"  name="Titre" value="{{old('Titre')==''?$item->Titre:old('Titre')}}">
                    </div>
                    <div class="form-group">
                        <label for="ProjectName">Adresse du projet</label>
                        <input type="Text" class="form-control" name="adresse" value="{{old('adresse')==''?$item->Titre:old('adresse')}}">
                      </div>
                    <div class="form-group">
                      <label for="cat">Catégorie</label>
                      <select class="form-control" id="exampleFormControlSelect1 "name="cat"  >
                        @foreach ($data2 as $item2)
                                 <option value="{{$item2->Libelle}}" @if ($item->Cat==$item2->Libelle)
                                     {!! "selected" !!}
                                 @endif>{{$item2->Libelle}}</option>
                        @endforeach
                      </select>
                    </div>

                      <div class="form-group mt-0 mb-0 p-0 "><label for="budget">Budget du projet</label></div>
                      <div class="input-group">
                        <input type="text" name="Budget" class="form-control {{$errors->has('Budget') ?  'is-invalid':''}}" value="{{old('Budget')==''?$item->Budget:old('Budget')}}" >
                        <div class="input-group-append">
                          <span class="input-group-text">Dt</span>
                        </div>
                      </div>
                      @if($errors->has('Budget'))
                      <small class="text-danger">{{$errors->first('Budget')}}</small>
                    @endif
                    <div class="form-group row">
                        <label for="example-date-input" class="col-3 col-form-label" >Date de départ de projet</label>
                        <div class="col-12">
                          <input class="form-control" type="date" id="example-date-input"name="DateLancement"value="{{$item->DateLancement}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-3 col-form-label ">Date de terminaison de projet</label>
                        <div class="col-12">
                          <input class="form-control" type="date" id="example-date"name="datefinal"value="{{$item->DateFinal}}">
                        </div>
                        <small id="example-date" class="form-text text-muted pl-3">Ce champ est non obligatoire</small>
                      </div>
                      <div class="form-group">
                        <label for="lat">Emplacement sur Google map(Latitude):</label>
                        <input type="Text" name="Lat" class="form-control" id="la"  placeholder="Emplacement sur Google map(Latitude):">
                      </div>
                      <div class="form-group">
                        <label for="lon">Emplacement sur Google map(Longitude):</label>
                        <input type="Text" class="form-control" id="ln" name="Lon"  placeholder="Emplacement sur Google map(Latitude):">
                      </div>
                    <button type="submit" class="btn btn-primary" id="dd" onclick="addMarker();">Sauvegarder</button>
                    <a href="{{route('EditProject')}}"class="btn btn-danger">Annuler</a>
                  </form>
            </div>
        </div>
    </div>

  </div>
</section>
@endsection
