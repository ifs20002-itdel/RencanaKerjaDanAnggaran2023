@extends('layout.master')
@section('title', 'Dasboard')
@section('breadcrumb1')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
 <!-- small box -->
 <style>
  .card {
    border-radius: 75px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
  width:870px;
}

.card-body {
  border-radius: 20px;
  padding: 1.25rem;
  background-image: url('layout/dist/img/bg2.svg');
}

.card-title {
  font-weight: bold;
  font-size: 1rem;
}

.card-text {
  font-size: 1rem;
}

  </style>
<!-- ./col -->
<div class="col-lg-11 col-6 mx-auto">
  <div class="card bg-gradient-info">
    <div class="card-body">
      <div class="d-flex justify-content-center align-items-center">
        <div class="mr-3">
        <i class="fa-sharp fa-regular fa-face-grin-wink fa-flip fa-4x" style="color: #ffffff;"></i>
        </div>
        <div class="ml-3">
        <h4>Selamat Datang !</h4>

        <?php
          //GetDataPegawai
          $token = session('token');
          $responseDataPegawai = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid='.session('user')['user_id'])->body();
          $pegawai = json_decode($responseDataPegawai, true);
        

        {{-- Store the new refresh token in a variable --}}
        $newRefreshToken = session('refresh_token');

        {{-- Update the refresh token in the session --}}
        session(['refresh_token' => $newRefreshToken]);
        ?>
       
        @foreach ($pegawai['data']['pegawai'] as $item)
        @if($item['user_id'] == session('user')['user_id'])

          <h4>{{$item['nama']}}</h4>
                
        @endif
        @endforeach
        
        </div>
      </div>
    </div>
  </div>
</div>


        
@endsection