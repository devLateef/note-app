@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex justify-content-end">
                    <a href="{{route('notes.index')}}" class="btn btn-secondary my-2 mx-2">Back</a>
                </div>
                <div class="card-header">{{ __('Note') }}</div>

                <div class="card-body">
                <div>
                @if($errors->any())
                    @foreach($errors->all() as $e)
                        {{$e}}
                    @endforeach
                @endif
                </div>
                <form action="{{$isEdit ? route('notes.update', $note->id) : route('notes.store')}}" method="POST">
                        @csrf
                        @if($isEdit)
                            @method('put')
                        @endif
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" name="title" type="text" value="{{$isEdit ? $note->title : old('title')}}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" name="description" type="text" class="form-control">{{$isEdit ? $note->description : old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-block col-4 my-2 mx-3">
                            <button type="submit" class="btn btn-primary">{{$isEdit ? "Update" : "Create"}}</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
