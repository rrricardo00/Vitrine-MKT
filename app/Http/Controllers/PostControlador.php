<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
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
        $path = $request->file('arquivo')->store('imagens', 'public');
        $posts = new Post();
        $posts->numero = $request->input('numero');
        $posts->descricao = $request->input('descricao');
        $posts->arquivo = $path; //$request->input('arquivo');
        $posts->save();
        return redirect('/');

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        if(isset($posts)){
            $arquivo = $posts->arquivo;
            Storage::disk('public')->delete($arquivo);
            $posts->delete();
        }
        return redirect('/');
    }

    //Download
    public function download($id){
        $posts = Post::find($id);
        if(isset($posts)){
            //$path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($posts->arquivo);
            //return response()->download($path);
            return Storage::disk('public')->download($posts->arquivo);
        }
        return redirect('/');
    }

}
