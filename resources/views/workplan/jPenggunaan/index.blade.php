@extends('layout.master')
@section('title', 'Mata Anggaran')

@section('breadcrumb1')
    <li class="breadcrumb-item">Mata Anggaran</li>
@endsection

@section('judulTengah', 'Mata Anggaran RKA')

@section('content')

<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#myModal"><i class="fa-regular fa-plus mr-2"></i>Jenis Penggunaan</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Jenis Penggunaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/jp" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="namaJenisPenggunaan" class="form-control" placeholder="Cth. Biaya Operasional Pendidikan" value="{{old('namaJenisPenggunaan')}}">
                        @error('namaJenisPenggunaan')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-dark">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$byk = 0;
?>
  @forelse ($Jenispenggunaan as $item)
    <div class="card col-lg-12 col-6 mb-5">
        <div class="card-header">
            <h3 class="card-title font-weight-bold ">{{$byk+=1}}. {{$item->namaJenisPenggunaan}}</h3>
            <div class="card-tools">
              <form action="/jp/{{$item->id}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-tool text-danger text-gradient px-2" onclick="return confirm('Yakin Untuk Menghapus?')">
                <i class="fa-solid fa-trash mr-1"></i>Delete</button>
                <button type="button" class="btn btn-tool text-dark" data-toggle="modal" data-target="#editModal{{$item->id}}"><i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit</button>
                <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$item->id}}">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel{{$item->id}}">Edit Jenis Penggunaan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="/jp/{{$item->id}}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="modal-body">
                                  <div class="form-group">
                                      <label>Nama</label>
                                      <input type="text" name="namaJenisPenggunaan" class="form-control" placeholder="Cth. Biaya Operasional Pendidikan" value="{{$item->namaJenisPenggunaan}}">
                                      @error('namaJenisPenggunaan')
                                      <p class="text-danger font-weight-bold">{{$message}}</p>
                                      @enderror
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <a href="/jp" class="btn btn-danger float-right mr-2 ml-4">Batalkan</a>
                                  <button type="submit" class="btn btn-dark float-right mr-4">Update</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              </form>
              
            </div>
        
        </div>
     
        <div class="card-body">

        <!--SubJenisPenggunaan-->
        <?php
        $bykSub = '@';
        ?>
        @foreach($Subjenispenggunaan as $subJenis)
        @if($subJenis->jenispenggunaan_id == $item->id)
        <div class="card col-lg-12 col-6">
          <div class="card-header">
            <?php
            $bykSub;
            ?>
              <h3 class="card-title">{{ $bykSub = chr(ord($bykSub) + 1) }}. {{$subJenis->namaSubJenisPenggunaan}}</h3>
              <div class="card-tools">  

                <form action="/subjenispenggunaan/{{$subJenis->id}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-tool text-danger" onclick="return confirm('Yakin Untuk Menghapus?')">
                  <i class="fa-solid fa-trash mr-1"></i>Delete</button>
                  <a type="button" class="btn btn-tool text-dark" href="/subjenispenggunaan/{{$subJenis->id}}/edit"><i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit</a>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button> 
                </form>

              </div>
          
          </div>
      
          <div class="card-body">
              <!--Table A-->
              
                <!--/.Table A-->
                <br>

              <!--Tambah Data-->
              <div class="card-footer">
                  <a href="/jpDosen/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
              </div>
              <!--/.Tambah Data-->
      
        </div>
      </div>
      @endif
      <!--/SubJenisPenggunaan-->
     
      @endforeach

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
    <script>
    function openPopupForm() {
        var popupForm = document.getElementById("popupForm");
        popupForm.style.display = "block";
    }
</script>
@endsection