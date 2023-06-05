@extends('layout.master')
@section('title', 'Mata Anggaran')

@section('breadcrumb1')
    <li class="breadcrumb-item">Mata Anggaran</li>
@endsection

@section('judulTengah', 'Mata Anggaran RKA')

@section('content')
<br>
<a href="/jpcreate"><button type="submit" class="btn btn-success mr-3 mb-3" style="font-size: 13.5px;"><i class="fa-regular fa-plus mr-2"></i>Jenis Penggunaan</button></a>
<a href="/subjenispenggunaan/create"><button type="submit" class="btn btn-success mr-3 mb-3" style="font-size: 13.5px;"><i class="fa-regular fa-plus mr-2"></i>Sub Jenis Penggunaan</button></a>
<a href="/mataanggaran/create"><button type="submit" class="btn btn-success mr-3 mb-3" style="font-size: 13.5px;"><i class="fa-regular fa-plus mr-2"></i>Mata Anggaran</button></a>

<?php
$byk = 0;
?>

<!--JenisPenggunaan-->
@forelse ($Jenispenggunaan as $item)
  <div class="card col-lg-12 col-6 mb-5" style="font-size: 14px;">
      <div class="card-header">
          <h3 class="card-title font-weight-bold ">{{$byk+=1}}. {{$item->namaJenisPenggunaan}}</h3>
          <div class="card-tools">
            <form action="/jp/{{$item->id}}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-tool text-danger text-gradient px-2" onclick="return confirm('Yakin Untuk Menghapus?')" style="font-size: 14px;">
              <i class="fa-solid fa-trash mr-1"></i>Delete</button>
              <a type="button" class="btn btn-tool text-dark" href="/jp/{{$item->id}}/edit"><i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit</a>
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
            </form>
          </div>
      
      </div>
   
      <div class="card-body">
      <!--JenisPenggunaanBody-->
          <!--SubJenisPenggunaan-->
          <?php
          $bykSub = '@';
          ?>
        @foreach($Subjenispenggunaan as $subJenis)
        @if($subJenis->jenispenggunaan_id == $item->id)
        <div class="card col-lg-12 col-6">
          <div class="card-header" style="font-size: 14px;">
            <?php
            $bykSub;
            ?>
              <h3 class="card-title" style="font-size: 14px;">{{$bykSub = chr(ord($bykSub) + 1) }}. {{$subJenis->namaSubJenisPenggunaan}}</h3>
              <div class="card-tools">  

                <form action="/subjenispenggunaan/{{$subJenis->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-tool text-danger" onclick="return confirm('Yakin Untuk Menghapus?')"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                    <a type="button" class="btn btn-tool text-dark" href="/subjenispenggunaan/{{$subJenis->id}}/edit"><i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button> 
                </form>
              </div>

          </div>

          <div class="card-body">
              <!--Mata Anggaran-->
           
              <!--Mata Anggaran-->

          </div>
      </div>
      @endif
      <!--/SubJenisPenggunaan-->

      @endforeach
      </div>

     
  </div>
@empty
<div class="card col-lg-12 col-6">
    <div class="card-body">
      <p class="text-center"> Data Jenis Penggunaan Belum ada</p>
    </div>
</div>
  
  
@endforelse
<!--JenisPenggunaan-->


@endsection