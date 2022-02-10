<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //QueryBuilder
        Post::create([
        //nombreCampoDatabase => $request->input('nombreCampoFormulario');
        
        'title' => $request->input('title'),
        'create_date' => $request->input('create_date'),
        'publi_date' => $request->input('publi_date'),
        'options' => json_encode($request->input('options')),
        'extract' => $request->input('extract'),
        'content' => $request->input('content'),
        'access' => $request->input('access'),
        'user_id' => Auth::user()->id
        ]);

        //Eloquent

        // $post = new Post();

        // $post->title = $request->input('title');
        // $post->create_date = $request->input('create_date');
        // $post->publi_date = $request->input('publi_date');
        // $post->options = json_encode($request->input('options'));
        // $post->extract = $request->input('extract');
        // $post->content = $request->input('content');
        // $post->access = $request->input('access');
        // $post->user_id = Auth::user()->id;
        // $post->save();

        return redirect()->route('posts.index');

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
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
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
        Post::where('id',$id)->update([
            'title' => $request->input('title'),
            'publi_date' => $request->input('publi_date'),
            'options' => json_encode($request->input('options')),
            'extract' => $request->input('extract'),
            'content' => $request->input('content'),
            'access' => $request->input('access'),   
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);

        return redirect()->route('posts.index');
    }
}
