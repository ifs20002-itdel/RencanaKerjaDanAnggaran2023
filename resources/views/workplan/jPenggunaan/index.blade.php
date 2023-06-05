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
      <div class="card-header" style="font-size: 14px;">
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


{{-- MATA ANGGARAN LANGSUNG DENGAN JENIS PENGGUNAAN --}}
      @if ($item->subjenispenggunaan->count() == 0)
        <table class="table col-lg-12 col-6">
          <thead class="thead-light">
            <tr>
            <th scope="col" style="font-size: 11px;">No</th>
            <th scope="col" style="font-size: 11px;">Mata Anggaran</th>
            <th scope="col" style="font-size: 11px;">Nama Anggaran</th>
            <th scope="col" style="font-size: 11px;">Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $bykMata = 0  
              ?>
              @foreach ($item->mataanggaran as $mataAnggaran)
              <tr>
                  <td style="width:5%">{{ $bykMata+=1 }}</td>
                  <td style="width:15%">{{$mataAnggaran['mataAnggaran']}}</td>
                  <td style="width:50%">{{$mataAnggaran['namaAnggaran']}}</td>
                  
                  <td style="width:30%">
                      <div class="btn-group">
                          <a href="/jpDosen/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                          <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                              @csrf
                              @method('delete')
                          <button type="submit" class="btn btn-sm btn-danger ml-4" onclick="return confirm('Yakin Untuk Menghapus?')">
                          <i class="fa-solid fa-trash mr-1"></i>Delete</button>
                          </form>
                      </div>
                  </td>
                  
              </tr>
          @endforeach
          @if ($bykMata == 0)
              <tr>
                  <td colspan="7" class="text-center p-3 table-active">
                      Data Jenis Penggunaan Anggaran Belum Ditambahkan
                  </td>
              </tr>
          @else
              
          @endif 
          </tbody>
        </table>

{{-- MATA ANGGARAN DENGAN SUB JENIS PENGGUNAAN --}}
      @else
      
    <!-- Code to display when the relationship is not empty -->
          @foreach($item->subjenispenggunaan as $subJenis)
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

                  <!--Table MataAnggaran-->
                  <table class="table col-lg-12 col-6">
                    <thead class="thead-light" >
                      <tr>
                      <th scope="col" style="font-size: 11px;">No</th>
                      <th scope="col" style="font-size: 11px;">Mata Anggaran</th>
                      <th scope="col" style="font-size: 11px;">Nama Anggaran</th>
                      <th scope="col" style="font-size: 11px;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bykMata = 0  
                        ?>
                        @foreach ($mataanggaran as $mata)
                        @if ($mata['subjenispenggunaan_id'] == $subJenis->id)
                        <tr>
                          <td style="width:5%">{{ $bykMata+=1 }}</td>
                          <td style="width:15%">{{$mata['mataAnggaran']}}</td>
                          <td style="width:50%">{{$mata['namaAnggaran']}}</td>
                          
                          <td style="width:30%">
                              <div class="btn-group">
                                  <a href="/jpDosen/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                                  <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                      @csrf
                                      @method('delete')
                                  <button type="submit" class="btn btn-sm btn-danger ml-4" onclick="return confirm('Yakin Untuk Menghapus?')">
                                  <i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                  </form>
                              </div>
                          </td>
                          
                      </tr>
                        @endif
                        
                    @endforeach
                    @if ($bykMata == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 table-active">
                                Data Jenis Penggunaan Anggaran Belum Ditambahkan
                            </td>
                        </tr>
                    @else
                        
                    @endif 
                    </tbody>
                  </table>
                    <!--/.Table A-->
          
              </div>

            </div>

          @endforeach
      @endif

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