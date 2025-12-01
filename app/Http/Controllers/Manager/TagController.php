<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::where('name', 'like', "%{$request->q}%")
            ->orderBy('id', 'DESC')
            ->paginate(100);
        return view('manager.tags.index', compact('tags'));
    }

    public function create(){
        return view('manager.tags.create');
    }
    public function store(Request $request){
        $data = $request->validate([
           'name' => 'required|unique:tags,name|max:255',
        ]);
        $create = Tag::create($data);
        if($create){
            return redirect()->route('manager.tags.edit', $create);
        }
    }

    public function edit(Tag $tag)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش تگ',
                'text' => 'دقت کنید شما در حال ویرایش تگ هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag){
        $data = $request->validate([
            'name' => 'required|max:255|unique:tags,name,'.$tag->id,
        ]);
        $update = $tag->update($data);
        if($update){
            return redirect()->route('manager.tags.index');
        }
    }

}
