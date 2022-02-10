@extends('posts.layout')
@section('content')
<a href="{{route('posts.create')}}" class="btn btn-primary">Create</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>@lang('Title')</th>
                <th>Actions</th>
            </tr>

        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id}}</td>
                <td>{{ $post->title }}</td>
                <td> 
                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
               {{--   @can('isAdmin')  --}}
                    @csrf
                    @method('DELETE')
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">@lang('Edit')</a>
                    <button type="submit" class="btn btn-danger">@lang('Delete')</button>
               {{--   @endcan  --}}
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
