@extends('layouts.admin')

@section('content')
<h1 class="text-danger">Index type</h1>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<table class="table pb-3">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col" class="d-none d-sm-block">Created</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $types as $type)
            <tr>
                <th scope="row">{{ $type->id}}</th>
                <td>{{ $type->name}}</td>
                <td  class="d-none d-sm-table-cell">{{ $type->created_at}}</td>
                <td>
                    <a class="text-dark-blue" href="{{route('admin.types.show', $type->slug)}}"><i class="fa-solid fa-eye me-2"></i></a>
                    <a class="text-dark-blue" href="{{route('admin.types.edit', $type->slug)}}"><i class="fa-solid fa-pencil me-2"></i></a>
                    <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="delete-button border-0" data-item-title="{{ $type->name }}"> <i
                                class="fa-solid fa-trash text-danger me-1"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
  @include('partials.delete_modal')
@endsection
