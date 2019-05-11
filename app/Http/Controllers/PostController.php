<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function postPost(Request $request, $id = null)
    {
        $detail = $request->konten_pos;
        if ($id) {
            $post = Post::where('id', $id)->first();
        } else {
            $post = new Post;
        }

        if ($post) {
            $dom = new \domdocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');

            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach ($images as $k => $img) {
                $data = $img->getattribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);
                $image_name = time() . $k . '.png';
                $path = public_path() . "/post-{$post->id}/" . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
            }

            $detail = $dom->savehtml();
            if ($id) {
                $post->penyunting = 'admin';
                $post->ip_penyunting = $request->ip();
            } else {
                $post->pembuat = 'admin';
                $post->ip_pembuat = $request->ip();
            }
            $post->konten = $detail;
            $post->save();
            return redirect('/')->with('alert', 'Pos berhasil dibuat');
        } else {
            return abort(404);
        }
    }

    public function showPost(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            return view('show-post', compact('post'));
        } else {
            return abort(404);
        }
    }

    public function editPost(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            return view('new-post', compact('post'));
        } else {
            return abort(404);
        }
    }
}
