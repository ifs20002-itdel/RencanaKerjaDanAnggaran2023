@extends('layout.master')
@section('title', 'Workgroup')

@section('breadcrumb1')
    <li class="breadcrumb-item">Workgroup</li>
@endsection

@section('judulTengah', 'Workgroup')

@section('content')
<a href="/workgroup/create"><button type="submit" class="btn btn-success mb-3" style="font-size: 13.5px; border-radius:20px"><i class="fa-regular fa-plus mr-2"></i>Workgroup</button></a>
<span class="invisible">{{ $byk = 0 }}</span>
    @forelse ($workgroupData as $id => $data)
      <div class="card col-lg-12 col-6" style="font-size: 14px; border-radius:16px;">
        <div class="card-header">
            <h2 class="card-title font-weight-bold mt-2">{{$byk+=1}}. {{$data['nama']}}</h2>
            <div class="card-tools">
              <form action="/workgroup/{{$data['id']}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-link text-danger text-gradient px-2" style="font-size: 14px;"><i class="far fa-trash-alt mr-1"></i>Delete</button>
                <a class="btn btn-link text-dark px-2" href="/workgroup/{{$data['id']}}/edit" style="font-size: 14px;"><i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit</a> 
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button> 
              </form> 
            </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Controller</th>
                  <th>Unit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
              

              {{-- @foreach ($pejabat['data']['pejabat'] as $kepalaGroup) --}}
             
                @foreach ($pejabat as $kepalaGroup)
                @if($kepalaGroup->jabatan_id == $data['controller'])
                <td>
                  {{$kepalaGroup->nama}} <br>
                  (<i>{{$kepalaGroup->jabatan}}</i>)
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
    </div>
    @empty
    <div class="card col-lg-12 col-6">
      <div class="card-body">
        <p class="text-center"> Workgroup Belum Ditambahkan</p>
      </div>
    </div>
    
    
    @endforelse
@endsection