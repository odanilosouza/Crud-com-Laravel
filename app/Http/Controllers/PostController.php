<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $new_post = [
            'title' => 'Meu primeiro post',
            'content' => 'Conteúdo Qualquer',
            'author' => 'Scott',
        ];
        //Forma mais convencional de criar um registro no banco.
        // $post = new Post($new_post);
        // $post->save();

        $post = new Post();
        $post->title = 'Meu segundo post';
        $post->content = 'Conteúdo qualquer';
        $post->author = 'alow';
        $post->save();

        dd($post);
    }

    public function read(Request $r)
    {
        $posts = new Post();
        $post = $posts->find(2);

        return $post;

    }

    public function all(Request $r)
    {
        $posts = Post::all();

        return $posts;
    }

    public function update(Request $request)
    {
        $posts = Post::where('id', '>', 1)->update([
            'author' => 'Scott',
            'title' => 'Alterado',
        ]);

        return $posts;
    }

    public function delete(Request $request)
    {

        $post = Post::where('id', '>', 0)->delete();
        return $post;

        //     if ($post) {
        //         return $post->delete();
        //     }

        //     return 'Não existe post com esse ID';

    }
}
