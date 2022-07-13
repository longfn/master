@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
{{--
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
--}}
</div>
<form class="container-fluid" method="post" action="{{ route('admin.user.store') }}">
@csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Create a user </h3>
      <button class="btn btn-primary">
        Back
      </button>
    </div>
  </div>
  <div class="">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control" id="name" placeholder="">
    @if ($errors->has('name'))
    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
    @endif
  </div>
  <div class="">
    <label for="email" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="email" placeholder="">
    @if ($errors->has('email'))
    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
    @endif
  </div>
  <div class="row">
    <div class="col-md-6">
      <label for="password" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="">
      @if ($errors->has('password'))
      <span class="text-danger text-left">{{ $errors->first('password') }}</span>
      @endif
    </div>
    <div class="col-md-6">
      <label for="password-confirm" class="form-label">Password Confirm</label>
      <input name="password-confirm" type="password" class="form-control" id="password-confirm" placeholder="">
      @if ($errors->has('password-confirm'))
      <span class="text-danger text-left">{{ $errors->first('password-confirm') }}</span>
      @endif
    </div>
  </div>
  <div class="">
    <label for="address" class="form-label">Address</label>
    <input name="address" type="text" class="form-control" id="address" placeholder="">
  </div>
  <div class="">
    <label for="fblink" class="form-label">Facebook Link</label>
    <input name="fblink" type="text" class="form-control" id="fblink" placeholder="https://example.com">
    @if ($errors->has('fblink'))
    <span class="text-danger text-left">{{ $errors->first('fblink') }}</span>
    @endif
  </div>
  <div class="">
    <label for="ytlink" class="form-label">Youtube</label>
    <input name="ytlink" type="text" class="form-control" id="ytlink" placeholder="https://example.com">
    @if ($errors->has('ytlink'))
    <span class="text-danger text-left">{{ $errors->first('ytlink') }}</span>
    @endif
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
