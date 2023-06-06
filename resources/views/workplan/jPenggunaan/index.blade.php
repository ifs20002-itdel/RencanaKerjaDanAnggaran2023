@extends('layout.master')
@section('title', 'Mata Anggaran')

@section('breadcrumb1')
    <li class="breadcrumb-item">Mata Anggaran</li>
@endsection

@section('judulTengah', 'Mata Anggaran RKA')

@section('content')
<br>
<a href="/jpcreate"><button type="submit" class="btn btn-success mr-3 mb-3" style="font-size: 13.5px; border-radius:20px;"><i class="fa-regular fa-plus mr-2"></i>Jenis Penggunaan</button></a>
<a href="/subjenispenggunaan/create"><button type="submit" class="btn btn-success mr-3 mb-3" style="font-size: 13.5px; border-radius:20px;"><i class="fa-regular fa-plus mr-2"></i>Sub Jenis Penggunaan</button></a>
<a href="/mataanggaran/create"><button type="submit" class="btn btn-success mr-3 mb-3" style="font-size: 13.5px; border-radius:20px;"><i class="fa-regular fa-plus mr-2"></i>Mata Anggaran</button></a>

<?php
$byk = 0;
?>

<!--JenisPenggunaan-->
@forelse ($Jenispenggunaan as $item)
  <div class="card col-lg-12 col-6 mb-5" style="font-size: 14px; border-radius: 15px;">
      <div class="card-header" style="font-size: 14px;">
          <h3 class="card-title font-weight-bold ">{{$byk+=1}}. {{$item->namaJenisPenggunaan}}</h3>
          <div class="card-tools">
            <form action="/jp/{{$item->id}}" method="POST" id="deleteForm">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-tool text-danger text-gradient px-2" onclick="confirmDelete({{$item->id}})" style="font-size: 14px;">
              <i class="fa-solid fa-trash mr-1"></i>Delete
            </button>
            <a type="button" class="btn btn-tool text-dark" href="/jp/{{$item->id}}/edit">
              <i class="fas fa-pencil-alt text-dark mr-1" aria-hidden="true"></i>Edit
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </form>


<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Untuk Menghapus ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-danger" form="deleteForm">Hapus</button>
      </div>
    </div>
  </div>
