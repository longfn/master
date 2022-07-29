@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">User List</p>
    <div>
      <a href="{{ route('admin.user.form-send-email') }}" class="btn btn-primary">Send mail</a>
      <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> Avatar </th>
            <th> Name </th>
            <th> Email </th>
            <th> Action </th>
        </tr>
        @if(!empty($users))
        @foreach($users as $user)
        <tr>
            <td>
                <img class="user-avatar rounded-circle"
                    src="{{ $user->social_avatar ?? 'https://fakeimg.pl/300/' }}" alt="">
            </td>
            <td>
                <p class="user-info">
                    {{ $user->name }}
                </p>
            </td>
            <td>
                <p class="user-info">
                    {{ $user->email }}
                </p>
            </td>
            <td>
                <button class="btn btn-primary"> Edit </button>
                <button class="btn btn-danger"> Delete </button>
            </td>
        </tr>
        @endforeach
        @endif
    </table>
  </div>
</div>

@endsection
