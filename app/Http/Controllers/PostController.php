<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request){

        //memvalidasi request dengan ketentuan
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg, png, jpg, gif, svg|max:2045',
            'title' => 'required|min:5',
            'content' => 'required|min:5',
        ]);

        //ketika telah tervalidasi maka lanjut
        $image = $request->file("image");
        $image->storeAs('public/posts', $image->hashName());

        //masukan ke database
        Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()-> route('posts.index')-> with(['succes' => 'data telah berhasil disimpan']);
    }

     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */

    public function update(Request $request, Post $post){
        //validasi request

        $this->validate($request, [
            'image' => 'image|mimes:png, jpg, svg, jpeg|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        //jika ada image 
        if($request->hasFile('image')){
            //masukan image ke folder
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //hapus image yang dulu
            Storage::delete('public/post/'.$post->image);

            $post->update([
                'image' => $image->hasName(),
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        else{
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post){

        Storage::delete('public/posts/'. $post->image);

        $post->delete();

        return redirect()->route('posts.index');
    }

}
