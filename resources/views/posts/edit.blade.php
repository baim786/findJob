@extends('layouts.app')

@section('content')
<div class="container">
        
<h2 class="text-center mt-4">Edit Posts</h2>

{!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', $post->title,['class'=>'form-control mb-4', 'placeholder'=>'Title']) }}
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('desc', $post->desc,['class'=>'form-control mb-4', 'placeholder'=>'Description Text'])}}
    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone', $post->phone,['class'=>'form-control mb-4', 'placeholder'=>'Phone number'])}}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', $post->email,['class'=>'form-control mb-4', 'placeholder'=>'Email'])}}
    {{Form::hidden('_method','PUT')}}
    <div class="form-group">
        {{Form::file('cover_image',['class'=>'center-text mt-3'])}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block mt-4'])}}
</div>
{!! Form::close() !!}
</div>
@endsection