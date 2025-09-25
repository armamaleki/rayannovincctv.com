<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Article\StoreArticleRequest;
use App\Http\Requests\Manager\Article\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.article.index', compact('articles'));
    }

    public function create()
    {
        return view('manager.article.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['slug'], '-', '');
        $create = Article::create($data);
        return redirect()->route('manager.article.edit', $create);
    }

    public function edit(Article $article)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش مقاله',
                'text' => 'دقت کنید شما در حال ویرایش مقاله هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.article.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['slug'], '-', '');
        $update = $article->update($data);
        return redirect()->route('manager.article.index')->with('message',
            [
                'type' => 'success',
                'title' => 'تعییرات اعمال شد',
                'text' => 'تغییرات با موفقیت اعمال شد از این پس با تغییرات جدید در سایت دیده میشه!!!',
            ]);
    }

    public function destroy(Request $request)
    {
        $article = Article::findOrFail($request->id);
        if ($article) {
            $article->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function trashed()
    {
        $trashed = Article::latestUpdated()->onlyTrashed()->paginate(100);
        return view('manager.article.trashed', compact('trashed'));
    }


    public function avatar(Request $request)
    {
        $request->validate([
            'croppedImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $article = Article::findOrFail($request->model);
        $article->clearMediaCollection('avatars');
        $name = $request->croppedImage->store('avatars/', 'public');
        $article->addMedia(storage_path('app/public/' . $name))
            ->toMediaCollection('avatars', 'public');
        return response()->json(['success' => true]);
    }
}
