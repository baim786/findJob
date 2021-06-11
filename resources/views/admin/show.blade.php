@extends('layouts.app')
@section('content')

    <div class="container">
        <a href="/posts" class="btn btn-dark mt-4">Go Back</a>
        <br><br><br>

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <img src="/storage/cover_images/{{ $post->cover_image }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3 class="text-center" style="font-weight: bold">{{ $post->title }}</h3>

                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">{{ $post->desc }}</p>

                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Phone Number</h5>
                            <p class="card-text">{{ $post->phone }}</p>

                        </div>
                    </div>

                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Send your CV to this Email</h5>
                            <p class="card-text">{{ $post->email }}</p>

                        </div>
                    </div>

                </div>
            </div>

        </div>






        @if (!Auth::guest())


            @if (Auth::user()->id == $post->user_id)


                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right text-center']) !!}
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {!! Form::close() !!}
            @endif
        @endif

    </div>
    <br><br><br><br>
@endsection
