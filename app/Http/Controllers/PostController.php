<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function indexlanding()
    {
        $posts = Post::with('user')->latest()->paginate(5);

        return view('landing.pages.blog', [
            'post' => $posts
        ]);
    }

    public function index()
    {
        $posts = Post::with('user')->get();

        return view('admin.pages.post', [
            'post' => $posts
        ]);
    }

    public function detailpost($id)
    {
        $post = Post::with('user')->where('id', $id)->firstOrFail();

        return view('landing.pages.detail-blog', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required'
        ], [
                'title.required' => 'judul harus diisi',
                'slug.required' => 'slug harus diisi',
                'image.required' => 'gambar harus diisi',
                'image.image' => 'gambar harus berupa gambar',
                'image.mimes' => 'gambar harus berupa jpeg, png, jpg, gif, svg',
                'image.max' => 'gambar maksimal 2048kb',
                'content.required' => 'konten harus diisi'

            ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('foto/post/'), $imageName);

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $imageName,
            'content' => $request->content,
            'id_user' => '1',
        ]);

        return redirect()->intended('/post')->with('create', 'berhasil create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required'
        ], [
                'title.required' => 'judul harus diisi',
                'slug.required' => 'slug harus diisi',
                'image.required' => 'gambar harus diisi',
                'content.required' => 'konten harus diisi'


            ]);

        $post = Post::where('id', $id)->first();

        if ($request->image) {

            $deleteimg = public_path('foto/post/') . $post->image;
            File::delete($deleteimg);


            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('foto/post/'), $imageName);
            $post->image = $imageName;
        }

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->id_user = '1';
        $post->save();

        return redirect()->intended('/post')->with('update', 'berhasil update');
    }

    public function destroy(Request $request)
    {

        $ids = $request->ids;

        if ($ids != null) {

            $product = Post::whereIn('id', $ids);
            $product->delete();

            if ($product) {
                return redirect()->intended('/post')->with('delete', 'berhasil dihapus');
            }
        } else {
            return redirect()->intended('/post')->with('faildel', 'gagal dihapus');
        }
    }

    public function restorepost()
    {
        $post = Post::onlyTrashed()->get();
        return view('admin.pages.post-terhapus', [
            'post' => $post,
        ]);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id);
        $post->restore();

        return redirect()->intended('/post-restore')->with('restore', 'berhasil restore');

    }

    public function deletepost(Request $request)
    {
        $ids = $request->ids;
        if ($ids != null) {

            $imgedelete = Post::onlyTrashed()->whereIn('id', $ids)->get();
            foreach ($imgedelete as $img) {
                File::delete(public_path('foto/post') . '/' . $img->image);
            }

            $post = Post::onlyTrashed()->whereIn('id', $ids);
            $post->forceDelete();



            if ($post) {
                return redirect()->intended('/post-restore')->with('delete', 'berhasil dihapus');
            }
        } else {
            return redirect()->intended('/post-restore')->with('faildel', 'gagal dihapus');
        }


    }

}