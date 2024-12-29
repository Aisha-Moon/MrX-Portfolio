@extends('admin.layout.sidenav-layout')
@section('content')
    @include('components.admin.sidepage.experience-list')
    @include('components.admin.sidepage.experience-create')
    @include('components.admin.sidepage.experience-update')
    @include('components.admin.sidepage.experience-delete')

 
@endsection



