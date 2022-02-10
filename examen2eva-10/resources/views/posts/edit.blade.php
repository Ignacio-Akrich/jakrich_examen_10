@extends('posts.layout')
@section('content')
<body>
<h1>POSTS</h1> <span>@lang('Create publication')</span>
@if($errors->any)
        <div>
            <ul class="list-group">
                @foreach($errors->all() as $e)
                        <li class="list-group-item list-group-item-danger m-1">{{ $e }}</>
                @endforeach
            </ul>
        </div>
@endif
<form action="{{route('posts.update',$post->id)}}" class="card card-body bg-secondary" method="POST">
        @csrf
        @method('POST')
        <h3>Create a publication</h3>
        <div class="mb-3">
        <label class="form-label">@lang('Title of the publication')</label>
        <input type="text" class="form-control" title="title" placeholder="Title" value="{{ old('title') }}" required>
         <div class="mb-3">
        <label class="form-label">@lang('Publication date')</label>
        <input type="date" class="form-control" title="publi_date" value="{{old('publi_date')}}" required>
        </div>
        <div class="mb-3">
        <label class="form-label">@lang('Options')</label>
        <div class="mb-3">
        <input class="form-check-input" type="checkbox" title="options[]" value="Caducable" {{ (is_array(old('options')) and in_array('Caducable', old('options'))) ? 'checked' : '' }}>
        <label class="form-check-label">@lang('Caducable')</label>
        <input class="form-check-input" type="checkbox" title="optionss[]" value="Comentable" {{ (is_array(old('options')) and in_array('Comentable', old('options'))) ? 'checked' : '' }}>
        <label class="form-check-label">@lang('Comentable')</label>
        </div>
        </div>
        <div class="mb-3">
        <label class="form-label">@lang('Publication extract')</label>
        <div class="mb-3">
        <textarea class="form-control" title="extract" rows="2" value="{{old('extract')}}" required></textarea>
        </div>
        </div>
         <div class="mb-3">
        <label class="form-label">@lang('Publication content')</label>
        <div class="mb-3">
        <textarea class="form-control" title="content" rows="5" value="{{old('content')}}" required></textarea>
        </div>
        </div>
        <div class="mb-3">
        <label class="form-label">Access</label>
        <select class="form-select" name="access" id="access" required>
            <option value="private" value="{{ old('access') }}">Private</option>
            <option value="public" value="{{ old('access') }}">Public</option>
        </select>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
  </body>  
@endsection