<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAllPost() {
        $posts = DB::table('posts')->get();

        return view('posts', ['posts' => $posts]);
    }

    public function addPost() {
        return view('add-post');
    }

    public function addPostSubmit(Request $request) {
        DB::table('posts')->insert([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return back()->with('post_created', 'Successfully!');
    }

    public function getPostById($id) {
        $post = DB::table('posts')->where('id', $id)->first();

        return view('single-post', compact('post'));
    }

    public function deletePost($id) {
        DB::table('posts')->where('id', $id)->delete();

        return back()->with('post_deleted', 'Success Deleted!');
    }

    public function editPost($id) {
        $post = DB::table('posts')->where('id', $id)->first();

        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request) {
        DB::table('posts')->where('id', $request->id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return back()->with('post_updated', 'Success Updated!');
    }

    public function innerJoinClasure() {
        $request = DB::table('posts')
                    // ->join('user', 'user.id','=','post.user_id')
                    // ->select('user.name','posts.title','posts.body')
                    ->get();

        return $request;
    }

    public function leftJoinClause() {
        $result = DB::table('user')
                // ->leftJoin('posts', 'users.id','=','posts.user_id')
                ->get();

        return $result;
    }
}