</div>

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
                <table class="table col-lg-12 col-6" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">No</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Mata Anggaran</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Nama Anggaran</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Workgroup</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Actions</th>
                    </tr>
                  </thead>
                    <tbody>
              <?php
              $bykMata = 0;
              ?>
              @foreach ($item->mataanggaran as $mataAnggaran)
              <tr>
                  <td style="width:3%; border: 1px solid black; padding: 8px;">{{ $bykMata+=1 }}</td>
                  <td style="width:11%; border: 1px solid black; padding: 8px; text-align: center;">{{$mataAnggaran['mataAnggaran']}}</td>
                  <td style="width:37%; border: 1px solid black; padding: 8px;">{{$mataAnggaran['namaAnggaran']}}</td>
                  <td style="width:35%; border: 1px solid black; padding: 8px;">
                    <p><b>Workgroup</b></p>
                  @foreach (json_decode($mataAnggaran['workgroup_id']) as $unitValue)
                    @forelse ($workgroupData as $id => $data)
                      @if ($data['id'] == $unitValue)
                      <li>{{$data['nama']}} <br></li>
                      @endif
                    @empty  
                    @endforelse
                  @endforeach
                    <br>
                        
                    <p><b>Units</b></p>
                      @foreach ($mata['unit'] as $unit)
                          <li>{{$unit}} <br></li>
                      @endforeach


                  </td>
                  
                  {{-- BUTTON --}}
                  <td style="width:10%">
                      <div class="btn-group">
                        {{-- EDIT --}}
                          <a href="/mataanggaran/{{$mataAnggaran->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                          {{-- DELETE --}}
                          <form action="/mataanggaran/{{$mataAnggaran->id}}" method="POST">
                              @csrf
                              @method('delete')
                          <button type="submit" class="btn btn-sm btn-danger ml-1" onclick="return confirm('Yakin Untuk Menghapus?')">
                          <i class="fa-solid fa-trash"></i></button>
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
            <div class="card col-lg-12 col-6" style="border-radius:15px">
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
                <table class="table col-lg-12 col-6" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">No</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Mata Anggaran</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Nama Anggaran</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Workgroup & Units</th>
                      <th scope="col" style="font-size: 11px; border: 1px solid black; padding: 8px;">Actions</th>
                    </tr>
                  </thead>
                    <tbody>
                        <?php
                        $bykMata = 0  
                        ?>
                        
                        @foreach ($mataanggaran as $mata)
                        @if ($mata['subjenispenggunaan_id'] == $subJenis->id)
                        <tr>
                            <td style="width:3%; border: 1px solid black; padding: 8px;">{{ $bykMata+=1 }}</td>
                            <td style="width:12%; border: 1px solid black; padding: 8px; text-align: center;">{{$mata['mataAnggaran']}}</td>
                            <td style="width:35%; border: 1px solid black; padding: 8px;">{{$mata['namaAnggaran']}}</td>
                            <td style="width:35%; border: 1px solid black; padding: 8px;">
                            <p><b>Workgroup</b></p>
                            @foreach ($mata['workgroup_id'] as $unitValue)
                            @forelse ($workgroupData as $id => $data)
                              @if ($data['id'] == $unitValue)
                              <li>{{$data['nama']}} <br></li>
                              @endif
                            @empty  
                            @endforelse
                          @endforeach
                          <br>
                             
                          <p><b>Units</b></p>
                            @foreach ($mata['unit'] as $unit)
                                <li>{{$unit}} <br></li>
                            @endforeach


                            </td>
                            
                            {{-- BUTTON --}}
                            <td style="width:10%">
                                <div class="btn-group">
                    
                                    {{-- DELETE --}}
                                    <form action="/mataanggaran/{{$mata['id']}}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger ml-1" style="border-radius:20px;" onclick="return confirm('Yakin Untuk Menghapus?')">
                                    <i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    {{-- EDIT --}}
                                    <a href="/mataanggaran/{{$mata['id']}}/edit" class="btn btn-sm btn-warning" style="border-radius:20px;"><i class="fa-regular fa-pen-to-square"></i></a>
                                </div>
                            </td>
                            
                        </tr>
                        @endif
                    @endforeach

                        {{-- @foreach ($mataanggaran as $mata)
                        @if ($mata['subjenispenggunaan_id'] == $subJenis->id)
                        <tr>
                          <td style="width:5%;border: 1px solid black; padding: 8px;">{{ $bykMata+=1 }}</td>
                          <td style="width:15%;border: 1px solid black; padding: 8px;"">{{$mata['mataAnggaran']}}</td>
                          <td style="width:50%;border: 1px solid black; padding: 8px;"">{{$mata['namaAnggaran']}}</td>
                          
                          <td style="width:30%">
                              <div class="btn-group">
                                  <a href="/jpDosen/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i></a>
                                  <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                      @csrf
                                      @method('delete')
                                  <button type="submit" class="btn btn-sm btn-danger ml-4" onclick="return confirm('Yakin Untuk Menghapus?')">
                                  <i class="fa-solid fa-trash mr-1"></i></button>
                                  </form>
                              </div>
                          </td>
                          
                      </tr>
                        @endif
                        
                    @endforeach --}}
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
    <script>
  function confirmDelete(itemId) {
    var deleteForm = document.getElementById("deleteForm");
    deleteForm.action = "/jp/" + itemId;
    $('#confirmDeleteModal').modal('show');
  }
  
  // Enable modal dismissal on Cancel button click
  $('.modal-footer button[data-dismiss="modal"], .modal-header button[data-dismiss="modal"]').on('click', function() {
    $('#confirmDeleteModal').modal('hide');
  });
</script>
     
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