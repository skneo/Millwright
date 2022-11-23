<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function newArticle($category)
    {
        $edit = 0;
        $page_heading = 'New Article';
        $submit_url = '/save-article';
        $data = compact('edit', 'submit_url', 'page_heading', 'category');
        return view('articleForm')->with($data);
    }
    public function saveArticle(Request $request)
    {
        $request->validate(
            [
                'category' => 'required',
                'title' => 'required',
                'body' => 'required'
            ]
        );
        $article = new Article();
        $article->category = $request['category'];
        $article->title = $request['title'];
        $article->body = $request['body'];

        $article->save();
        $request->session()->flash('success', $article->title . ' saved!');
        return redirect('/machines');
    }
    public function allArticles()
    {
        $articles = Article::all();
        $data = compact('articles');
        return view('allArticles')->with($data);
    }
    function showArticle($title, $id)
    {
        $article = Article::find($id);
        $data = compact('article');
        return  view('articlePage')->with($data);
    }
    public function edit(Request $request, $title, $id)
    {
        $article = Article::find($id);
        if (!is_null($article)) {
            $page_heading = "Edit Article";
            $edit = 1;
            $submit_url = '/update-article/' . $id;
            $data = compact('article', 'page_heading', 'edit', 'submit_url');
            return view('articleForm')->with($data);
        } else {
            $request->session()->flash('danger', 'No product found with id ' . $id);
        }
        return redirect('/all-articles');
    }
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $request->validate(
            [
                'category' => 'required',
                'title' => 'required',
                'body' => 'required'
            ]
        );
        $article->title = $request['title'];
        $article->category = $request['category'];
        $article->body = $request['body'];

        $article->save();
        $request->session()->flash('success', $article->title . ' updated!');
        return redirect("/article/" . str_replace(' ', '-', $article->title) . "/$article->id");
    }
    function search(Request $req)
    {
        $search = $req['search'];
        if (strlen($search) < 2) {
            $req->session()->flash('danger', 'Search keyword must be greater than or equal to 2 characters!');
            return redirect()->back();
        }
        $articles = Article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get(['id', 'title']);
        $data = compact('articles', 'search');
        return view('articleResults')->with($data);
    }
}
