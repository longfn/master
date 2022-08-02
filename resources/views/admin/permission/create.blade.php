@extends('layouts.admin.master')

@section('content')
<form class="container-fluid" method="post" action="{{ route('admin.permission.store') }}">
@csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Create a permission </h3>
      <a href="{{ route('admin.permission.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="key" class="form-label"> Key </label>
    <input name="key" type="text" class="form-control @error('key') is-invalid @enderror" id="key" placeholder="">
    @error('key')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="permission_group_id" class="form-label"> Permission Group </label>
    <select name="permission_group_id" id="permission_group_id" class="form-select @error('permission_group_id') is-invalid @enderror">
      <option value="" selected disabled hidden> Select a permission group </option>
      @foreach($permissionGroups as $permissionGroup)
        <option value="{{ $permissionGroup->id }}"> {{ $permissionGroup->name }} </option>
      @endforeach
    </select>
    @error('permission_group_id')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </div>
  </div>
</form>
@endsection
