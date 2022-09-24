@extends('layouts.admin-master')

@section('title')
Statistique des projet
@endsection
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Statistique des projet</h1>
    </div>

    <div class="section-body" >

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistique des projet ({{count($data1)}})</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped" id="font-table" style="">
                                <tbody>
                                    <tr>
                                        <th style="color: #6777ef;font-weight: bold;">Nouveau Projet</th>
                                        <th style="color:red;font-size:15px;font-weight: bold;">{{count($data1)}}</th>




                                    </tr>
                                    <tbody>
                                        <th style="color: #6777ef;font-weight: bold;">Projet en cours</th>
                                        <td style="color:red;font-size:15px;font-weight: bold;">{{count($data2)}}</td>
                                    </tbody>
                                    <tr>
                                        <th style="color: #6777ef;font-weight: bold;">Projet terminer</th>
                                        <th style="color:red;font-size:15px;font-weight: bold;">{{count($data3)}}</th>
                                    </tr>
                                    <tbody>
                                        <th style="color: #6777ef;font-weight: bold;">Projet dépasser</th>
                                        <td style="color:red;font-size:15px;font-weight: bold;">{{count($data4)}}</td>
                                    </tbody>


                            </table>
                        </div>
                 </div>
            </div>


    </div>
  </section>
  @endsection

