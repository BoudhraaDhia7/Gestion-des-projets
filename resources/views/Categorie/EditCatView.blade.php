@extends('layouts.admin-master')

@section('title')
Modifier une Categorie
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Modifier une Categorie</h1>
  </div>
  <div class="section-body">
        <div class="row">
            @foreach ($data as $item)

            @endforeach
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier une Categorie</h4>
                    </div>
                    <div class="card-body">
                     <form action="/home/cat/{{$item->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Libelle</label>
                            <div class="col-sm-12 col-md-7"><input value="{{$item->Libelle}}"type="text" name="Libelle" placeholder="Entrer Libelle de catégorie a Modifier." class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7"><button type="submit" class="btn btn-primary">
                            <span>Sauvgarder</span></button>
                        </div></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </div>
</section>
@endsection
