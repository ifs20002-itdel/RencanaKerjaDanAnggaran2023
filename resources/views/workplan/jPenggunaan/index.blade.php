@extends('layout.master')
@section('title', 'Mata Anggaran')

@section('breadcrumb1')
    <li class="breadcrumb-item">Mata Anggaran</li>
@endsection

@section('judulTengah', 'Mata Anggaran RKA')

@section('content')
<a href="/jpcreate"><button type="submit" class="btn btn-success mb-3"><i class="fa-regular fa-plus mr-2"></i>Jenis Penggunaan</button></a>
<span class="invisible">{{ $byk = 0 }}</span>
  @forelse ($Jenispenggunaan as $item)
    <div class="card col-lg-12 col-6">
        <div class="card-header">
            <h3 class="card-title font-weight-bold mt-2 ">{{$byk+=1}}. {{$item->namaJenisPenggunaan}}</h3>
            <div class="card-tools">
              <form action="/jp/{{$item->id}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-link text-danger text-gradient px-2" onclick="return confirm('Yakin Untuk Menghapus?')">
                <i class="fa-solid fa-trash mr-1"></i>Delete</button>
                <a type="button" class="btn btn-link text-dark px-2" href="/jp/{{$item->id}}/edit"><i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button> 
              </form>
              
            </div>
        
        </div>

        <div class="card-body">
            
        </div>

        <div class="card-footer">
          <a href="/subjenispenggunaan/{{$item->id}}/create" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Sub Jenis Penggunaan</button></a>
          <a href="/subjenispenggunaan/create" class="btn btn-success ml-4"><i class="fa-regular fa-plus mr-2"></i>Mata Anggaran</button></a>
      </div>
    </div>
    @empty
    <div class="card col-lg-12 col-6">
      <div class="card-body">
        <p class="text-center"> Data Jenis Penggunaan Belum ada</p>
      </div>
    </div>
    
    
    @endforelse
@endsection