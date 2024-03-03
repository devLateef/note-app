@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Note') }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="description" name="title" type="text" class="form-control" value="{{$note->title}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" name="description" type="text" class="form-control" readonly>{{$note->description}}</textarea>
                            </div>
                        </div>
                        <a href="{{route('notes.edit', $note->id)}}" class="btn btn-secondary btn-sm my-2 col-2">Edit</a>
                <form method="POST" action="{{route('notes.destroy', $note->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm my-2 col-2">Delete</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
