<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\UploadFile;


class HomeController extends Controller
{
    public function index(){

        $posts = Post::paginate(20);
        
        return view('home')->with([
            'posts' => $posts,
        ]);
    }


    public function show($slug){

        $post = Post::where('slug',$slug)->first();
        //$post = Post::find($slug);
        return view('show')->with([
            'post'=> $post,
        ]);
    }

    public function create(){

        return view('create');
    }
    public function store(PostRequest $request){

        //dd($request->image);
        // $post = new Post();
        // $post->title=$request->title;
        // $post->slug=Str::slug($request->title);
        // $post->body=$request->body;
        // $post->image="https://cdn.pixabay.com/photo/2022/11/07/16/09/outdoor-7576744_1280.jpg";
        // $post->save();

        // Validation des champs
        // $this->validate($request,[
        //     'title'=>'required|min:3|max:20',
        //     'body'=>'required|min:10|max:200',
        //     'image'=>'required|image|mimes:pnj,jpg,jpeg|max:1024:',
        // ]);

        if($request->has('image')){
            $file = $request->image;
            $image_name= time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/'),$image_name);
        }
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'image' => $image_name,
            //'image' => "https://cdn.pixabay.com/photo/2022/11/07/16/09/outdoor-7576744_1280.jpg",
        ]);
        
        // return redirect()->route('post.home')->with([
        //     'success' => 'Post ajouter avec succes'
        //     ]);        
        
        // return redirect('/')->with(
        //     'success' , 'Post ajouter avec succes'
        //  );

        return redirect()->route('post.home')->with(
            'success', 'Post créer avec success !!!'
        );

    }
    
    public function edit($slug){

        //$post = Post::find($id);
        $post = Post::where('slug', $slug)->first();
        return view('edit')->with([
            'post' => $post
        ]);
    }

        public function update(PostRequest $request, $slug){
            
            //$post = Post::find($id);
           // $post = Post::find($slug);
            $post = Post::where('slug',$slug)->first();
            if($request->has('image')){
                $file = $request->image;
                $image_name= time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/'),$image_name);
                unlink(public_path('uploads/').$post->image);
                $post->image = $image_name;
            }
            $post->update([
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title),
                'image' => $post->image,
            ]);

            return redirect()->route('post.show',$post->slug)->with(
                'updated', 'Post modifier avec success !!!'
            );

        }

        public function delete($slug){

            $post = Post::where('slug',$slug)->first();
            unlink(public_path('uploads/').$post->image);
            $post->delete();
            return redirect()->route('post.home')->with(
                'deleted', 'Post Supprimer avec success !!!'
            );
        }


}
