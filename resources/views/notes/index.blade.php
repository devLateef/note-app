@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="d-grid gap-2 d-md-block col-4 my-2 mx-3">
            <a href="{{route('notes.create')}}" class="btn btn-primary">Create New Note</a>
            </div>  
                <div class="card-header">{{ __('Note') }}</div>

                <div class="card-body">
                   <table class="table">
                   <thead>
                   <tr>
                   <th>Note Title</th>
                   <th>Created At</th>
                   <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($notes as $item)
                    <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                    <a href="{{route('notes.show', $item->id)}}" class="btn btn-outline-primary btn-sm">Show</a>
                    <a href="{{route('notes.edit', $item->id)}}" class="btn btn-outline-secondary btn-sm">Edit</a>
                    <form method="post" action="{{route('notes.destroy', $item->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm my-2 col-6">Delete</button>
                    </form>
                    </td>
                    </tr>
                   @endforeach
                   </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
