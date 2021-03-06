@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;"> Send email to user </p>
    <div>
      <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  <form method="post" action="{{ route('admin.user.send') }}" enctype="multipart/form-data">
    @csrf
    <select class="form-control" name="mail">
      <option value="all">Select a user</option>
      @if(!empty($users))
        @foreach($users as $user)
        <option value="{{ $user['email'] }}">{{ $user['name'] }}</option>
        @endforeach
      @endif
    </select>
    <div class="form-group">
      <label for="attachment"> File đính kèm </label>
      <input class="form-control" type="file" id="attachment" name="attachment">
    </div>
    <div class="d-flex justify-content-center">
      <div>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </form>
</div>

@endsection
