@extends('admin.layout.sidenav-layout')
@section('content')
    @include('components.admin.sidepage.skill.skill-list')
    @include('components.admin.sidepage.skill.skill-create')
    @include('components.admin.sidepage.skill.skill-update')
    @include('components.admin.sidepage.skill.skill-delete')

 
@endsection



