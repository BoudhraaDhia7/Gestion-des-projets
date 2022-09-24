@extends('layouts.admin-master')

@section('title')
Gérer les utilisateurs
@endsection
@if(Session::get('alert')=="User was successful added!")
<script type='text/javascript'>
    document.addEventListener("DOMContentLoaded", function(event) {
        swal("Succès","Employé a été ajouté avec succès!","success",{
        button:"D'accord",
    });
    });
</script>;

@endif
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Gérer les utilisateurs</h1>
  </div>
  <div class="section-body">
      <users-component></users-component>
  </div>
</section>
@endsection
