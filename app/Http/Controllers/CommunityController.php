<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Tag;


class CommunityController extends Controller
{
    public function index(){
        $communities = Community::with('tags')->get();
        return view('community.index',compact('communities'));
    }
    public function create(){
        $tags = Tag::all();
        return view('community.create',compact('tags'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'district' => ['nullable'],
            'province' => ['nullable'],
            'tag_id' => ['nullable','array'],
        ]);
        $community = Community::create($validated);
        $community->tags()->sync($validated['tag_id'] ?? []);
        return redirect()->route('community.index')->with('success','Community has been added');
    }
    public function edit(Community $community){
        $community->load('tags');
        $tags = Tag::orderBy('tag_name')->get();
        $selectedTagIds = $community->tags->pluck('id')->toArray();


        return view('community.edit',compact('community','tags','selectedTagIds'));
    }
    public function update(Request $request,Community $community){
        $validated = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'district' => ['nullable'],
            'province' => ['nullable'],
            'tag_id'   => ['nullable','array']
        ]);
        $community->update($validated);
        $community->tags()->sync($validated['tag_id'] ?? []);
        return redirect()->route('community.index')->with('success','Community has been updated');
    }
    public function destroy(Community $community){
        $community->delete();
        return redirect()->route('community.index')->with('success','Community has been deleted');
    }
}
