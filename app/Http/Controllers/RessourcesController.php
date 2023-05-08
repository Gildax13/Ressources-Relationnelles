<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ressources;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $this->validate($request, [
        //     'title' => 'required|max:255',
        //     'slug' => 'required|max:20',
        //     'content' => 'required',
        //     'icon' => 'required',
        //     'file' => 'required',
        // ]);
        $title = $request->input('title');
        $slug = $request->input('slug');
        $content = $request->input('content');
        $icon = $request->input('icon');
        $file = $request->input('file');
        $category = $request->categories_id;
        $type = $request->types_id;
        $desc = $request->input('desc');

        //$user = $request->user_id;
        $data=array(
            "title"=>$title,
            "slug"=>$slug,
            "content"=>$content,
            "icon"=>$icon,
            "file"=>$file,
            "categories_id"=>$category,
            "types_id"=>$type,
            "description" => $desc,
            "users_id" => auth()->user()->id,
        );
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
    public function show($id)
    {
        //
    }
}
