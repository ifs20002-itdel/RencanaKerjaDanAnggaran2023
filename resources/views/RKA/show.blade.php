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
            <a class="nav-link" id="review" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Review</a>
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
            <table id="w0" class="table table-striped table-bordered detail-view" style="font-size: 15px;">
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

            @if ($program->status == 'In Progress')
                @if ($program->mataanggaran->controller == Auth::user()->pegawai->pejabat->first()->jabatan_id)
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Form Persetujuan
                            </h3>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <label class="mr-3">Kritik </label>
                                    </div>
                                    
                                    <div class="col-10">
                                        <textarea style="font-size:14px" rows="5" cols="30" class="form-control" name="kritik">{{old('kritik')}}</textarea>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="card-footer text-right">
                            <button type="button" class="btn btn-danger mr-5" data-toggle="modal" data-target="#modal-danger">
                                Reject
                            </button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                Accept
                            </button>
                            </div>


                        </div>
                        <!-- /.card -->
                        </div>
                    </div>
              
                <!-- ./row -->
                    <div class="modal fade" id="modal-success">
                        <div class="modal-dialog">
                        <div class="modal-content bg-success">
                            <div class="modal-header">
                            <h4 class="modal-title">Setuju Dengan Pengajuan RKA?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-light">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
              <!-- /.modal -->
                    <div class="modal fade" id="modal-danger">
                        <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                            <h4 class="modal-title">Tolak Pengajuan RKA?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-light">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                @endif
            @endif
           
  
          </div>
        {{-- /DATA PROGRAM --}}

        {{-- REVIEW --}}
          <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="review">
             {{-- CONTENT --}}
          </div>
        {{-- /REVIEW --}}

        {{-- STATUS/RIWAYAT --}}
          <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="statusdanriwayat">
             {{-- CONTENT --}}
             <table id="w0" class="table table-striped table-bordered detail-view" style="font-size: 15px;">
                <tbody>
                    <tr>
                        <th style="width: 30%;">Status Program</th>
                        <td style="width: 70%;">{{$program->status}}</td>
                    </tr>
                    <tr>
                        <th>Pengusul</th>
                        <td>{{$program->unit->pegawai->nama}} - {{$program->unit->kepala}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Diusulkan</th>
                        <td>{{ \Carbon\Carbon::parse($program->created_at)->format('d F Y') }}</td>
                    </tr>
                    
                    <tr>
                        <th>Disetujui Oleh</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>Tanggal Disetujui</th>
                        <td>-</td>
                    </tr>
                
                    <tr>
                        <th>Pelaksana</th>
                        <td>{{$program->unit->kepala}} - {{$program->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Ditolak Oleh</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>Tanggal Ditolak</th>
                        <td>-</td>
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