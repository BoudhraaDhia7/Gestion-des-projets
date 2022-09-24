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
    <div id="topic" class="row-fluid" style="border-bottom: 2px solid #ef6536;width:100%">
        <div id="topic-inner">
            <div id="top-content" class="span9">
                <div ><P class="welcomep">Contactez-Nous</P></div>
                </div>
        </div>

    </div>

    <p style="color:red;margin-top:30px">*Vous voulez saisir le code de vérification récu. </p>

                <div class="twpara-row row-fluid">
                    <form style="margin-top:15px" action="/index/contact/verif/verification" method="POST">
                        @csrf

                        <div class="form-group row mb-4 " style="margin-left: 0">
                            <input type="hidden" name="Sender" value="{{$data1['Sender']}}" >
                            <input type="hidden" name="Number" value="{{$data1['Number']}}">
                            <input type="hidden" name="Sujet" value="{{$data1['Sujet']}}">
                            <input type="hidden" name="Msg" value="{{$data1['Msg']}}">
                            <div class="form-group row mb-4" style="margin-left: 0">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Code de vérification :</label>
                                <div class="col-sm-12 col-md-7"><input id="{{$errors->has('Sujet') ?  'is-invalid':''}}" type="text" name="Code" placeholder="" class="form-control"style="width: 99%">
                                    @if($errors->has('Sujet'))
                                    <small id="text-danger" style="color: red">{{$errors->first('Sender')}}</small>
                                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4" style="margin-left: 0"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7"><button type="submit" class="btn btn-primary">
                                <span>Verifier</span></button>
                            </div></div>
                    </form>
            </div>



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
