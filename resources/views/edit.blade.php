@extends('master.layout')

@section('style')
    <style>
        body {
            background-color: #9a86f5;
        }
    </style>
@endsection

@section('title')
    Modifer-Post : {{ $post->title }}
@endsection

@section('content')

    <div class="row my-4">
        <div class="col-md-8 mx-auto">

            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center ">
                        Modifier - {{ $post->title }}
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update', $post->slug) }}" method="post"enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                          </div>
                          <div class="mb-3">
                            <label for="body" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="body" name="body" >{{ $post->body }}</textarea>
                          </div>                          
                          <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                          </div>

                          <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

