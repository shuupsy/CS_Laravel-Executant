<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Avatars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Foreach_;

class AvatarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $default = User::where('avatar_id',null)->get();
        foreach($default as $d) {
            $d->update([ 'avatar_id' => 1]);
        };

        $avatars = Avatars::all();
        return view('pages.avatars', compact('avatars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::put('public/avatars/', $request->file('avatar'));

        $avatar = new Avatars();
        $avatar -> avatar_name = $request->name;
        $avatar -> avatar_path = $request->file('avatar')->hashName();
        $avatar->save();

        return redirect()->back()->with('success', '(1) Avatar ajouté avec succès!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Avatars::find($id);

        Storage::delete('public/avatars/' . $delete->avatar_path);

        $delete->delete();

        return redirect()->back()->with('success', '(1) Avatar supprimé avec succès !');
    }
}
