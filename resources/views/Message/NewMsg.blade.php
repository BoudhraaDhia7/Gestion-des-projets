@extends('layouts.admin-master')

@section('title')
Messagerie
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Envoyer un message</h1>
  </div>

  <div class="section-body">
    <div class="container-fluid p-0 m-0">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Envoyer un message</h4>
                        </div>
                        <div class="card-body">
                         <form action="/messagerie/store" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">De </label>
                                <div class="col-sm-12 col-md-7"><input type="text" name="Sender" placeholder="" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sujet</label>
                                <div class="col-sm-12 col-md-7"><input type="text" name="Sujet" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">

                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Message</label>
                            <div class="col-sm-12 col-md-7"><textarea style="height: 400px" name="Msg" class="form-control" id="exampleFormControlTextarea1" rows="9"></textarea>
                            </div>
                            </div>
                            <div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7"><button type="submit" class="btn btn-primary">
                                <span>Envoyer</span></button>
                            </div></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>


        </div>

</section>
@endsection
