@extends('layouts.app')

@section('content')
    @if (count($posts) > 0)

        <div class="container">


            <div class="row">
                @foreach ($posts as $post)
                    <a href="/posts/{{ $post->id }}">
                        <div class="col my-2 ml-5">
                            <div class="card" style="width: 18rem; height: 20rem; color:black">
                                <img class="card-img-top rounded img-thumbnail mw-100"
                                    src="/storage/cover_images/{{ $post->cover_image }}" style="height: 200px;" alt="">
                            <div class=" card-body ">
                                <h4 class=" card-title text-truncate">{{ $post->title }}</h4>
                                <p class="card-text text-truncate">
                                    {{ $post->desc }} </p>
                            </div>
                        </div>
            </div>
            </a>
    @endforeach

    {{-- <div class="col-sm" style="border:1px solid #333">Equal Width Stack</div>
                <div class="col-sm" style="border:1px solid #333">Equal Width Stack</div>
                <div class="col-sm" style="border:1px solid #333">Equal Width Stack</div> --}}

    </div>

    </div>


    @endif
@endsection
