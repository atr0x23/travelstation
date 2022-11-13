<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lib\HasLikes;

class PostController extends Controller
{
    use HasLikes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //$posts = DB::table('posts')->get();
        //dd($posts);
        return view('posts.list', ['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $input = $request->all();

        $input['user_id'] = $request->user_id;
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        Post::create($request->all());

        return back()->with('success', 'Movie Added!');
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
        //
    }


    // shows all the movies of a single user 
    public function filter_by_user($id){

        //$movies = Movie::findOrFail($id);
        $posts = Post::where('user_id', $id)->get();

        //dd($movies);

        return view('posts.list', ['posts'=> $posts]);
        // echo $movies;

    }

       // sort movies by date desc
       public function sort_by_date(){

        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('posts.list', ['posts'=> $posts]); 

    }
}
