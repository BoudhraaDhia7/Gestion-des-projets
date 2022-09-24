@extends('layouts.admin-master')

@section('title')
Mise a jour des projet
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                console.log('response:',response);
                len=0;

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
                            placename: 'test'+key,
                            LatLng: [{lat:x,lng:y}],
                            type: Type
                        }
                        console.log('test',test);
                        markerOnmap.push(test);
                    });
                }

    });
    console.log(markerOnmap);

        function initMap() {
            var latlng=new google.maps.LatLng(35.67743306240599, 10.097028163014665);
            var map=new google.maps.Map(document.getElementById('gmap'),{
                                                    zoom:13.5,
                                                    center:latlng,
                                                    mapTypeId:google.maps.MapTypeId.ROADMAP
                                                    });


            markerOnmap.forEach((element,key) => {
                var contentString='<h3>'+element.placename +'</h3>';
                console.log('element.LatLng[0]',element.LatLng[0]);
                const marker=new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(element.LatLng[0].lat), parseFloat(element.LatLng[0].lng)),
                        icon:icons[element.type].icon,
                        map: map,
                    });
                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
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

<div class="row">
    <div class="col-md-12  mt-3"><div id="gmap" class="col-md-12"style=""></div></div>
</div>
