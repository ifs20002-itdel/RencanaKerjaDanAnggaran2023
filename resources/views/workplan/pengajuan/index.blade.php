@extends('layout.master')
@section('title', 'Pengajuan')
@section('breadcrumb1')
    <li class="breadcrumb-item">Pengajuan</li>
@endsection

@section('judulTengah', 'Ajukan Rencana Kerja Dan Anggaran')

@section('content')

<!--1. Biaya Operasional Pendidikan-->
<hr>
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">1. Biaya Operasional Pendidikan </h3>
        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    </div>

    <div class="card-body">
      
         <!--Table A-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">A. Biaya Dosen (Gaji Dan Honor)</h3>
                <div class="card-tools">    
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button> 
                </div>
            
            </div>
        
            <div class="card-body">
                <!--Table A-->
                    <div class="row">
                        <div class="d-lg-none">{{ $byk = 0 }}</div>
                        @foreach ($Pengajuan as $item)
                        @if ($item->jenis == "1A")
                        <div class="d-lg-none">{{ $byk+=1 }}</div>
                        <span class="hidden"></span>
                            <div class="col-12 col-sm-4 my-2">
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
                                        
                                        @foreach ($Penggunaan as $key)
                                            @if($item->penggunaan_id == $key->id)
                                            <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                            @endif
                                        @endforeach
                                        <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                        
        
                                        
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                            </ul>
                                                
                                                               
                                    </div>
        
                                    @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                        
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <div class="btn-group">
                                                <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                                    <i class="fa-regular fa-eye mr-1"></i> Detail
                                                </a> 
                                                <a href="/PDosen/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
                       
                        @endif
                        @endforeach  
                            
                    </div>
                    @if ($byk == 0)
                            <div class="text-center">
                                <p>Belum Ada Program</p>
                            </div>
                                
                            @endif 
                  <!--/.Table A-->
                  <br>
                  <div class="card-footer">
                    <a href="/PDosen/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
                </div>
        
            </div>   
        </div>
        <!--/Table A-->
        
        <!--Table B-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">B. Gaji Tenaga Kependidikan (Gaji Dan Honor)</h3>
                <div class="card-tools">    
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button> 
                </div>
            
            </div>
        
            <div class="card-body">
                <!--Table A-->
                    <div class="row">
                        <div class="d-lg-none">{{ $byk = 0 }}</div>
                        @foreach ($Pengajuan as $item)
                        @if ($item->jenis == "1B")
                        <div class="d-lg-none">{{ $byk+=1 }}</div>
                        <span class="hidden"></span>
                            <div class="col-12 col-sm-4 my-2">
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
                                        
                                        @foreach ($Penggunaan as $key)
                                            @if($item->penggunaan_id == $key->id)
                                            <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                            @endif
                                        @endforeach
                                        <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                        
        
                                        
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                            </ul>
                                                
                                                               
                                    </div>
        
                                    @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                        
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <div class="btn-group">
                                                <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                                    <i class="fa-regular fa-eye mr-1"></i> Detail
                                                </a> 
                                                <a href="/PGTK/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
                       
                        @endif
                        @endforeach  
                            
                    </div>
                    @if ($byk == 0)
                            <div class="text-center">
                                <p>Belum Ada Program</p>
                            </div>
                                
                            @endif 
                  <!--/.Table A-->
                  <br>
                  <div class="card-footer">
                    <a href="/PGTK/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
                </div>
        
          
            </div>   
        </div>
        <!--/Table B-->

        <!--Table C-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">C. Biaya Operasional Pembelajaran</h3>
                <div class="card-tools">    
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button> 
                </div>
            
            </div>
        
            <div class="card-body">
                <!--Table A-->
                    <div class="row">
                        <div class="d-lg-none">{{ $byk = 0 }}</div>
                        @foreach ($Pengajuan as $item)
                        @if ($item->jenis == "1C")
                        <div class="d-lg-none">{{ $byk+=1 }}</div>
                        <span class="hidden"></span>
                            <div class="col-12 col-sm-4 my-2">
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
                                        
                                        @foreach ($Penggunaan as $key)
                                            @if($item->penggunaan_id == $key->id)
                                            <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                            @endif
                                        @endforeach
                                        <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                        
        
                                        
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                            </ul>
                                                
                                                               
                                    </div>
        
                                    @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                        
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <div class="btn-group">
                                                <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                                    <i class="fa-regular fa-eye mr-1"></i> Detail
                                                </a> 
                                                <a href="/PPembelajaran/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
                       
                        @endif
                        @endforeach  
                            
                    </div>
                    @if ($byk == 0)
                            <div class="text-center">
                                <p>Belum Ada Program</p>
                            </div>
                                
                            @endif 
                  <!--/.Table A-->
                  <br>
                  <div class="card-footer">
                    <a href="/PPembelajaran/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
                </div>
        
          
            </div>   
        </div>
        <!--/Table C-->

        <!--Table D-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">D. Biaya Operasional Tidak Langsung (Listrik, Gas, Air, Pemeliharaan Gedung, Pemeliharaan Sarana, Uang Lembur, Telekomunikasi, Konsumsi, Transport, Pajak, Asuransi, dll)</h3>
                <div class="card-tools">    
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button> 
                </div>
            
            </div>
        
            <div class="card-body">
                <!--Table A-->
                    <div class="row">
                        <div class="d-lg-none">{{ $byk = 0 }}</div>
                        @foreach ($Pengajuan as $item)
                        @if ($item->jenis == "1D")
                        <div class="d-lg-none">{{ $byk+=1 }}</div>
                        <span class="hidden"></span>
                            <div class="col-12 col-sm-4 my-2">
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
                                        
                                        @foreach ($Penggunaan as $key)
                                            @if($item->penggunaan_id == $key->id)
                                            <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                            @endif
                                        @endforeach
                                        <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                        
        
                                        
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                            </ul>
                                                
                                                               
                                    </div>
        
                                    @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                        
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <div class="btn-group">
                                                <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                                    <i class="fa-regular fa-eye mr-1"></i> Detail
                                                </a> 
                                                <a href="/PBOTL/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
                       
                        @endif
                        @endforeach  
                            
                    </div>
                    @if ($byk == 0)
                            <div class="text-center">
                                <p>Belum Ada Program</p>
                            </div>
                                
                            @endif 
                  <!--/.Table A-->
                  <br>

                  <div class="card-footer">
                    <a href="/PBOTL/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
                </div>
        
          
            </div>   
        </div>
        <!--/Table D-->

    </div>    
