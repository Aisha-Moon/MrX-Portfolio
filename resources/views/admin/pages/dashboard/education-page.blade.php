@extends('admin.layout.sidenav-layout')
@section('content')
    @include('components.admin.sidepage.education.education-list')
    @include('components.admin.sidepage.education.education-create')
    @include('components.admin.sidepage.education.education-update')
    @include('components.admin.sidepage.education.education-delete')

 
@endsection