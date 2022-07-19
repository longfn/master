@extends('layouts.admin.master')
@section('content')
<form class="container-fluid" method="post" action="{{ route('admin.user.store') }}">
@csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Create a user </h3>
      <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  <div class="">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control" id="name" placeholder="">
    @error('name')
    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
    @enderror
  </div>
  <div class="">
    <label for="email" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="email" placeholder="">
    @error('email')
    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
    @enderror
  </div>
  <div class="row">
    <div class="col-md-6">
      <label for="password" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="">
      @error('password')
      <span class="text-danger text-left">{{ $errors->first('password') }}</span>
      @enderror
    </div>
    <div class="col-md-6">
      <label for="password_confirmation" class="form-label">Password Confirm</label>
      <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="">

    </div>
  </div>
  <div class="">
    <label for="address" class="form-label">Address</label>
    <input name="address" type="text" class="form-control" id="address" placeholder="">
  </div>
  <div class="">
    <label for="fblink" class="form-label">Facebook Link</label>
    <input name="fblink" type="text" class="form-control" id="fblink" placeholder="https://example.com">
    @error('fblink')
    <span class="text-danger text-left">{{ $errors->first('fblink') }}</span>
    @enderror
  </div>
  <div class="">
    <label for="ytlink" class="form-label">Youtube</label>
    <input name="ytlink" type="text" class="form-control" id="ytlink" placeholder="https://example.com">
    @error('ytlink')
    <span class="text-danger text-left">{{ $errors->first('ytlink') }}</span>
    @enderror
  </div>
  <div class="">
    <label for="desc" class="form-label">Description</label>
    <textarea name="desc" type="text" class="form-control" id="desc" placeholder=""> </textarea>
  </div>
  <div class="row">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        Save
      </button>
      <button class="btn btn-secondary">
        Reset
      </button>
    </div>
  </div>
</form>
@endsection