</div>

<!---------------------------------------------------------------------------------------------------------------->
<br>
<!--2-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">2. Biaya Operasional kemahasiswaan(Penalaran, Minat, Bakat, dan Kesejahteraan)</h3>
        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    </div>

    <div class="card-body">
        <!--Table A-->
            <div class="row">
                <div class="d-lg-none">{{ $byk = 0 }}</div>
                @foreach ($Pengajuan as $item)
                @if ($item->jenis == "2")
                <div class="d-lg-none">{{ $byk+=1 }}</div>
                <span class="hidden"></span>
                    <div class="col-12 col-sm-4 my-2">
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
                                
                                @foreach ($Penggunaan as $key)
                                    @if($item->penggunaan_id == $key->id)
                                    <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                    @endif
                                @endforeach
                                <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                

                                
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                    </ul>
                                        
                                                       
                            </div>

                            @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fa-regular fa-eye mr-1"></i> Detail
                                        </a> 
                                        <a href="/PKemahasiswaan/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
               
                @endif
                @endforeach  
                    
            </div>
            @if ($byk == 0)
                    <div class="text-center">
                        <p>Belum Ada Program</p>
                    </div>
                        
                    @endif 
          <!--/.Table A-->
          <br>

          <div class="card-footer">
            <a href="/PKemahasiswaan/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
        </div>

  
    </div>   
</div>
<!--2.-->

<!---------------------------------------------------------------------------------------------------------------->
<br>
<!--3-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">3. Biaya Penelitian</h3>
        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    </div>

    <div class="card-body">
        <!--Table A-->
            <div class="row">
                <div class="d-lg-none">{{ $byk = 0 }}</div>
                @foreach ($Pengajuan as $item)
                @if ($item->jenis == "3")
                <div class="d-lg-none">{{ $byk+=1 }}</div>
                <span class="hidden"></span>
                    <div class="col-12 col-sm-4 my-2">
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
                                
                                @foreach ($Penggunaan as $key)
                                    @if($item->penggunaan_id == $key->id)
                                    <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                    @endif
                                @endforeach
                                <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                

                                
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                    </ul>
                                        
                                                       
                            </div>

                            @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fa-regular fa-eye mr-1"></i> Detail
                                        </a> 
                                        <a href="/PPenelitian/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
               
                @endif
                @endforeach  
                    
            </div>
            @if ($byk == 0)
                    <div class="text-center">
                        <p>Belum Ada Program</p>
                    </div>
                        
                    @endif 
          <!--/.Table A-->
          <br>

          <div class="card-footer">
            <a href="/PPenelitian/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
        </div>

  
    </div>    
</div>
<!--3.-->

