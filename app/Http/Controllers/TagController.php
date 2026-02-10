<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Community;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::withCount('communities')->get();
        return view('tag.index',compact('tags'));
    }
    public function create(){
        return view('tag.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
    'tag_name' => ['required'],
]);

Tag::create($validated);



        return redirect()->route('tag.index')->with('success','Tag has been added');
    }
    public function edit(Tag $tag){
    $tag->load('communities');

    $communities = Community::orderBy('name')->get();
    $selectedCommunityIds = $tag->communities->pluck('id')->toArray();

    return view('tag.edit', compact('tag','communities','selectedCommunityIds'));
}
    public function update(Request $request, Tag $tag){
    $validated = $request->validate([
        'tag_name' => ['required'],
        'community_id' => ['nullable','array'],
    ]);

    $tag->update([
        'tag_name' => $validated['tag_name'],
    ]);

    // sync ความสัมพันธ์ many-to-many
    $tag->communities()->sync($validated['community_id'] ?? []);

    return redirect()->route('tag.index')->with('success','Tag has been updated');
}

    public function destroy(Tag $tag){
        $tag->communities()->detach();
        $tag->delete();
        return redirect()->route('tag.index')->with('success','Tag has been deleted');
    }

    public function show(Tag $tag){
        $tag->load('communities');
        return view('tag.show',compact('tag'));
    }

}
