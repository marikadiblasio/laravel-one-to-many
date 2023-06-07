@extends('layouts.admin')

@section('content')
    <h1 class="text-danger">Index type</h1>
    @if (session('message'))
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
                <th scope="col">New Name</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>

                    <td class="d-none d-sm-table-cell">{{ $type->created_at }}</td>
                    <td>
                        <a class="text-dark-blue" href="{{ route('admin.types.show', $type->slug) }}"><i
                                class="fa-solid fa-eye me-2"></i></a>
                        <a class="text-dark-blue" href="#"><i class="fa-solid fa-pencil me-2"></i></a>
                        <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="delete-button border-0" data-item-title="{{ $type->name }}"> <i
                                    class="fa-solid fa-trash text-danger me-1"></i></button>
                        </form>
                    </td>
                    {{-- Form for edit --}}
                    <td>
                        <form action="{{ route('admin.types.update', $type->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 input-group">
                                <input type="text" class="input-group-text @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                <button  type="submit" class="btn btn-primary">Edit</button>
                                @error('name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                    </td>
                    {{-- End editing --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="mb-3 input-group">
            <input type="text" class="input-group-text @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required>
            <button type="submit" class="btn btn-primary">Add Type</button>
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </form>

    @include('partials.delete_modal')
@endsection
