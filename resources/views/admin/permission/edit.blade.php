@extends('layouts.admin.master')
@section('content')
@if (!empty($permission))
  <form class="container-fluid" method="post" action="{{ route('admin.permission.update', $permission->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Editing permission: </h3>
      <a href="{{ route('admin.permission.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $permission->id }} </p>
  </div>
  <div class="container-fluid">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ $permission->name }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="key" class="form-label"> Key </label>
    <input name="key" type="text" class="form-control @error('key') is-invalid @enderror" id="key" placeholder="" value="{{ $permission->key }}">
    @error('key')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="permission_group_id" class="form-label"> Permission Group </label>
    <select name="permission_group_id" id="permission_group_id" class="form-select @error('permission_group_id') is-invalid @enderror">
      @foreach($permissionGroups as $permissionGroup)
        @if ($permission->permissionGroup->id == $permissionGroup->id)
          <option value="{{ $permissionGroup->id }}" selected> {{ $permissionGroup->name }} </option>
        @else
          <option value="{{ $permissionGroup->id }}"> {{ $permissionGroup->name }} </option>
        @endif
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
@endif
@endsection
