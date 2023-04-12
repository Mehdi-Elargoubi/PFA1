@extends('master.layout')

@section('style')
    <style>
        body {
            background-color: #6a55ca;
        }
    </style>
@endsection

@section('title')
    Accueil
@endsection

@section('content')

    <div class="row my-5">
        {{-- <div class="col-md-12">
            <h1 class="mt-4">
                hello from Home Page
            </h1>
        </div> --}}
        @if (session('deleted'))
        <div class="row">
        <div class="alert alert-success text-center alert-dismissible fade show col-6 mx-auto" role="alert">
            <strong> {{ session('deleted') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
        @endif

        @if (session('success'))
            <div class="row">
              <div class="alert alert-success text-center alert-dismissible fade show col-6 mx-auto" role="alert">
                <strong> {{ session('success') }} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
        @endif

        @foreach ($posts as $post )

            <div class="col-md-4 col-sm-6 m-5">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('./uploads/'.$post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ $post->body }}</p>
                      <a href="{{ route('post.show',$post->slug) }}" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection

@section('script')
    <script>
        alert("Hello from Home Page")
    </script>
@endsection