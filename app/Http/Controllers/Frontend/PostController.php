<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('is_active', 1)
            ->where('published_at', '!=', null)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(5);

        $categories = $this->getCategory();
        return view('home', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        if (!$post->is_active || $post->published_at > Carbon::now()) {
            throw new NotFoundHttpException();
        }

        $prev = Post::where('is_active', 1)
            ->whereNotNull('published_at')
            ->inRandomOrder()
            ->limit(1)
            ->first();
        $next = Post::where('is_active', 1)
            ->whereNotNull('published_at')
            ->inRandomOrder()
            ->limit(1)
            ->first();
        $categories = $this->getCategory();

        return view('post.view', compact('post', 'prev', 'next', 'categories'));
    }

    /**
     * get posts by category
     */
    public function byCategory(Category $category)
    {
        $posts = $category->posts()->paginate(5);
        $categories = $this->getCategory();
        return view('home', compact('posts', 'categories'));
    }

    /**
     * get posts by category
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getCategory()
    {
        return Category::withCount(['posts' => function (Builder $query) {
            $query->where('is_active', 1);
            $query->whereNotNull('published_at');
        }])
            ->orderBy('posts_count', 'desc')
            ->take(4)
            ->get();
    }
}
