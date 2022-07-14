@extends('layouts.admin.master')
@section('content')
  <h3> User Management </h3>
  <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create</a>
@endsection
