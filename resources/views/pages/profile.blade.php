@extends('layout.master')
@section('title', 'Profile')
@section('breadcrumb1')
    <li class="breadcrumb-item">Profile</li>
@endsection

@section('judul', 'Halaman Profile')

@section('content')
 <!-- small box -->
<!-- ./col -->
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <!-- Profile card-body -->
            <div class="card card-info card-outline">
                <div class="card-body box-profile">

                <h3 class="profile-username text-center">
                  {{Auth::user()->pegawai->nama}}
                </h3>

                <a href="mailto: {{Auth::user()->email}}" target="_blank">
                  <p class="text-muted text-center">
                    <i class="fa-solid fa-envelope mr-2"></i>

                    {{Auth::user()->email}}

                  </p>
                </a>
                  
                      

                  {{-- OldCode --}}
                </div>
            <!-- /.card-body -->
          </div>
        
        </div>
        <!-- /.col -->

        <div class="col-md-8">
          <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item mr-3"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa-solid fa-user mr-2"></i>Biodata</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><i class="fa-solid fa-paper-plane mr-2"></i>Semua Pengajuan</a></li>
                </ul>
              </div>

            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="post">

                    {{-- UserInfo --}}
                    <h5 class="ml-3">User Info</h4>
                    <div class="ml-3">

                        <table class="table mt-3 mb-1">

                          
                              <tr>
                                <th>Nama</th>
                                <td>{{Auth::user()->pegawai->nama}}</td>
                              </tr>
                              <tr>
                                <th>Jabatan</th>
                                <td>{{ Auth::user()->pegawai->pejabat->first()->jabatan }}</td>
                              </tr>
                              <tr>
                                <th>NIP</th>
                                <td>{{Auth::user()->pegawai->nip}}</td>
                              </tr>
                              <tr>
                                <th>Kontak Pribadi</th>
                                <td>
                                  <a class="text-muted" href="mailto: {{Auth::user()->pegawai->email}}" target="_blank"> 
                                      {{Auth::user()->pegawai->email}}
                                  </a>
                                </td>
                              </tr>
                          </table>
                          <br>

                    </div>

                    {{-- UnitInfo --}}
                    <h5 class="ml-3">Unit Info</h4>
                      <div class="ml-3">
                      
                          <table class="table mt-3 mb-1">
                                 <tr>
                                  <th>Unit</th>
                                  <td>{{ Auth::user()->pegawai->unit->first()->name }} ({{ Auth::user()->pegawai->unit->first()->inisial }})</td>
                                </tr>  
                                <tr>
                                  <th>Posisi</th>
                                  <td>{{ Auth::user()->pegawai->unit->first()->kepala }}</td>
                                </tr> 
          
                            </table>
                      </div>

                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    <!-- RKA label -->
                    
                      <div class="row"> 
                        
                        <div class="d-lg-none">{{ $byk = 0 }}</div>   
                        @foreach ($Pengajuan as $item)
                            @if ($item->user_id == session('user')['user_id'])
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
                                  <div class="">                                                                                                
                                    @foreach ($Penggunaan as $key)                                                
                                    @if($item->penggunaan_id == $key->id)                                
                                    <h2 class="lead"><b>{{$key->mataAnggaran}}</b></h2>                                    
                                    @endif                                
                                    @endforeach                                                                
                                    <p class="text-muted text-sm"><b>Program: </b> {{Str::limit($item->rincianProgram, 30)}}</p>                                
                                  </div>
                                                                                  
                                  <div class="">                              
                                    <ul class="ml-4 mb-0 fa-ul text-muted">                              
                                      <li class="small"><span class="fa-li"><i class="fas fa-sack-dollar mr-2"></i></span> {{$item->total}}</li>                              
                                      <li class="small"><span class="fa-li"><i class="fas fa-user mr-2"></i></span>{{$item->pemohon}}</li>                              
                                    </ul>                                                                                    
                                  </div>                                                          
                                </div>
                                              
                                @if($item->user_id == session('user')['user_id'] && $item->status == 'In Progress')
                                                
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
    
                                {{-- @if(Auth::user()->jabatan_fungsional == 'Lektor Kepala' && $item->status == 'In Progress')
                                     
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
                                @endif                                                                                --}}
                              </div>                            
                            </div>                                                           
                            @endif                        
                        @endforeach                                                            
                      </div>                      
                      @if ($byk == 0)
                      <div class="text-center" style="font-size: 14px;"> 
                        <p>Belum Ada Program</p>
                      </div>                                    
                      @endif 
                        <!--/.Table A-->
                        <br>
                      <div class="card-footer">
                          <a href="/pengajuan"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Input Program</button></a>
                      </div>
                      <!--/.Tambah Data-->
                  
                    <!-- /.RKA-label -->
                </div>
                <!-- /.tab-pane -->


              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

        
@endsection