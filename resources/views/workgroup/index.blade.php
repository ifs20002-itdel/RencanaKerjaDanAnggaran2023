@extends('layout.master')
@section('title', 'Workgroup')

@section('breadcrumb1')
    <li class="breadcrumb-item">Group</li>
@endsection

@section('judulTengah', 'Workgroup')

@section('content')
<a href="/workgroup/create"><button type="submit" class="btn btn-success mb-3"><i class="fa-regular fa-plus mr-2"></i>Workgroup</button></a>
@forelse ($workgroupData as $id => $data)
    <div class="card col-lg-12 col-6">
        <div class="card-header">
            <h2 class="card-title font-weight-bold mt-2">{{$data['nama']}}</h2>
            <div class="card-tools">
              <form action="/workgroup/{{$data['id']}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-link text-danger text-gradient px-2"><i class="far fa-trash-alt mr-1"></i>Delete</button>
                <a class="btn btn-link text-dark px-2" href="/workgroup/{{$data['id']}}/edit"><i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit</a> 
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button> 
              </form> 
            </div>
        </div>

        <div class="card-body mt-1">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Controller</th>
                  <th scope="col">Unit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  //GetDataPejabat
                  $token = session('token');
                  $responseDataPejabat = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/list-pejabat?jabatanid='.$data['controller'])->body();
                  $pejabat = json_decode($responseDataPejabat, true);
                  session(['pejabat' => $pejabat]);
                ?>
              {{-- @foreach ($pejabat['data']['pejabat'] as $kepalaGroup) --}}
                @foreach (session('pejabat')['data']['pejabat'] as $kepalaGroup)
                @if($kepalaGroup['jabatan_id'] == $data['controller'])
                <td>
                  {{$kepalaGroup['nama']}} <br>
                  (<i>{{$kepalaGroup['jabatan']}}</i>)
                </td>
                @endif
                @endforeach
                <td>

                <ul>
                  @foreach ($data['unit'] as $unitKey => $unitValue)
                  <li>{{$unitValue}} <br></li>
                  @endforeach
                </ul>

              </td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
    @empty
    <div class="card col-lg-12 col-6">
      <div class="card-body">
        <p class="text-center"> Workgroup Belum Ditambahkan</p>
      </div>
    </div>
    
    
    @endforelse
@endsection