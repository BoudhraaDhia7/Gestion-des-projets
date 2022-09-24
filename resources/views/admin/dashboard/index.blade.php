@extends('layouts.admin-master')

@section('title')

Page d'accueil
@endsection
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
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Page d'accueil</h1>
  </div>

  <div class="section-body">
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide pt-3" data-ride="carousel" data-interval='2000'>
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block " src="{{asset('assets/slider/4.jpg')}}" id="sildeIMG" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block " src="{{asset('assets/slider/2.png')}}" id="sildeIMG"alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block " src="{{asset('assets/slider/1.jpg')}}" id="sildeIMG"alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>


      </div>

    </div>




</section>
@endsection
