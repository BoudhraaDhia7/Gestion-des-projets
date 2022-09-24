@extends('layouts.admin-master')

@section('title')
Ajout Projet
@endsection

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
<script type="text/javascript">
$(function(){

	var latlng=new google.maps.LatLng(35.67743306240599, 10.097028163014665);
	var map=new google.maps.Map(document.getElementById('gmap'),{
															   zoom:13.5,
															   center:latlng,
															   mapTypeId:google.maps.MapTypeId.ROADMAP
															   });


var x= document.getElementById("la").value ;
var y=document.getElementById("ln").value;
var marker=new google.maps.Marker({
									  position:new google.maps.LatLng(x, y),
									  map:map,
									  draggable:true,
									  animation:google.maps.Animation.DROP
								  });



//default


//change on map
marker.addListener( 'mouseover', function(event) {
    document.getElementById("la").value = event.latLng.lat();
    document.getElementById("ln").value = event.latLng.lng();
});
marker.addListener( 'mouseout', function(event) {
    document.getElementById("la").value = event.latLng.lat();
    document.getElementById("ln").value = event.latLng.lng();
});
});
//end change on map
</script>
@section('content')
<section class="section">
  <div class="section-header mb-2">
    <h1>Ajout d'un projet</h1>
  </div>
  <div class="section-body" >
    <div class="container-fluid" id="container-fluid">
        <div class="card">
            <div class="card-header">
            <h4>Ajouter un nouveau projet</h4>
            </div>
            <div class="card-body m-0 pt-0">
                <div class="row justify-content-center">
                    <div class="col-md-7  mt-3">
                        <div id="gmap" class="col-md-12"style=""></div>
                    </div>
                    <div class="col-md-4 mt-3" >
                        <form action="/home/projet/ajout/add"  method="POST">
                            @csrf
                            <input type="hidden" name="Type" id="" value="Nouveau">
                            <div class="form-group">
                              <label for="ProjectName">Titre de Project</label>
                              <input type="Text" class="form-control  {{$errors->has('Titre') ?  'is-invalid':''}}" id="ProjectName" name="Titre" placeholder="Entrer le titre de projet" value="{{ old('Titre') }}">
                              @if($errors->has('Titre'))
                                <small class="text-danger">{{$errors->first('Titre')}}</small>
                              @endif
                            </div>
                            <div class="form-group">
                                <label for="ProjectName">Adresse du projet</label>
                                <input type="Text" class="form-control {{$errors->has('adresse') ?  'is-invalid':''}}" id="ProjectName" name="adresse" placeholder="Entrer l'adresse du projet" value="{{old('adresse')}}">
                                @if($errors->has('adresse'))
                                <small class="text-danger">{{$errors->first('adresse')}}</small>
                              @endif
                              </div>
                            <div class="form-group">
                              <label for="cat">Catégorie</label>
                              <select class="form-control" name="cat" >
                                 @foreach ($data as $item)
                                 <option value="{{$item->Libelle}}">{{$item->Libelle}}</option>
                                 @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="emp">Constructeur de projet</label>
                                    <input type="Text" class="form-control {{$errors->has('con') ?  'is-invalid':''}}"id="ProjectName" name="con" placeholder="constructeur de projet" value="{{old('con')}}">
                                    @if($errors->has('con'))
                                    <small class="text-danger">{{$errors->first('con')}}</small>
                                  @endif
                              </div>
                              <input type="hidden" name="emp" value="Non affecter">
                              <div class="form-group mt-0 mb-0 p-0 "><label for="budget">Budget du projet</label></div>
                              <div class="input-group">
                                <input type="text" class="form-control {{$errors->has('Budget') ?  'is-invalid':''}}" value="{{old('Budget')}}" name="Budget">
                                <div class="input-group-append">
                                  <span class="input-group-text">Dt</span>
                                </div>
                              </div>
                              @if($errors->has('Budget'))
                              <small class="text-danger">{{$errors->first('Budget')}}</small>
                            @endif
                            <div class="form-group row mt-3">
                                <label for="example-date-input" class="col-5 col-form-label">Date de départ de projet</label>
                                <div class="col-12">
                                  <input class="form-control {{$errors->has('DateLancement') ?  'is-invalid':''}}" type="date" name="DateLancement" value="{{old('DateLancement')}}">
                                  @if($errors->has('DateLancement'))
                                  <small class="text-danger">{{$errors->first('DateLancement')}}</small>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-5 col-form-label">Date de terminaison de projet</label>
                                <div class="col-12">
                                  <input class="form-control" type="date" id="example-date"name="DateFinal"  value="{{old('DateFinal')}}">
                                </div>
                                <small id="example-date" class="form-text text-muted pl-3">Ce champ est non obligatoire</small>
                              </div>
                              <div class="form-group">
                                <label for="lat">Emplacement sur Google map(Latitude):</label>
                                <input type="Text" name="Lat" class="form-control" id="la"  placeholder="Déplacer le marqueur sur map" value="{{old('Lat')==''?35.67743306240599:old('Lat')}}">
                                @if($errors->has('Lat'))
                                <small class="text-danger">{{$errors->first('Lat')}}</small>
                              @endif
                              </div>
                              <div class="form-group">
                                <label for="lon">Emplacement sur Google map(Longitude):</label>
                                <input type="Text" class="form-control" id="ln" name="Lon"  placeholder="Déplacer le marqueur sur map"value="{{old('Lon')==''?10.097028163014665:old('Lon')}}" >
                                @if($errors->has('ln'))
                                <small class="text-danger">{{$errors->first('ln')}}</small>
                              @endif
                              </div>
                            <button type="submit" class="btn btn-primary" id="dd" onclick="addMarker();">Sauvegarder</button>
                            <a href="http://127.0.0.1:8000/home/projet "class="btn btn-danger">Annuler</a>
                          </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

  </div>
</section>
@endsection

