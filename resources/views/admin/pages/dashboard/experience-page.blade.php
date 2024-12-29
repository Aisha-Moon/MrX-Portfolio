@extends('admin.layout.sidenav-layout')
@section('content')
    @include('components.admin.sidepage.experience.experience-list')
    @include('components.admin.sidepage.experience.experience-create')
    @include('components.admin.sidepage.experience.experience-update')
    @include('components.admin.sidepage.experience.experience-delete')

 
@endsection



