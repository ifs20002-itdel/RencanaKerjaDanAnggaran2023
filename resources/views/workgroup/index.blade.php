@extends('layout.master')
@section('title', 'Workgroup')

@section('breadcrumb1')
    <li class="breadcrumb-item">Group</li>
@endsection

@section('judulTengah', 'Workgroup')

@section('content')
<a href="/workgroup/create"><button type="submit" class="btn btn-success mb-3"><i class="fa-regular fa-plus mr-2"></i>Workgroup</button></a>
  @forelse ($workgroupData as $id => $data)
    <div class="card col-lg-12 col-6">
        <div class="card-header">
            <h3 class="card-title font-weight-bold ">{{ $data['nama'] }}</h3>
            <div class="card-tools">
              <form action="#" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-link text-danger text-gradient px-2 mb-0"><i class="far fa-trash-alt me-2 mr-1"></i>Delete</button>
                <a class="btn btn-link text-dark px-2 mb-0" href="#"><i class="fas fa-pencil-alt text-dark me-2 mr-1" aria-hidden="true"></i>Edit</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button> 
              </form>
              
            </div>
        </div>

        <div class="card-body">
            <!--COntent-->
            <p>Controller: {{ $data['controller'] }}</p>
            <p>Unit:</p>
            
           
         @foreach ($data['unit'] as $unitKey => $unitValue)
            <li>{{ $unitKey }}: {{ $unitValue }}</li>
        @endforeach
            
 
        </div>
    </div>
    @empty
    <div class="card col-lg-12 col-6">
      <div class="card-body">
        <p class="text-center"> Data Jenis Penggunaan Belum ada</p>
      </div>
    </div>
    
    
    @endforelse
@endsection