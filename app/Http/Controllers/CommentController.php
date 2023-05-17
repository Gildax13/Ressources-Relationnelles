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

class CommentController extends Controller
{
    public function store(int $id,Request $request):View
    {
        //dd($request);
        $content = $request->input('content');

        //dd($request->icon->getClientOriginalName());
        $data=array(
            "content"=>$content,
            "ressources_id" => $id,
            "users_id" => auth()->user()->id,
        );
        DB::table('comment')->insert($data);
        $ressource = Ressources::where('id', '=', $id)->firstOrFail();
        $user = User::where('id','=',$ressource->users_id)->firstOrFail()->name;
        //dd($user);
        $url = '/storage/icons/'.$ressource->icon;
        //dd($ressource);
        return view('showressource',
        ['ressource' => $ressource,
            'url' => $url,
        'user'=> $user]);
    }
}
