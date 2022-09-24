@extends('layouts.admin-master')

@section('title')
Creé employeé
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Ajouter un nouveau employée</h1>
  </div>
  <div class="section-body">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4>Ajouter un nouveau employée</h4>
                </div>
                <div class="card-body">
                    <form action="/emp/store" method="POST">
                        @csrf

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nom employé</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text"  name="name"class="form-control {{$errors->has('name') ?  'is-invalid':''}}" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <small class="text-danger">{{$errors->first('name')}}</small>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Numéro de carte d'identité</label>
                        <div class="col-sm-12 col-md-7">
                            <input  type="text" name="cin" class="form-control {{$errors->has('cin') ?  'is-invalid':''}}" value="{{ old('cin') }}">
                            @if($errors->has('cin'))
                            <small class="text-danger">{{$errors->first('cin')}}</small>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="email" class="form-control {{$errors->has('email') ?  'is-invalid':''}}" value="{{ old('email') }}">
                            @if($errors->has('email'))
                            <small class="text-danger">{{$errors->first('email')}}</small>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="role">
                                @foreach ($data as $item)
                                    <option value="{{$item->name}}" {{$item->name=='Employee'?'selected':''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mot de passe</label>
                        <div class="col-sm-12 col-md-7">
                            <input  type="password"  class="form-control {{$errors->has('password') ?  'is-invalid':''}}"  name="password" >
                            @if($errors->has('password'))
                            <small class="text-danger">{{$errors->first('password')}}</small>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Confirmer le mot de passe</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password"  class="form-control {{$errors->has('cpassword') ?  'is-invalid':''}}" name="cpassword" autocomplete="new-password">
                            @if($errors->has('cpassword'))
                            <small class="text-danger">{{$errors->first('cpassword')}}</small>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button  class="btn btn-primary">Sauvgarder</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection
