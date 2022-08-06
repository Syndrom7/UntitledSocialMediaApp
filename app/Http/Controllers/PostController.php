<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('post-img')){
            $filename = $request->file('post-img')->getClientOriginalName();
            $path = $request->file('post-img')->storeAs('public/images/post-images',$filename);
            $path = str_replace('public', 'storage', $path);
            $post = new Post();
            $post->image = $path;
            $post->text = $request->input('post-text');
            $post->user_id = $request->user()->id;
            $post->save();
            return redirect('/')->with(['notify' => 'Post created success.']);
        }else {
            $path = "";
            $post = new Post();
            $post->image = $path;
            $post->text = $request->input('post-text');
            $post->user_id = $request->user()->id;
            $post->save();
            return redirect('/')->with(['notify' => 'Post created success.']);
        }



    }

    public function likePost($id)
    {
        $post = Post::find($id);
        $post->like();
        $post->save();

        return redirect('/')->with('notify','Post Liked successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();
        
        return redirect('/')->with('notify','Post Disliked successfully!');
    }


    public function createComment(Request $request, $id)
    {
        $comment = new Comment();
        $comment->text = $request->input('comment');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->save(); 
        return redirect('/')->with(['notify' => 'Post comment created success.']);
    }


    public function update(Request $request)
    {
        if($request->hasFile('post-img')){
            $filename = $request->file('post-img')->getClientOriginalName();
            $path = $request->file('post-img')->storeAs('public/images/post-images',$filename);
            $path = str_replace('public', 'storage', $path);

            $post = Post::find($request->updateID);
            $post->image = $path;
            $post->text = $request->input('post-text');
            $post->save();
            return redirect('/')->with(['notify' => 'Post updated successfuly.']);
        }else {
            $path = "";
            $post = Post::find($request->updateID);
            $post->image = $path;
            $post->text = $request->input('post-text');
            $post->save();
            return redirect('/')->with(['notify' => 'Post updated successfuly.']);
        }



    }


    public function delete($id)
    {
        $id = Post::find($id);
        $id->delete();
        return redirect('/')->with(['notify' => 'Post deleted successfuly!']);
    }


}
