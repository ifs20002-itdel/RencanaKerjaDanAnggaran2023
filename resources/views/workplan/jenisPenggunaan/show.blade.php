@extends('layout.master')

@section('title')
    {{$Penggunaan->mataAnggaran}}
@endsection

@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/listJenisAnggaran">Anggaran</a></li>
@endsection
@section('breadcrumb2')
    <li class="breadcrumb-item">{{$Penggunaan->mataAnggaran}}</li>
@endsection

@section('judulTengah')
Jenis Penggunaan Anggaran: &nbsp; {{$Penggunaan->mataAnggaran}} - {{$Penggunaan->namaAnggaran}}
@endsection

@section('content')

    <!-- Default box -->
    <div class="card ml-5 col-lg-11 col-6">
      <div class="card-header">
        <h3 class="card-title" style="font-size: 14px;">Daftar Pengajuan RKA untuk Anggaran : <strong>{{$Penggunaan->namaAnggaran}}</strong></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <div class="row">
        <div class="d-lg-none">{{ $byk = 0 }}</div>
        @foreach ($Penggunaan->pengajuan as $item)
        <div class="d-lg-none">{{ $byk+=1 }}</div>
        <span class="hidden"></span>
            <div class="col-12 col-sm-3 my-2">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">

                            @if($item->status == 'Approved')
                            <span class="badge rounded-pill bg-success">{{$item->status}}</span>  
                            @elseif($item->status == 'Canceled')
                            <span class="badge rounded-pill bg-danger">{{$item->status}}</span>  
                            @else
                            <span class="badge rounded-pill bg-secondary">{{$item->status}}</span>  
                            @endif
                        </div>
                        <div class="">
                            <h2 class="lead"><b>{{$Penggunaan->mataAnggaran}}</b></h2>    
                          
                            <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                        </div>
                           
                        <div class="">
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                            </ul>
                                
                        </div>                            
                    </div>

                        @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')                      
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fa-regular fa-eye mr-1"></i> Detail
                                        </a> 
                                        <a href="/pengajuan/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
                                            <i class="fa-regular fa-pen-to-square mr-1"></i> Edit
                                        </a>
                                        <form action="/pengajuan/{{$item->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>    
                            </div>
                                                
                            @else
                                            
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                        <i class="fa-regular fa-eye mr-1"></i> Detail
                                    </a>    
                                </div>            
                            </div>
                                                            
                            @endif

                            @if(Auth::user()->jabatan_fungsional == 'Lektor Kepala' && $item->status == 'In Progress')
                                 
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="{{url('approved', $item->id)}}" class="btn btn-sm btn-success mr-3">
                                        <i class="fa-regular fa-eye mr-1"></i> Approved
                                    </a>  
                                    
                                    <a href="{{url('canceled', $item->id)}}" class="btn btn-sm btn-danger ml-5">
                                        <i class="fa-regular fa-eye mr-1"></i> Canceled
                                    </a>   
                                </div>            
                            </div>
                            @endif
                                
                </div>  
            </div>        
        @endforeach  
            
    </div>
  </div>
     
    @if ($byk == 0)
    <div class="card-body">
      <div class="text-center" style="font-size: 14px;"> 
        <p>Belum Ada Program</p>
        <br>
    </div>
    </div>
                     
    @endif 

      
      <!-- /.card-body -->
      <div class="card-footer">
        <a href="/listJenisAnggaran"><button type="submit" class="btn btn-dark float-right" style="font-size: 14px;"><i class="fa-sharp fa-solid fa-backward-step mr-2"></i>Kembali</button></a>
     </div>
</div>

    
    <!-- /.card -->

@endsection