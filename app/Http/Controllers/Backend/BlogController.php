<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use App\Http\Requests;
use Intervention\Image\Facades\Image;


class BlogController extends BackendController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;
        if (($status = $request->get('status')) && $status == 'trash') {
            $posts = Post::onlyTrashed()->with('category', 'user')->latest()->paginate($this->limit);
            $postCount = Post::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        } elseif ($status == 'published') {
            $posts = Post::published()->with('category', 'user')->latest()->paginate($this->limit);
            $postCount = Post::published()->count();
        } elseif ($status == 'scheduled') {
            $posts = Post::scheduled()->with('category', 'user')->latest()->paginate($this->limit);
            $postCount = Post::scheduled()->count();
        } elseif ($status == 'draft') {
            $posts = Post::draft()->with('category', 'user')->latest()->paginate($this->limit);
            $postCount = Post::draft()->count();
        } elseif ($status == 'own') {
            $posts = $request->user()->posts()->with('category', 'user')->latest()->paginate($this->limit);
            $postCount = $request->user()->posts->count();
        } else {
            $posts = Post::with('category', 'user')->latest()->paginate($this->limit);
            $postCount = Post::count();
        }
        $statusCount = $this->statusList($request);

        return view('backend.blog.index', compact('posts', 'postCount', 'onlyTrashed', 'statusCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->published_at = $request->published_at;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $request->slug . rand(10, 99) . '.' . $image->getClientOriginalExtension();
            $destination = public_path('img');
            $successUploaded = $image->move($destination, $fileName);
            if ($successUploaded) {
                $thumbnail = "thumb_" . $fileName;
                Image::make($destination . '/' . $fileName)->resize(800, 450)->save($destination . '/' . $thumbnail);
            }
            $post->image = $fileName;
        }
        $post->save();

        return redirect('/backend/blog')->with('message', 'Your post was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('backend.blog.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = POST::findOrFail($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->published_at = $request->published_at;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $oldImage = $post->image;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $request->slug . rand(10, 99) . '.' . $image->getClientOriginalExtension();
            $destination = public_path('img');
            $successUploaded = $image->move($destination, $fileName);
            if ($successUploaded) {
                $thumbnail = "thumb_" . $fileName;
                Image::make($destination . '/' . $fileName)->resize(800, 450)->save($destination . '/' . $thumbnail);
                $this->removeImage($oldImage);
            }
            $post->image = $fileName;
        }
        $post->save();


        return redirect('/backend/blog')->with('message', 'Your post was Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/backend/blog')->with('trash-message', ['Your post moved to Trash', $id]);
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back()->with('message', 'Your post has been restored from Trash');
    }
    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        $this->removeImage($post->image);
        return redirect()->back()->with('message', 'Your post has been deleted successfully');
    }
    private function removeImage($image)
    {
        if (!empty($image)) {
            $imagePath = public_path('img') . '/' . $image;
            $imageThumbPath = public_path('img') . '/thumb_' . $image;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($imageThumbPath)) unlink($imageThumbPath);
        }
    }
    private function statusList($request)
    {
        return [
            'own' => $request->user()->posts()->count(),
            'all' => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft' => Post::draft()->count(),
            'trash' => Post::onlyTrashed()->count(),

        ];
    }
}
