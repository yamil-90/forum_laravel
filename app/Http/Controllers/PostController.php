<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Session;
class PostController extends Controller
{
    //
    public function show(Post $post){//here we are injecting the post class

    	return view('blog-post', ['post'=>$post]); //we return the view, with the post that we got from the previous page

    }


    public function create(){
        $this->authorize('create', Post::class);
    	return view('admin.posts.create',['categories'=>Category::all()]); //we return the view, with the post that we got from the previous page

    }


    public function store(){
        $this->authorize('create', Post::class);
         $inputs = request()->validate([
             'title'=> 'required|min:8|max:255',
             'post_image'=> 'file',
             'body'=> 'required',
             'category_id'=>'required'
         ]);
          if(request('post_image')){
              $inputs['post_image'] = request('post_image')->store('images');//esta poronga no solo me crea una carpeta llamada images sino que tambien lepone el puto nombre en la base de datos
          }
        auth()->user()->posts()->create($inputs);
        session()->flash('post-created-message', 'Post was created');

        return redirect()->route('post.index');
    }


    public function update(Post $post){
        $this->authorize('update', $post);
        $inputs = request () ->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required',
            'category_id'=>'required'
        ]);
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');//esta poronga no solo me crea una carpeta llamada images sino que tambien lepone el puto nombre en la base de datos
        }
        $this->authorize('update',$post);
        $post->update($inputs);
        session()->flash('post-updated-message', 'Post was updated');
        return redirect()->route('post.index');
    }


	public function index(){
        //$posts = Post::all(); //here we get all the post of the page
        $posts = auth()->user()->posts()->paginate(5); //here we only get the post of the user that is loged in
    	return view('admin.posts.index', ['posts'=>$posts,'categories'=>Category::all()]);
    }


    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        Session::flash('message', "Post Deleted");
        return back();
    }


    public function edit(Post $post){
        $this->authorize('view',$post);
        return view('admin.posts.editPost', ['post'=> $post,'categories'=>Category::all()]);
    }
}
