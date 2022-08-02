@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;"> Showing Permission: </p>
    <div>
      <a href="{{ route('admin.permission.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  @if(!empty($permission))
    <div class="container-fluid">
      <p>
        ID: {{ $permission->id }}
      </p>
      <p>
        Name: {{ $permission->name }}
      </p>
      <p>
        Key: {{ $permission->key }}
      </p>
      <p>
        Permission Group: {{ $permission->permissionGroup->name }}
      </p>
      <p>
        Created at: {{ $permission->created_at }}
      </p>
      <p>
        Updated at: {{ $permission->updated_at }}
      </p>
    </div>
    <div class="row mt-3">
      <div class="d-flex justify-content-center">
        <div>
          <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-primary"> Edit </a>
        </div>
        <div>
          <form class="d-inline" method="post" action="{{ route('admin.permission.destroy', $permission->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> Delete </button>
          </form>
        </div>
      </div>
    </div>
  @endif
</div>

@endsection
