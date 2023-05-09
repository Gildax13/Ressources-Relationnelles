<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ressources;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Type;

class RessourcesController extends Controller
{
    /**
     * Show the form to create a new blog post.
     */
    public function create(): View
    {
        $type = Type::all();
        $category = Category::all();
        return view('createressource',
        ['types' => $type,
        'categories' => $category]);
    }

    /**
     * Store a new blog post.
     */
    public function store(Request $request):View
    {
        $title = $request->input('title');
        $slug = $request->input('slug');
        $content = $request->input('content');
        $icon = $request->icon;
        $file = $request->input('file');
        $category = $request->categories_id;
        $type = $request->types_id;
        $desc = $request->input('desc');
        //dd($request->icon->getClientOriginalName());
        $data=array(
            "title"=>$title,
            "slug"=>$slug,
            "content"=>$content,
            "categories_id"=>$category,
            "types_id"=>$type,
            "description" => $desc,
            "users_id" => auth()->user()->id,
        );
        //dd($request->icon);
        if($icon != null){
            $data["icon"] = $icon->getClientOriginalName();
            $icon->storeAs('public/icons',$icon->getClientOriginalName());
            // $nameFile = Storage::disk('public')->put('icons/'.$icon->getClientOriginalName(), $icon);
            // dd(Storage::get($nameFile));
        }
        if($file != null){
            $data["file"] = $file;
        }
        //dd($data);
        DB::table('ressources')->insert($data);
        return view('confirmressource');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $ressource = Ressources::where('id', '=', $id)->firstOrFail();
        //dd($ressource);
        return view('showressource',
        ['ressource' => $ressource]);
    }






}
