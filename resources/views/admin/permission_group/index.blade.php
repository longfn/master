@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">Permission Group List</p>
    <div>
      <a href="{{ route('admin.permission_group.create') }}" class="btn btn-primary">Create</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> Name </th>
            <th> Action </th>
        </tr>
        @if(!empty($permissionGroups))
        @foreach($permissionGroups as $permissionGroup)
        <tr>
            <td>
                <p>
                    {{ $permissionGroup->name }}
                </p>
            </td>
            <td>
                <a href="{{ route('admin.permission_group.edit', $permissionGroup) }}" class="btn btn-primary"> Edit </a>
                <a href="{{ route('admin.permission_group.destroy', $permissionGroup) }}" class="btn btn-danger"> Delete </a>
            </td>
        </tr>
        @endforeach
        @endif
    </table>
  </div>
</div>

@endsection
