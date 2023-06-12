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

@endsection