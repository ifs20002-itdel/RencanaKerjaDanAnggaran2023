@extends('layout.master')

@section('title')
    {{$Pengajuan->penggunaan->mataAnggaran}}
@endsection

@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/pengajuan">Pengajuan</a></li>
@endsection
@section('breadcrumb2')
    <li class="breadcrumb-item">Detail</li>
@endsection

@section('judul')
{{$Pengajuan->penggunaan->mataAnggaran}} - {{$Pengajuan->penggunaan->namaAnggaran}}
@endsection

@section('content')


<div class="card ml-5 col-lg-10 col-6 mx-auto">
      <div class="card-header">
        <div class="d-flex justify-content-center">
          @if($Pengajuan->status == 'Approved')
          <h4><b>Status: </b> <span class="badge rounded-pill bg-success">{{$Pengajuan->status}}</span></h4>
          @elseif($Pengajuan->status == 'Canceled')
          <h4><b>Status: </b> <span class="badge rounded-pill bg-danger">{{$Pengajuan->status}}</span></h4>
          @else
          <h4><b>Status: </b> <span class="badge rounded-pill bg-secondary">{{$Pengajuan->status}}</span></h4>
          @endif
      </div>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5>Jenis Penggunaan: &nbsp; <b> {{$Pengajuan->penggunaan->mataAnggaran}} - {{$Pengajuan->penggunaan->namaAnggaran}} </b></h5>
              <br>
             
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                  
                  <p class="lead">Rincian Program</p>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nama Program</th>
                      <td>:</td>
                      <td>{{$Pengajuan->rincianProgram}}</td>
                    </tr>
                    <tr>
                      <th>Start</th>
                      <td>:</td>
                      <td>{{$Pengajuan->start}}</td>
                    </tr>
                    <tr>
                      <th>Finish</th>
                      <td>:</td>
                      <td>{{$Pengajuan->finish}}</td>
                    </tr>
                    <tr>
                      <th>Diajukan Oleh</th>
                      <td>:</td>
                      <td>{{$Pengajuan->pemohon}}</td>
                    </tr>
                    
                  </table>
                  
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <p class="lead">Anggaran</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Satuan</th>
                        <td>:</td>
                        <td>{{$Pengajuan->satuan}}</td>
                        
                      </tr>
                      <tr>
                        <th style="width:50%">Volume</th>
                        <td>:</td>
                        <td>{{$Pengajuan->volume}}</td>
                        
                      </tr>
                      <tr>
                        <th>Harga Satuan (1000)</th>
                        <td>:</td>
                        <td>Rp. {{number_format($Pengajuan->hargaSatuan)}}</td>
                      </tr>
                      <tr>
                        <th>Total</th>
                        <td>:</td>
                        <td>{{$Pengajuan->total}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
                
              </div> 
            </div>
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <a href="/RKA"><button type="submit" class="btn btn-dark float-right"><i class="fa-sharp fa-solid fa-backward-step mr-2"></i>Kembali</button></a>
    </div>

    </div>
    <!-- /.card -->

@endsection