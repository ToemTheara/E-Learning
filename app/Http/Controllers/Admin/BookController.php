<?php

namespace App\Http\Controllers\Admin;

use App\Books;
use App\Http\Controllers\Controller;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            $books = Books::latest()->paginate(3);
            return view("web_admin.books.index", compact('books', ))->with('i',(request()->input('page',1)-1)*3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("web_admin.books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'  => 'required|mimes:png,jpeg,JPG|max:2048',
            'name'  =>' required',
            'type'  =>' required',
            'url' => 'required|mimes:pdf|',

        ]);
        $books = new Books();
        $books->book_image = $request->input('image');
        $books->book_name = $request->input('name');
        $books->type = $request->input('type');
        $books->url = $request->input('url');
        $books->description = $request->input('description');


        // Image store
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$extention;
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Book pdf
        if($request->hasFile('url')){
            $fileNameWithExt = $request->file('url')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('url')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$extention;
            $path = $request->file('url')->storeAs('public/files',$fileNameToStore);
        }else {
            $fileNameToStore = 'nofile.pdf';
        }
        $books->book_image = $fileNameToStore;
        $books->url = $fileNameToStore;
        $books->save();

        return redirect()->route('index')->with('success','Book Created!');

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
    public function edit()
    {
        return view("web_admin.books.edit");
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
}
