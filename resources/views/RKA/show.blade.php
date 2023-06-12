@extends('layout.master')
@section('title', 'Add Program')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/program">Program</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">{{$program->mataanggaran->mataAnggaran}} - {{$program->namaProgram}}</li>
@endsection
@section('judul')
{{$program->mataanggaran->mataAnggaran}} - {{$program->namaProgram}}
@endsection

@section('content')

<div class="col-12">
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="dataprogram" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Data Program</a>
          </li>
          <li class="nav-item">
            <?php 
                $totalReview = count($program->riwayatprogram)    
            ?>
            <a class="nav-link" id="review" data-toggle="pill" href="#tab-review-program" role="tab" aria-controls="tab-review-program" aria-selected="false">Review ({{$totalReview}})</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="statusdanriwayat" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Status & Riwayat</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">

        {{-- DATA PROGRAM --}}
          <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="dataprogram">
            {{-- CONTENT --}}
            <table id="w0" class="table table-striped table-bordered detail-view" style="font-size: 14px;">
                <tbody>
                    <tr>
                        <th style="width: 30%;">Tahun Anggaran</th>
                        <td style="width: 70%;">{{$program->tahun->tahun}}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{$program->pejabat->jabatan}}</td>
                    </tr>
                    <tr>
                        <th>Mata Anggaran</th>
                        <td>{{$program->mataanggaran->mataAnggaran}}</td>
                    </tr>
                    <tr>
                        <th>Nama Anggaran</th>
                        <td>{{$program->mataanggaran->namaAnggaran}}</td>
                    </tr>
                    <tr>
                        <th>Nama Program/Kegiatan</th>
                        <td>{{$program->namaProgram}}</td>
                    </tr>
                    <tr>
                        <th>Tujuan</th>
                        <td>{{$program->tujuan}}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{$program->deskripsi}}</td>
                    </tr>
                    
                    <tr>
                        <th>Waktu</th>
                        <td>
                            @foreach (json_decode($program['waktu']) as $key => $item)
                                {{$item}}{{ $key != count(json_decode($program['waktu'])) - 1 ? ',' : '' }}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Volume</th>
                        <td>{{$program->volume}}</td>
                    </tr>
                    <tr>
                        <th>Satuan</th>
                        <td>{{$program->satuan->nama}}</td>
                    </tr>
                    <tr>
                        <th>Harga Satuan</th>
                        <td>{{$program->hargaSatuan}}</td>
                    </tr>
                    <tr>
                        <th>Harga Total</th>
                        <td>{{$program->hargaTotal}}</td>
                    </tr>
                </tbody>
            </table>

        <br>
            {{-- APPROVAL --}}
           
  
          </div>
        {{-- /DATA PROGRAM --}}

        {{-- REVIEW --}}
          <div class="tab-pane fade" id="tab-review-program" role="tabpanel" aria-labelledby="review">
             {{-- CONTENT --}}
                @if ($program->mataanggaran->controller == Auth::user()->pegawai->pejabat->first()->jabatan_id)

                <form action="/review" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Form Review
                            </h3>
                            </div>


                            <div class="card-body">
                                <input type="hidden" name="program_id" value="{{$program->program_id}}">
                                <div class="col-12">
                                    <textarea id="review" style="font-size:14px" rows="5" cols="30" class="form-control" name="review" placeholder="write a review...">{{old('review')}}</textarea>
                                </div>
                                <span id="review-error" class="text-danger"></span>
                              
                            </div>

                            <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">
                                Create Review
                            </button>
                            </div>


                        </div>
                        <!-- /.card -->
                        </div>
                    </div>
                </form>
              
                <hr style="height: 5px; background-color: gray;">
              <!-- /.modal -->
                @endif
                
                {{-- VIEW OF REVIEW --}}
                <div class="row">
                    <div class="col-md-12">
                    
                        @forelse ($riwayatprogram as $kritik)
                        <div class="card">
                                <div class="card-body">
                                {{-- REVIEWER IDENTITY --}}
                                <p style="font-size: 13px;">
                                    <i class="fa-solid fa-user mr-2" style="font-size: 0.8em;"></i>{{$kritik->user->pegawai->nama}} - {{$kritik->pejabat->jabatan}} <br>
                                    <i class="fa-sharp fa-regular fa-clock mr-2" style="font-size: 0.8em;"></i>{{\Carbon\Carbon::parse($kritik->created_at)->format('d F Y')}}
                                </p> 
                                <div class="card-footer" style="font-size: 13px;">
                                    {{-- REVIEWMESSAGE --}}
                                    {{$kritik->review}}
                                </div>
                                </div>
                                
                                
                            </div>
                            <br>
                        @empty
                        <div class="card-footer text-center" style="font-size: 13px;">
                            {{-- REVIEWMESSAGE --}}
                            Belum Ada Review
                        </div>
                        @endforelse 
                        
                    <!-- /.card -->
                    </div>
                </div>
                {{-- VIEW OF REVIEW --}}


          </div>
        {{-- /REVIEW --}}

        {{-- STATUS/RIWAYAT --}}
          <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="statusdanriwayat">
             {{-- CONTENT --}}
             <table id="w0" class="table table-striped table-bordered detail-view" style="font-size: 14px;">
                <tbody>
                    <tr>
                        <th style="width: 30%;">Status Program</th>
                        
                        @if($program->status == 'Accepted')
                            <td style="width: 70%; font-weight: bold; color: green;">{{$program->status}}</td>
                        @elseif($program->status == 'Rejected')
                            <td style="width: 70%; font-weight: bold; color: red;">{{$program->status}}</td>
                        @else
                            <td><i>{{$program->status}} </i><i class="fa-sharp fa-solid fa-circle-info" style="color: #4d8eff;"></i></td>
                        @endif
                        
                    </tr>
                    <tr>
                        <th style="width: 30%;">Pengusul</th>
                        <td style="width: 70%;">{{$program->unit->pegawai->nama}} - {{$program->unit->kepala}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Tanggal Diusulkan</th>
                        <td style="width: 70%;">{{ \Carbon\Carbon::parse($program->created_at)->format('d F Y') }}</td>
                    </tr>
                    
                    <tr>
                        <th style="width: 30%;">Disetujui Oleh</th>
                        @if ($program->status == 'Accepted')
                            <td style="width: 70%;">{{$program->mataanggaran->pejabat->nama}} - {{$program->mataanggaran->pejabat->jabatan}}</td>
                        @else
                            <td style="width: 70%;">-</td>
                        @endif
                        
                    </tr>
                    <tr>
                        <th style="width: 30%;">Tanggal Disetujui</th>
                        @if ($program->status == 'Accepted')
                            <td style="width: 70%;">{{\Carbon\Carbon::parse($program->updated_at)->format('d F Y') }}</td>
                        @else
                            <td style="width: 70%;">-</td>
                        @endif
                    </tr>
                
                    <tr>
                        <th style="width: 30%;">Pelaksana</th>
                        <td style="width: 70%;">{{$program->unit->kepala}} - {{$program->unit->name}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Ditolak Oleh</th>
                        @if ($program->status == 'Rejected')
                            <td style="width: 70%;">{{$program->mataanggaran->pejabat->nama}} - {{$program->mataanggaran->pejabat->jabatan}}</td>
                        @else
                            <td style="width: 70%;">-</td>
                        @endif
                    </tr>
                    <tr>
                        <th style="width: 30%;">Tanggal Ditolak</th>
                        @if ($program->status == 'Rejected')
                            <td style="width: 70%;">{{\Carbon\Carbon::parse($program->updated_at)->format('d F Y') }}</td>
                        @else
                            <td style="width: 70%;">-</td>
                        @endif
                    </tr>
                
                </tbody>
            </table>
          </div>
        {{-- STATUS/RIWAYAT --}}

        </div>
      </div>
      <!-- /.card -->
    </div>
</div>

@endsection