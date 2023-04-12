@extends('master.layout')

@section('style')
    <style>
        body {
            background-color: #6a55ca;
        }
    </style>
@endsection

@section('title')
    {{ $post->title }}
@endsection

@section('content')

<div class="d-flex justify-content-center align-items-center">

    <div class="row my-5">
        {{-- <div class="col-md-12">
            <h1 class="mt-4">   
                hello from show Page
            </h1>
        </div> --}}

            <div class="col-md-12 col-sm-6 m-5 mt-0">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('./uploads/'.$post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ $post->body }}</p>
                    </div>
                </div>
                <a href="{{ route('post.edit',$post->slug) }}" class="btn btn-warning">
                    Modifier
                </a>
                <form id="{{ $post->id }}" action="{{ route('post.delete',$post->slug) }}" method="post">
                    @csrf
                    @method('Delete')
                    <button
                        onclick="event.preventDefault();
                                if(confirm('Confirmer votre suppression !!!')
                                document.getElementById({{ $post->id }}).submmit();" 
                        class="btn btn-danger" type="submit">
                        Supprimer
                    </button>  
                </form>
          
                
                </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        alert("Hello from Home Page")
    </script>
@endsection