<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Photo;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();

        $file = $request->file('file');
        $fileName = Carbon::now()->format('Y_m_d_H_i_s') . '_' . $file->getClientOriginalName();
        $file->move('images', $fileName);

        $input['photo_id'] = Photo::create(['file' => $fileName])->id;

        $user = Auth::user();
        $user->posts()->create($input);

        Session::flash('actionResult', 'Post created successfully');

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Post::findOrFail($id)->comments;

        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $input = $request->all();

        $post = Post::findOrFail($id);

        if($file = $request->file('file')) {
            $name = Carbon::now()->format('Y_m_d_H_i_s') . '_' . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['photo_id'] = Photo::create(['file' => $name])->id;

            if($post->photo) {
                unlink(public_path($post->photo->file));
                $post->photo->delete();
            }

        }

        $post->update($input);
        Session::flash('actionResult', 'Post updated successfully');

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->photo->delete();
        unlink(public_path($post->photo->file));
        $post->delete();

        Session::flash('actionResult', 'Post deleted successfully');

        return redirect('/admin/posts');
    }

    public function post($slug) {

        $post = Post::findBySlugOrFail($slug);
        $comments = $post->comments;
        return view('post', compact('post', 'comments'));
    }
}
