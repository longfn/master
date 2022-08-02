@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">Permission List</p>
    <div>
      <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">Create</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> Name </th>
            <th> Key </th>
            <th> Permission Group </th>
            <th> Action </th>
        </tr>
        @if(!empty($permissions))
        @foreach($permissions as $permission)
        <tr>
            <td>
                <p>
                    {{ $permission->name }}
                </p>
            </td>
            <td>
                <p>
                    {{ $permission->key }}
                </p>
            </td>
            <td>
                <p>
                    {{ $permission->permissionGroup->name }}
                </p>
            </td>
            <td>
                <a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-success"> Show </a>
                <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-primary"> Edit </a>
                <form class="d-inline" method="post" action="{{ route('admin.permission.destroy', $permission->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif

        {{ $permissions->links() }}
    </table>
  </div>
</div>

@endsection