<!---------------------------------------------------------------------------------------------------------------->
<br>
<!--4-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">4. Biaya PkM</h3>
        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    </div>

    <div class="card-body">
        <!--Table A-->
            <div class="row">
                <div class="d-lg-none">{{ $byk = 0 }}</div>
                @foreach ($Pengajuan as $item)
                @if ($item->jenis == "4")
                <div class="d-lg-none">{{ $byk+=1 }}</div>
                <span class="hidden"></span>
                    <div class="col-12 col-sm-4 my-2">
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
                                
                                @foreach ($Penggunaan as $key)
                                    @if($item->penggunaan_id == $key->id)
                                    <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                    @endif
                                @endforeach
                                <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                

                                
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                    </ul>
                                        
                                                       
                            </div>

                            @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fa-regular fa-eye mr-1"></i> Detail
                                        </a> 
                                        <a href="/PPkM/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
               
                @endif
                @endforeach  
                    
            </div>
            @if ($byk == 0)
                    <div class="text-center">
                        <p>Belum Ada Program</p>
                    </div>
                        
                    @endif 
          <!--/.Table A-->
          <br>

          <div class="card-footer">
            <a href="/PPkM/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
        </div>

  
    </div>   
</div>
<!--4.-->

<!---------------------------------------------------------------------------------------------------------------->
<br>
<!--5-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">5. Biaya Investasi SDM</h3>
        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    </div>

    <div class="card-body">
        <!--Table A-->
            <div class="row">
                <div class="d-lg-none">{{ $byk = 0 }}</div>
                @foreach ($Pengajuan as $item)
                @if ($item->jenis == "5")
                <div class="d-lg-none">{{ $byk+=1 }}</div>
                <span class="hidden"></span>
                    <div class="col-12 col-sm-4 my-2">
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
                                
                                @foreach ($Penggunaan as $key)
                                    @if($item->penggunaan_id == $key->id)
                                    <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                    @endif
                                @endforeach
                                <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                

                                
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                    </ul>
                                        
                                                       
                            </div>

                            @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fa-regular fa-eye mr-1"></i> Detail
                                        </a> 
                                        <a href="/PSDM/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
               
                @endif
                @endforeach  
                    
            </div>
            @if ($byk == 0)
                    <div class="text-center">
                        <p>Belum Ada Program</p>
                    </div>
                        
                    @endif 
          <!--/.Table A-->
          <br>
          <div class="card-footer">
            <a href="/PSDM/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
        </div>
  
    </div>   
</div>
<!--5.-->

<!---------------------------------------------------------------------------------------------------------------->
<br>
<!--6-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">6. Biaya Investasi Sarana</h3>
        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    </div>

    <div class="card-body">
        <!--Table A-->
            <div class="row">
                <div class="d-lg-none">{{ $byk = 0 }}</div>
                @foreach ($Pengajuan as $item)
                @if ($item->jenis == "6")
                <div class="d-lg-none">{{ $byk+=1 }}</div>
                <span class="hidden"></span>
                    <div class="col-12 col-sm-4 my-2">
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
                                
                                @foreach ($Penggunaan as $key)
                                    @if($item->penggunaan_id == $key->id)
                                    <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                    @endif
                                @endforeach
                                <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                

                                
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                    </ul>
                                        
                                                       
                            </div>

                            @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fa-regular fa-eye mr-1"></i> Detail
                                        </a> 
                                        <a href="/PSarana/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
               
                @endif
                @endforeach  
                    
            </div>
            @if ($byk == 0)
                    <div class="text-center">
                        <p>Belum Ada Program</p>
                    </div>
                        
                    @endif 
          <!--/.Table A-->
          <br>

          <div class="card-footer">
            <a href="/Psarana/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
        </div>

  
    </div>      
</div>
<!--6.-->

<!---------------------------------------------------------------------------------------------------------------->
<br>
<!--7-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">7. Biaya Investasi Prasarana</h3>
        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    </div>

    <div class="card-body">
        <!--Table A-->
            <div class="row">
                <div class="d-lg-none">{{ $byk = 0 }}</div>
                @foreach ($Pengajuan as $item)
                @if ($item->jenis == "7")
                <div class="d-lg-none">{{ $byk+=1 }}</div>
                <span class="hidden"></span>
                    <div class="col-12 col-sm-4 my-2">
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
                                
                                @foreach ($Penggunaan as $key)
                                    @if($item->penggunaan_id == $key->id)
                                    <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>    
                                    @endif
                                @endforeach
                                <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>
                                

                                
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>
                                    </ul>
                                        
                                                       
                            </div>

                            @if($item->user_id == Auth::user()->id && $item->status == 'In Progress')
                                                
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <a href="/pengajuan/{{$item->id}}" class="btn btn-sm btn-primary">
                                            <i class="fa-regular fa-eye mr-1"></i> Detail
                                        </a> 
                                        <a href="/PPrasarana/{{$item->id}}/edit" class="btn btn-sm btn-warning mr-4">
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
               
                @endif
                @endforeach  
                    
            </div>
            @if ($byk == 0)
                    <div class="text-center">
                        <p>Belum Ada Program</p>
                    </div>
                        
                    @endif 
          <!--/.Table A-->
          <br>
          <div class="card-footer">
            <a href="/PPrasarana/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
        </div>

  
    </div>    
</div>
<!--7.-->



@endsection