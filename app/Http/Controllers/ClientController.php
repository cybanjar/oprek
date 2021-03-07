<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function getAllPost() {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }

    public function postById($id){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $response->json();
    }

    public function addPost() {
        $post = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'userId' => 1,
            'title' => 'New Posting By Amin',
            'body' => 'Body Description'
        ]);

        return $post->json();
    }

    public function updatePost() {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/11', [
            'title' => 'Update title',
            'body' => 'Update description'
        ]);

        return $response->json();
    }

    public function deletePost() {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/11');
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully',
            'data' => $response,
        ]);
    }
}
