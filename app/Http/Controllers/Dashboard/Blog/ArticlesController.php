<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Dashboard\AdminController;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticlesController extends AdminController
{
    /**
     * Display a listing of article.
     *
     * @return Response
     */
    public function index()
    {
        save_resource_url();
        $items = Article::with(['category', 'photos'])->get();

        return $this->view('blog.index', compact('items'));
    }

    /**
     * Show the form for creating a new article.
     *
     * @return Response
     */
    public function create()
    {
        $categories = ArticleCategory::getAllList();

        return $this->view('blog.create_edit', compact('categories'));
    }

    /**
     * Store a newly created article in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate(Article::$rules, Article::$messages);

        $this->createEntry(Article::class, $attributes);

        return redirect_to_resource();
    }

    /**
     * Display the specified article.
     *
     * @param Article $article
     *
     * @return Response
     */
    public function show(Article $article)
    {
        return $this->view('blog.show')->with('item', $article);
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param Article $article
     *
     * @return Response
     */
    public function edit(Article $article)
    {
        $categories = ArticleCategory::getAllList();

        return $this->view('blog.create_edit', compact('categories'))->with('item', $article);
    }

    /**
     * Update the specified article in storage.
     *
     * @param Article $article
     * @param Request $request
     *
     * @return Response
     */
    public function update(Article $article, Request $request)
    {
        $attributes = request()->validate(Article::$rules, Article::$messages);

        $this->updateEntry($article, $attributes);

        return redirect_to_resource();
    }

    /**
     * Remove the specified article from storage.
     *
     * @param Article $article
     * @param Request $request
     *
     * @return Response
     */
    public function destroy(Article $article, Request $request)
    {
        $this->deleteEntry($article, $request);

        return redirect_to_resource();
    }
}
