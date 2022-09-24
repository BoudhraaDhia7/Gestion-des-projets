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
    <link rel="stylesheet" href="{{asset("assets/css/stylemap.css")}}">
    <script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(176840)</script>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@if(Session::get('alert')=="Msg was successful transfered!")
<script type='text/javascript'>
    document.addEventListener("DOMContentLoaded", function(event) {
        swal("Succès","Votre message a été envoyer avec succès!","success",{
        button:"D'accord",
    });
    });
</script>
@endif
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
                <div style="border-bottom: 2px solid #ef6536;"><p class="welcomep"> À-propos gouvernorat kairouan</p></div>
                <div class="twpara-row row-fluid">
                  <p class="welcomTx">Le gouvernorat de Kairouan est situé à 160 kilomètres de la capitale. Il est limité par le gouvernorat de Zaghouan au nord, de Siliana, de Kasserine et de Sidi Bouzid à l'ouest et par le gouvernorat de Sfax, de Sousse et de Mahdia à l'est.

                    La température moyenne se situe entre 5 et 21 °C en hiver et entre 25 et 42 °C en été. La pluviométrie annuelle est de 250 à 400 millimètres.

                    Administrativement, le gouvernorat est découpé en onze délégations, douze municipalités, sept conseils ruraux1 et 114 imadas.</p>
            </div>
            <div class="twpara-row row-fluid">
                <div id="RsRVE16q" class="span6 tw-para ">
                    <h2 class="Rounded-bordred"  style="text-align:center"><p>Forum de discussion</p></h2>
                    <div class="pobj obj-before" style="text-align:center;">
                        <a href="{{asset("assets/_media/img/small/images.jpg")}}" rel="IYa0">
                            <img class=" frm-simple1"  src={{asset("assets/_media/img/small/images.jpg")}}  style="max-width:100%;width:275px" alt="" loading="lazy">
                        </a>
                    </div>
                    <div class="ptext"><p style="text-align: center;">
                        <a target="_blank" href="http://127.0.0.1/gouvernorat/forum/" class="btn btn-warning" id="lnk08f0f97b">Accéder au forum de discussion</a>
                    </p>
                </div>
            </div>
            <div id="BPAM8WCN" class="span6 tw-para ">
                <h2 class="Rounded-bordred" style="text-align:center"><p>Contactez-Nous</p> </h2>
                <div class="pobj obj-before" style="text-align:center;">
                    <a href="{{asset("assets/_media/img/small/contactpharma-1.jpg")}}" rel="aSMe"><img class=" frm-simple1"  src={{asset("assets/_media/img/small/contactpharma-1.jpg")}}  style="max-width:100%;width:260px" alt="" loading="lazy"></a>
                </div>
                <div class="ptext">
                    <p style="text-align: center;">
                        <a href="{{route("ContactUs")}}" class="btn btn-info" id="lnkbdd63255">Cliquez Ici pour nous contacter</a>
                    </p>
                </div>
            </div>
        </div>
            <div class="twpara-row row-fluid">
                <div id="Q6OIaz1K" class="span12 tw-para ">
                    <h2 class="Rounded-bordred"><p style="text-align:center">Nous Suivre</p></h2><div class="ptext"><p>

                        <div class="iframe">
                            <iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FKairouan.Tunisia&tabs=timeline&width=375&height=400&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" height="400"  style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            <iframe class="yt" width="500" height="400" src="https://www.youtube.com/embed/LEtbkT4Vse0" frameborder="0" allowfullscreen></iframe>
                        </div>





</p></div></div></div></div><div id="top-sb" class="span3"><div id="2iZQVfNK" class="tw-para "><h2 class="Rounded-bordred" ><p style="text-align:center">Nos Projets</p></h2><div class="ptext">


    <p><a href={{route("newProject")}} class="btn btn-primary" id="lnk95f8dee9" style="width:100%;">Nouveaux projets</a></p>
    <p><a href={{route("progresedProject")}} class="btn btn-warning" id="lnkcb1ff3ef" style="width:100%;">Projets en cours</a></p>
    <p><a href={{route("TerminerProject")}} class="btn btn-danger" id="lnk654bee71" style="width:100%;">Projets Achevés</a></p>




</div></div><div id="LUUM2JJd" class="tw-para "><h2 class="Rounded-bordred"><p style="text-align:center">Sondage</p> </h2><div class="ptext"><p>




<iframe  class="sn" scrolling="no" frameborder="0" allowtransparency="true" title="Sondages Pixule"  height="365" src="//www.pixule.com/widget454953654196" data-key="454953654196"></iframe>



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
