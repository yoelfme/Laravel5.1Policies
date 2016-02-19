<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return view('posts/list', compact('posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Gate::denies('update-post', $post)) {
            Alert::danger('No tienes permisos para editar este post');
            return redirect('posts');
        }

        return $post->title;
    }
}
