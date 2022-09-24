<!DOCTYPE html>
<html lang="en">
<head>
    <!doctype html><html lang="fr">
        <head><meta charset="utf-8">
            <title>Bienvenue sur notre site de GOUVERNORAT KAIROUAN</title>
        <meta property="og:url" content="/"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="Bienvenue sur notre site"/>
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:title" content="Bienvenue sur notre site"/>
        <meta name="generator" content="Lauyan TOWeb 9.0.6.907"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href={{asset("assets/_scripts/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">
        <link href={{asset("assets/_frame/style.css")}} rel="stylesheet"><link rel="stylesheet" media="screen" href={{asset("assets/_scripts/colorbox/colorbox.css")}}>
        <link rel="stylesheet" href={{asset("assets/_scripts/bootstrap/css/font-awesome.min.css")}}>
        <style>.alert a{color:#003399}.ta-left{text-align:left}.ta-center{text-align:center}.ta-justify{text-align:justify}.ta-right{text-align:right}.float-l{float:left}.float-r{float:right}.flexobj{flex-grow:0;flex-shrink:0;margin-right:1em;margin-left:1em}.flexrow{display:flex !important;align-items:center}@media (max-width:767px){.flexrow{flex-direction:column}};</style>
        <link href={{asset("assets/_frame/print.css") }}rel="stylesheet" type="text/css" media="print">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link rel="stylesheet" href="{{asset("assets/css/stylemap.css")}}">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              $(document).ready(function(){
                  $.ajax({
                          url:"/tt",
                          method:"GET",
                          dataType:'json',
                          success:fun,
                          async: false
                      });
                      function fun(response)
                  {
                      var np=0;
                      var penc=0;
                      var pachv=0;
                      response['data'].forEach((element,key) => {

                            if(element.Type=="Nouveau")
                                np++;
                            else
                            if(element.Type=="Encours")
                                penc++;
                            else
                            if(element.Type=="Terminer")
                                pachv++;
                        });
                        console.log("nv",np,"enc ",penc,"ter ",pachv);
                        var data = new google.visualization.DataTable();
                              data.addColumn('string', 'Topping');
                              data.addColumn('number', 'Slices');
                              data.addRows([
                                ['Nouveaux projet', np],
                                ['Projet en cours', penc],
                                ['Projet achevé', pachv],

                              ]);
                              var data2 = new google.visualization.DataTable();
                              data2.addColumn('string', 'Topping');
                              data2.addColumn('number', 'Slices');
                              data2.addRows([
                                ['Projet total', response['data'].length],
                                ['Nouveaux projet', np],
                                ['Projet en cours', penc],
                                ['Projet achevé', pachv],

                              ]);

                              var piechart_options = {title:'Statistique des projet (Total projet actuel:'+response['data'].length+')',
                                             width:400,
                                             height:300};
                              var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
                              piechart.draw(data, piechart_options);

                              var barchart_options = {title:'Statistique des projet (Total projet actuel:'+response['data'].length+')',
                                             width:400,
                                             height:300,
                                             legend: 'none'};
                              var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
                              barchart.draw(data2, barchart_options);
            }
        });



      }

    </script>
    </head>
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
                    url:"/tt",
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
                        var contentString='<div class="cen"><img src="{{asset("assets/img/logo.gif")}}" class="infobarImg"></div>'+'<p class="Ptitre"> '+element.titre+'</p>'
                        +'<p class="infowindowp">'+'<b>Budget:</b>'+element.budget+' DT <br>'+'<b>Constructeur :</b>'+element.emp+
                        '<br><b>Adresse: </b>'+element.placename+'<br><b>Date de lancement: </b>'+element.dateL+'<br><b>Date de fin des travaux: </b>'+element.dateF;
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
    <title>Document</title>
</head>
<body>
    <div id="site">
        <div id="page">
            <header>
                <div id="toolbar1" class="navbar">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <ul id="toolbar1_l" class="nav">
                                <li><a id="logo" href="{{route("index")}}">
                                    <span id="logo-lt">Gouvernorat</span>
                                    <span id="logo-rt">Kairouan</span><br>
                                    <span id="logo-sl">Projets Réalisés par le gouvernorat de Kairouan</span>
                                </a></li></ul>
                                <ul id="toolbar1_r" class="nav pull-right">
                                    <li><div id="sharebox">
                                        <a target="_blank" href="https://www.facebook.com/Kairouan.Tunisia" rel="noopener">
                                            <img style="width:30px;height:30px" src={{asset("/assets/_frame/tw-share-facebook@2x.png")}} class="anim-360" alt="facebook">
                                        </a><a target="_blank" href="https://www.twitter.com/" rel="noopener">
                                            <img style="width:30px;height:30px" src={{asset("/assets/_frame/tw-share-twitter@2x.png")}} class="anim-360" alt="twitter"></a>
                                            <a target="_blank" href="https://www.youtube.com/" rel="noopener">
                                                <img style="width:30px;height:30px" src={{asset("/assets/_frame/tw-share-youtube@2x.png")}} class="anim-360" alt="youtube">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="toolbar3" class="navbar">
                        <div class="navbar-inner">
                            <div class="container-fluid">

                                <button type="button" class="btn btn-navbar" style="float:left" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span><span class="icon-bar"></span>
                                </button>
                                <div class="nav-collapse collapse">
                                    <ul id="toolbar3_l" class="nav">
                                        <li><ul id="mainmenu" class="nav">




                                            <li class="{{ Request::route()->getName() == 'index' ? ' active' : ''}}"><a href="{{route("index")}}">Accueil</a></li>
                                            <li class="{{ Request::route()->getName() == 'Apropo' ? ' active' : ''}}"><a href="{{route("Apropo")}}" id="lnk7ae624b6">Présentation</a></li>
                                            <li class="{{ Request::route()->getName() == 'map' ? ' active' : ''}}"><a href="{{route("map")}}">Projets</a></li>
                                            <li ><a target="_blank" href="http://127.0.0.1/gouvernorat/forum/">Forum</a></li>
                                            <li class="{{ Request::route()->getName() == 'ContactUs' ? ' active' : ''}}"><a href="{{route("ContactUs")}}" id="lnk407e8a55">Contactez-Nous</a></li>



</ul>
</li>
</ul>
</div>
</div>
</div>
</div>
</header>
<div id="content" class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-carousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="active item">
                        <img src={{asset("assets/_frame/banner1.jpg")}} alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="topic" class="row-fluid">
        <div id="topic-inner">
            <div id="top-content" class="span9">
                <p class="projettext welcomep">Suivez les derniers progrès des projet :</p>
                <div class="twpara-row row-fluid">
                    <div id="gmap" style="width: 100%;height:650px">

                    </div>
            </div>
            <div class="twpara-row row-fluid">
                <div id="Q6OIaz1K" class="span12 tw-para ">
                    <h2 class="Rounded-bordred" style="text-align:center" ><p>Statistique</p></h2><div class="ptext"><p>
                    <div style="display: flex;flex-direction:row"><div style="margin-right:20px;margin-left:30px" id="piechart_div"></div>
                    <div id="barchart_div"></div>
                    </div>

</p></div></div></div></div><div id="top-sb" class="span3"><div id="2iZQVfNK" class="tw-para "><h2 class="Rounded-bordred" style="text-align:center" ><p>Nos projet</p></h2><div class="ptext">


<p><a href={{route("newProject")}} class="btn btn-primary" id="lnk95f8dee9" style="width:100%;">Nouveaux projets</a></p>
<p><a href={{route("progresedProject")}} class="btn btn-warning" id="lnkcb1ff3ef" style="width:100%;">Projets en cours</a></p>
<p><a href={{route("TerminerProject")}} class="btn btn-danger" id="lnk654bee71" style="width:100%;">Projets Achevés</a></p>




</div></div><div id="LUUM2JJd" class="tw-para "><h2 class="Rounded-bordred" style="text-align:center" ><p>Sondage</p></h2><div class="ptext"><p>




<iframe class="sn" scrolling="no" frameborder="0" allowtransparency="true" title="Sondages Pixule"  height="365" src="//www.pixule.com/widget454953654196" data-key="454953654196"></iframe>



</p></div></div></div></div></div></div><footer>
    <div id="footerfat" class="row-fluid">
        <div class="row-fluid">
            <div  id="footerfat_s1" class="span4 tw-para">
                <strong>Contact</strong><br><br>Adresse : Avenue de l' Environnement KAIROUAN KAIROUAN<br>
                Tél : 77226777<br>Fax : 77228450<br>E-mail : gouv.gouvkairouan@planet.tn
                <a onclick="javascript:return(decMail2(this));" href="znvygb?pbagnpg#lbhefvgr.pbz" id="lnkdff43647">
                </a></div><div  id="footerfat_s2" class="span4 tw-para">
                    <strong>Plan du site</strong>
                    <ul>

<li class="active"><a href="{{route("index")}}">Accueil</a></li>
<li><a href="{{route("Apropo")}}" id="lnk7ae624b6">Présentation</a></li>
<li><a href="{{route("map")}}">Projets</a></li>
<li><a target="_blank" href="http://127.0.0.1/gouvernorat/forum/">Forum</a></li>
<li><a href="{{route("ContactUs")}}" id="lnk407e8a55">Contactez-Nous</a></li>


</ul></div><div  id="footerfat_s3" class="span4 tw-para"><strong>Nos Projets</strong><ul>

    <li><a href="{{route("newProject")}}" id="lnk72a59317">Nouveaux projets</a></li>
    <li><a href="{{route("progresedProject")}}" id="lnk4f4b3e17">Projets en cours</a></li>
    <li><a href="{{route("TerminerProject")}}" id="lnkfd9dbb92">Projets Achevés</a></li>


</ul>
</div>
</div>
</div>
<div id="footersmall" class="row-fluid">
    <div id="foot-sec1" class="span6 "> © Copyright Boudhraa Dhia eddine. Tous droits réservés.</div>
    <div id="foot-sec2" class="span6 "><div style="text-align: right; ">
        <a href="_tos.html" id="lnkdfc5e39d">Termes &amp; Conditions</a>
    </div>
</div>
</div>
</footer>
</div>
</div>
<script src={{asset("assets/_scripts/jquery/jquery.min.js")}}>
</script>
<script src={{asset("assets/_scripts/bootstrap/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/_scripts/colorbox/jquery.colorbox-min.js")}}>
</script><script src={{asset("assets/_scripts/cookie/jquery.ckie.min.js")}}>
</script>




</body>
</html>
