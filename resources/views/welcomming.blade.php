@extends('layout.master')
@section('title', 'Dasboard')
@section('breadcrumb1')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
 <!-- small box -->
<!-- ./col -->
<div class="col-lg-7 col-6 mx-auto">
  <!-- small box -->
  
  <div class="small-box bg-info" style="border-radius: 25px">
    <div class="inner text-center">
        <h5>Selamat Datang!</h5>
      <h4 class="text-nowrap">{{Auth::user()->nama}}</h4>
      <div class="text-sm-end">
        <p style="text-end">Semoga Hari Anda Menyenangkan :-)</p>
      </div>
    </div>
  </div>
</div>

        
@endsection