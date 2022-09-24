@extends('layouts.admin-master')

@section('title')
Affecter les ordres de travail
@endsection

@section('content')
@foreach ($items as $dataid)
{

}
 @endforeach
<section class="section">
  <div class="section-header">
    <h1>Affecter les ordres de travail</h1>
  </div>
  <div class="section-body">
        <div class="row">
            @foreach ($data as $item)

            @endforeach


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Affecter les ordres de travail</h4>
                    </div>
                    <div class="card-body">
                     <form action="/home/projet/emp/{{$dataid}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="Type" value="Encours">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Responsable projet</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="emp" class="form-control" >
                                    @foreach ($data as $item )
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
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
