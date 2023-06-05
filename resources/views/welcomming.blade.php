@extends('layout.master')
@section('title', 'Dasboard')
@section('breadcrumb1')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
 <!-- small box -->
 <style>
  .card {
  box-shadow: 0 0 0 rgba(0, 0, 0, 0);
  width:840px;
  height: 495px;
  opacity: 100%;
}

.card-body {
  padding: 1.25rem;
  
  background-color: #F4F6F9;
}
  </style>
<!-- ./col -->
<div class="col-lg-11 col-6 mx-auto">
  <div class="mx-auto">
    <div class="card-body">
      <div class="d-flex justify-content-center align-items-center">
        <div class="mr-3">
        <img src="{{ asset("layout/dist/img/hello2.png") }}" alt="hello" class="brand-image text-outline" style="width: 215px; height: 460px;">
        </div>
        <div class="ml-3">
        <h4 style="font-family: 'Montserrat', sans-serif; font-size: 2.1rem; font-weight: bold; color:black;">SELAMAT DATANG</h4>


   

        <?php
        //GetDataPegawai
        try {
          $token = session('token');
          $responseDataPegawai = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid='.session('user')['user_id'])->body();
          $pegawai = json_decode($responseDataPegawai, true);
        } catch (\Exception $e) {
          // Handle the exception, e.g., redirect to the login page
          return redirect('/user/login');
        }
      ?>

      @if (!empty($pegawai['data']['pegawai']))
          @foreach ($pegawai['data']['pegawai'] as $item)
              @if (!empty(session('user')['user_id']) && $item['user_id'] == session('user')['user_id'])
                  @isset($item['nama'])
                  <h4 style="font-family: 'Montserrat', sans-serif; font-size: 0.92rem; color:black;">{{$item['nama']}}</h4>
                  @endisset
                  @break
              @endif
          @endforeach
      @endif
        </div>
      </div>
    </div>
  </div>
</div>


        
@endsection