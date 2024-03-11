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

class CommentsController extends Controller
{
    public function store(int $id,Request $request):RedirectResponse
    {
        $content = $request->input('content');
        $data=array(
            "content"=>$content,
            "ressources_id" => $id,
            "users_id" => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        );
        DB::table('comments')->insert($data);

        $comment = DB::select('SELECT content, name FROM comments INNER JOIN users ON comments.users_id = users.id WHERE ressources_id ='.$id .' ORDER BY comments.created_at ASC');
        $ressource = DB::select('SELECT * from ressources where id ='.$id);
        return redirect()->back();

    }
}
