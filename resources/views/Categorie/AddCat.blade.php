@extends('layouts.admin-master')

@section('title')
Ajouter une Categorie
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Ajouter une Categorie</h1>
  </div>
  <div class="section-body">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajouter une Categorie</h4>
                    </div>
                    <div class="card-body">
                     <form action="/home/cat/add/add" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Libelle</label>
                            <div class="col-sm-12 col-md-7"><input type="text" name="Libelle" placeholder="Entrer Libelle de catégorie a ajouter." class="form-control">
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
