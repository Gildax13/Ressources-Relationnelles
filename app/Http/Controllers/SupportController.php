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
use App\Models\Comments;
use App\Models\Support;

class SupportController extends Controller
{
    public function store(Request $request):View
    {
        $subject = $request->input('subject');
        $reason = $request->input('reason');
        $information = $request->input('information');;
        
        $data=array(
            "subject"=>$subject,
            "reason"=>$reason,
            "information"=>$information,
            "users_id" => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        );
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
        $support = Support::where('id', '=', $id)->firstOrFail();
        $user = User::where('id','=',$support->users_id)->firstOrFail()->name;
        return view('showsupport',
        ['support' => $support,
        'user' => $user,
    ]);
    }
}
