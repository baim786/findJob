@extends('layouts.app')

@section('content')
    
<div class="container">
    <h2 class="text-center mt-4">Create New Posts</h2>
    <hr>
    <hr>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', '',['class'=>'form-control mb-4', 'placeholder'=>'Title']) }}
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('desc', '',['class'=>'form-control mb-4', 'placeholder'=>'Description Text'])}}
    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone', '',['class'=>'form-control mb-4', 'placeholder'=>'Phone number'])}}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', '',['class'=>'form-control mb-4', 'placeholder'=>'Email'])}}
    <div class="form-group">
        {{Form::file('cover_image',['class'=>'center-text mt-3'])}}
    </div>
     {{Form::submit('Submit', ['class'=>'btn btn-primary center-text mt-3 btn-block'])}}
</div>
{!! Form::close() !!}
</div>

@endsection