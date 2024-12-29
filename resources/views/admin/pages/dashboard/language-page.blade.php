@extends('admin.layout.sidenav-layout')
@section('content')
    @include('components.admin.sidepage.language.language-list')
    @include('components.admin.sidepage.language.language-create')
    @include('components.admin.sidepage.language.language-update')
    @include('components.admin.sidepage.language.language-delete')
@endsection



