@extends('admin.layout.sidenav-layout')
@section('content')
    @include('components.admin.sidepage.project.project-list')
    @include('components.admin.sidepage.project.project-create')
    @include('components.admin.sidepage.project.project-update')
    @include('components.admin.sidepage.project.project-delete')

 
@endsection


