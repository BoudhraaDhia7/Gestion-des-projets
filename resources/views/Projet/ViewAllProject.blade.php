@extends('layouts.admin-master')

@section('title')
Map
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset("assets/css/stylemap.css")}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script>
    var infoObj=[];
    var map;
    const icons = {
                Nouveau: {
                        icon: 'http://fixkairouan.org/img/point1.png',
                },
                Encours: {
                        icon: 'http://fixkairouan.org/img/point2.png',
                },
                Terminer: {
                        icon:'http://fixkairouan.org/img/point3.png',
                 },
                    };
    var markerOnmap = [];

     $(document).ready(function(){

            $.ajax({
                url:"/t",
                method:"GET",
                dataType:'json',
                success:fun,
                async: false
            });
        function fun(response)
        {
                    len=0;
                    console.log(response);
                    len=response['data'].length;
                    if (len > 0)
                        // for(var i=0;i<len;i++)
                        // {
                        //     x=response['data'][i].Lat;
                        //     y=response['data'][i].Lon;
                        //     Type=response['data'][i].Type;
                        //     markerOnmap[i]={LatLng:[{lat:x,lng:y}],type:Type};

                        // }
                        response['data'].forEach((element,key) => {
                            x=element.Lat;
                            y=element.Lon;
                            Type=element.Type;
                            var test = {
                                id:element.id,
                                titre: element.Titre,
                                placename: element.Adresse,
                                budget:element.Budget,
                                emp:element.emp,
                                dateL:element.DateLancement,
                                dateF:element.DateFinal,
                                LatLng: [{lat:x,lng:y}],
                                type: Type
                            }

                            markerOnmap.push(test);

                        });

                    }


        });


            function initMap() {
                var latlng=new google.maps.LatLng(35.67743306240599, 10.097028163014665);
                var map=new google.maps.Map(document.getElementById('gmap'),{
                                                        zoom:13.2,
                                                        center:latlng,
                                                        mapTypeId:google.maps.MapTypeId.ROADMAP
                                                        });


                markerOnmap.forEach((element,key) => {
                    var contentString='<div class="cen"><img src="{{asset("assets/img/logo.gif")}}" class="infobarImg"></div>'+'<div class="info">'+'<p class="Ptitre"> '+element.titre+'</p>'
                    +'<p class="infowindowp">'+'<b>Budget:</b>'+element.budget+' DT <br>'+'<b>Constructeur :</b>'+element.emp+
                    '<br><b>Adresse: </b>'+element.placename+'<br><b>Date de lancement: </b>'+element.dateL+'<br><b>Date de fin des travaux: </b>'+element.dateF+"</div>"+'<a  class="btn btn-primary" id="button-map"  target="_blank" href="/home/projet/'+element.id+'/edit"> Mise à jour'+"</a>";
                    const marker=new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(element.LatLng[0].lat), parseFloat(element.LatLng[0].lng)),
                            icon:icons[element.type].icon,
                            map: map,
                        });
                        const infowindow = new google.maps.InfoWindow({
                            content: contentString,
                            maxWidth: 300,
                        });

                        marker.addListener("click", function() {
                            Close();
                            infowindow.open(marker.get('map'), marker);
                            infoObj[0]=infowindow;
                        });
                });
            }
            function Close(){
                if(infoObj.length>0)
                {
                    infoObj[0].set("marker",null);
                    infoObj[0].close();
                    infoObj[0].length=0;
                }

            }
            window.onload=function()
            {

                initMap();

            };
    //end change on map
    </script>
    <script async defer src="https://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@if(Session::has('alert'))
    <script>
    $( document ).ready(function() {
        swal("Succès","Le projet a été ajouté avec succès!","success",{
        button:"D'accord",
    });
            });</script>
@endif

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Consulter tout les projet (Map)</h1>
  </div>

  <div class="section-body" >
    <div class="container-fluid">
        <div class="row pt-3">
                <div class="card-body">

        <div class="row">
            <div class="col-md-12  mt-3"><div id="gmap" class="col-md-12"style=""></div></div>
        </div>
    </div>

  </div>
</section>
@endsection
