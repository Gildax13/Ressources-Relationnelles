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
use App\Models\Categories;
use App\Models\Type;
use App\Models\Comments;

class RessourcesController extends Controller
{
    /**
     * Show the form to create a new blog post.
     */
    public function create(): View
    {
        $type = Type::all();
        $category = Categories::all();
        return view(
            'createressource',
            [
                'types' => $type,
                'categories' => $category
            ]
        );
    }

    /**
     * Store a new blog post.
     */
    public function store(Request $request): View
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $icon = $request->icon;
        $file = $request->input('file');
        $category = $request->categories_id;
        $type = $request->types_id;
        $desc = $request->input('desc');
        $data = array(
            "title" => $title,
            "content" => $content,
            "categories_id" => $category,
            "types_id" => $type,
            "description" => $desc,
            "users_id" => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        );
        if ($icon != null) {
            $data["icon"] = $icon->getClientOriginalName();
            $icon->storeAs('public/icons', $icon->getClientOriginalName());
        }
        if ($file != null) {
            $data["file"] = $file;
        }
        DB::table('ressources')->insert($data);
        $ressource = DB::select('SELECT * from ressources');
        return view('ressources',
            [
                'ressources' => $ressource
            ]
        );
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
        $comment = DB::select('SELECT content, name FROM comments INNER JOIN users ON comments.users_id = users.id WHERE ressources_id =' . $id . ' ORDER BY comments.created_at ASC');
        $user = User::where('id', '=', $ressource->users_id)->firstOrFail()->name;
        $url = '/storage/icons/' . $ressource->icon;
        return view(
            'showressource',
            [
                'ressource' => $ressource,
                'url' => $url,
                'user' => $user,
                'comment' => $comment
            ]
        );
    }
    public function showguest(int $id)
    {
        $ressource = Ressources::where('id', '=', $id)->firstOrFail();
        $comment = DB::select('SELECT content, name FROM comments INNER JOIN users ON comments.users_id = users.id WHERE ressources_id =' . $id . ' ORDER BY comments.created_at ASC');
        $user = User::where('id', '=', $ressource->users_id)->firstOrFail()->name;
        $url = '/storage/icons/' . $ressource->icon;
        return view(
            'showressourceguest',
            [
                'ressource' => $ressource,
                'url' => $url,
                'user' => $user,
                'comment' => $comment
            ]
        );
    }

    public function shownotverified(int $id)
    {
        $ressource = Ressources::where('id', '=', $id)->firstOrFail();
        $comment = DB::select('SELECT content, name FROM comments INNER JOIN users ON comments.users_id = users.id WHERE ressources_id =' . $id . ' ORDER BY comments.created_at ASC');
        $user = User::where('id', '=', $ressource->users_id)->firstOrFail()->name;
        $url = '/storage/icons/' . $ressource->icon;
        return view(
            'shownotverifiedressource',
            [
                'ressource' => $ressource,
                'url' => $url,
                'user' => $user,
                'comment' => $comment
            ]
        );
    }
    public function verifyressource(int $id)
    {
        $sql = DB::statement('UPDATE ressources SET verified = 1 WHERE id = ' . $id);
        $ressources = Ressources::where('verified', '=', 0)->get();

        return view('verifyressource', [
            'ressources' => $ressources
        ]);
    }

    public function deletenotverifiedressource(int $id)
    {
        DB::statement('DELETE FROM ressources WHERE id = ' . $id);
        $ressources = Ressources::where('verified', '=', 0)->get();

        return view('verifyressource', [
            'ressources' => $ressources
        ]);
    }
}
