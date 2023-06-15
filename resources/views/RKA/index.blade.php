@extends('layout.masterFixed')
@section('title', 'Add Program')
@section('breadcrumb1')
    <li class="breadcrumb-item">Program</li>
        <div class="col-sm-10">
          <ol class="breadcrumb float-sm-right">
            <li><a href="/program/create"><button type="submit" class="btn btn-success btn-sm mb-3" style="font-size: 13.5px;"><i class="fa-regular fa-plus mr-2"></i>Tambah Program</button></a></li>
          </ol>
        </div>
    
@endsection

@section('judul', 'Program')

@section('content')

<div class="row">
  <div class="col-md-6">

    <div class="card card-default">
      <!-- /.card-header -->
      <div class="card-body" style="font-size: 13px;">
      
        {{-- CONTENT --}}
      
        {{-- TAHUN ANGGARAN --}}
        <div class="row">
            <div class="col-4 text-end">
                <label class="mr-3 mt-1">Tahun Anggaran</label>
            </div>
            
            <div class="col-8">
                <select id="filter-tahun" class="form-control filter" name="mataanggaran_id" style="width: 50%;" >
                    

                    <option value="" disabled selected>--- ALL ---</option>
                    @foreach ($tahun as $item)
                      <option value="{{$item->tahun_id}}">{{$item->tahun}}</option>
                    @endforeach
                
                </select>
            </div>
        </div>

        {{--/ TAHUN ANGGARAN --}}
        <br>
        {{-- JABATAN --}}

        <div class="row">
            <div class="col-4 text-end">
                <label class="mr-3 mt-1">Jabatan</label>
            </div>
            
            <div class="col-8">
                <select id="filter-pejabat" class="form-control filter" name="mataanggaran_id">
                  <option value="" disabled selected>--- ALL ---</option>
                  @foreach ($pejabat as $item)
                    <option value="{{$item->tahun_id}}">{{$item->jabatan}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        
        {{-- /JABATAN --}}
        <br>
        {{-- MATA ANGGARAN --}}

        <div class="row">
            <div class="col-4 text-end">
                <label class="mr-3 mt-1">Mata Anggaran</label>
            </div>
            
            <div class="col-8">
                <select id="filter-mataanggaran" class="form-control filter" name="mataanggaran_id">
                  <option value="" disabled selected>--- ALL ---</option>
                  @foreach ($mataanggaran as $item)
                    <option value="{{$item->id}}">{{$item->mataAnggaran}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        
        {{-- /MATA ANGGARAN --}}
         <br>
        {{-- Status Program --}}

        <div class="row">
            <div class="col-4 text-end">
                <label class="mr-3 mt-1">Status Program</label>
            </div>
            
            <div class="col-8">
                <select id="filter-status" class="form-control filter" name="mataanggaran_id">
                  <option value="" disabled selected>--- ALL ---</option>
                  @foreach ($program as $item)
                    <option value="{{$item->program_id}}">{{$item->status}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        
        {{-- /Status Program --}}


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->

  <div class="col-md-6">
    <div class="card card-default">
      <!-- /.card-header -->
      <div class="card-body">
        {{-- CONTENT --}}


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!-- END ALERTS AND CALLOUTS -->

    <div class="card" style="font-size: 13px;" >
      <!-- /.card-header -->
      <div class="card-body">

        <hr style="border: none; border-top: 3px solid black; margin: 10px 0;">
    
        <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th style="width:3%; ">#</th>
                  <th>Jabatan</th>
                  <th>Mata Anggaran</th>
                  <th>Kode Program</th>
                  <th>Nama Program/Kegiatan</th>
                  <th>Pengusul</th>
                  <th>Harga Total</th>
                  <th>Status Program</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- Table body content goes here -->
                <?php 
                $bykMata = 0
                ?>
                @forelse ($program as $item)
                @if ($item->user_id == Auth::user()->user_id)
                  <tr>
                      <td style="width:3%;">{{ $bykMata+=1 }}</td>
                      <td style="width:10%;" >{{$item->pejabat->jabatan}}</td>
                      <td style="width:5%;">{{$item->mataanggaran->mataAnggaran}}</td>
                      <td style="width:10%;">{{$item->namaProgram}}</td>
                      <td style="width:10%;">{{$item->namaProgram}}</td>
                      <td style="width:15%;">{{$item->unit->name}} ({{$item->unit->inisial}})</td>
                      <td style="width:10%;">{{$item->hargaTotal}}</td>
                      <td style="width:7%;">
                        @if($item->status == 'Accepted')
                        <p style="font-weight: bold; color: green;">{{$item->status}}</p>
                        @elseif($item->status == 'Rejected')
                        <p style="font-weight: bold; color: red;">{{$item->status}}</p>
                        @else
                          <i>{{$item->status}} </i><i class="fa-sharp fa-solid fa-circle-info" style="color: #4d8eff;"></i>
                        @endif
                      </td>
                      <td style="width:6%;">
                        <div class="input-group d-flex justify-content-center" style="font-size: 12px;">
                          <div class="input-group-prepend" style="font-size: 12px;">
                            <button type="button" class="btn btn-default btn-sm" data-toggle="dropdown" style="font-size: 12px;"><i class="fa-solid fa-wrench" style="font-size: 10px;"></i> Tools</button>
                            <div class="dropdown-menu" style="font-size: 14px;">
                              <a class="dropdown-item" href="/program/{{$item->program_id}}"><i class="fa-regular fa-eye mr-2 mb-2"></i>View</a>
                              @if ($item->status == 'In Progress')
                              <a class="dropdown-item" href="/program/{{$item->program_id}}/edit"><i class="fa-regular fa-pen-to-square mr-2 mb-2"></i>Edit</a>
                              <form action="/program/{{$item->program_id}}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="dropdown-item" type="submit"><i class="fa-solid fa-trash mb-2 mr-2" onclick="return confirm('Yakin Untuk Menghapus?')"></i>Delete</a>
                              </form>
                              @endif
                              

                            </div>
                          </div>
                        </div>
                      </td>
                    
                  </tr>
                  @endif
                  @empty
                  <td colspan="9" class="text-center font-weight-bold table-active">Belum ada Pengajuan RKA</td>
                  @endempty

                  {{-- CONTROLLER ONLY --}}
                  @forelse ($program as $item)
                  @if ($item->mataanggaran->controller == Auth::user()->pegawai->pejabat->first()->jabatan_id)
                  <tr>
                      <td style="width:3%;">{{ $bykMata+=1 }}</td>
                      <td style="width:10%; ">{{$item->pejabat->jabatan}}</td>
                      <td style="width:5%; ">{{$item->mataanggaran->mataAnggaran}}</td>
                      <td style="width:10%; ">{{$item->namaProgram}}</td>
                      <td style="width:10%; ">{{$item->namaProgram}}</td>
                      <td style="width:15%; ">{{$item->unit->name}} ({{$item->unit->inisial}})</td>
                      <td style="width:10%; ">{{$item->hargaTotal}}</td>
                      <td style="width:7%; ">
                        @if($item->status == 'Accepted')
                        <p style="font-weight: bold; color: green;">{{$item->status}}</p>
                        @elseif($item->status == 'Rejected')
                        <p style="font-weight: bold; color: red;">{{$item->status}}</p>
                        @else
                          <i>{{$item->status}} </i><i class="fa-sharp fa-solid fa-circle-info" style="color: #4d8eff;"></i>
                        @endif
                      </td>
                      <td style="width:6%; ">
                        <div class="input-group d-flex justify-content-center" style="font-size: 12px;">
                          <div class="input-group-prepend" style="font-size: 12px;">
                            <button type="button" class="btn btn-default btn-sm" data-toggle="dropdown" style="font-size: 12px;"><i class="fa-solid fa-wrench" style="font-size: 10px;"></i> Tools</button>
                            <div class="dropdown-menu" style="font-size: 14px;">
                              <a class="dropdown-item mb-1" href="/program/{{$item->program_id}}"><i class="fa-solid fa-comment mr-1"></i>Review</a>  
                              @if ($item->status == 'In Progress')
                              <a class="dropdown-item mb-1" href="{{url('accepted', $item->program_id)}}"><i class="fa-solid fa-check mr-1"></i>Accept</a>  
                              <a class="dropdown-item mb-1" href="{{url('rejected', $item->program_id)}}"><i class="fa-solid fa-xmark mr-2"></i>Reject</a>   

                              @endif
                             
                            </div>
                          </div>
                        </div>
                      </td>
                    
                  </tr>
                  @endif
                  @empty
                  <td colspan="9" class="text-center font-weight-bold table-active">Belum ada Pengajuan RKA</td>
                  @endempty
                  {{-- CONTROLLER ONLY --}}
      
                <tr>
                    <td colspan="6" class="text-right font-weight-bold">Total: </td>
                    <td>
                      
                      @php
                        $total = 0;
                      @endphp
                      @forelse ($program as $item)
                      @if ($item->mataanggaran->controller == Auth::user()->pegawai->pejabat->first()->jabatan_id)
                        @php
                          $hargaTotal = intval(str_replace(['Rp. ', '.'], '', $item->hargaTotal));
                          $total += $hargaTotal;
                        @endphp
                      @endif
                      @empty
                        No data available.
                      @endforelse

                      @forelse ($program as $item)
                      @if ($item->user_id == Auth::user()->user_id)
                        @php
                          $hargaTotal = intval(str_replace(['Rp. ', '.'], '', $item->hargaTotal));
                          $total += $hargaTotal;
                        @endphp
                      @endif
                      @empty
                        No data available.
                      @endforelse
                      Rp. {{ number_format($total) }}
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                
                  
                  
              </tbody>
            </table>
          </div>
          
          

        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  <script>
    $(".fiter").on('change', function(){
      console.log("FILTER")
    })
  </script>


@endsection