<?php

namespace App\Http\Controllers\adminControllers;

use File;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Flipbook;
use App\Models\Flipbook_file;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FlipBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // echo Carbon::now($timezone)->toDateTimeString();
       // $current_time = ($timezone) ? Carbon::now(str_replace('-', '/', $timezone)) : Carbon::now();
        //echo $time->toDateTimeString();
      // return view('flipbook::time', compact('current_time'));
        $flipbooks = DB::table('flipbook')->where('status', '1')->get();

        return view('applicationadmin.flipbook.bookindex',compact('flipbooks'));
    }

    public function create()
    {
        return view('applicationadmin.flipbook.bookcreater');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_name' => 'required',
        ]);

        $input = $request->all();

        $input['status'] = 1;
        $input['name'] = $input['book_name'];
        $book = Flipbook::create($input);

        if($input['book_name']){
            File::makeDirectory('images/'.$book->id,0777,true,true);
        }


        if($request->hasfile('flip_img'))
        {
            foreach($request->file('flip_img') as $key => $file)
            {
                $name = $file->getClientOriginalName();
                $filename  = date('Ymdhis').'_'.$name;
                $path = $file->move(public_path('images/'.$book->id), $filename);
                $insert['FlipBookID'] = $book->id;
                $insert['Name'] = $filename;
                Flipbook_file::create($insert); 
            }
        }
        // dd($input);
        // exit;
       // Subcategory::create($input);

       return redirect()->route('flipbook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flipbook = DB::table('flipbook')->where('id', $id)->get()[0];
       //dd($flipbook);
        $content = explode(",",$flipbook->content);
        return view('flipbook::showbook',compact('flipbook','content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flipbook = DB::table('flipbook')->where('id', $id)->get()[0];
        $content = explode(",",$flipbook->content);
        return view('flipbook::editbook',compact('flipbook','content'));
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
        $fb = Flipbook::find($id);
        $input = $request->all();
        //  return dd($input);

        $fb->content .= ",";
        $i = 1;
        foreach($request->files as $uploadedFile )
            //if($request->hasFile('flip_img'))
        {
            // echo "hi";
            // $request->file()
            // $name = $uploadedFile->getClientOriginalName();

            //$image =  $request->file('flip_img');
            $filename  = time().'_'. $i . '.' . $uploadedFile->getClientOriginalExtension();
            $i++;
            $file = $uploadedFile->move(public_path('rudra/fbook/pics/'), $filename);
            //$path = public_path('rudra/flipbook/pics/' . $filename);
            $path = 'rudra/fbook/pics/' . $filename;

            // Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $fb->content .= $path .",";

        }

        $fb->content = rtrim($fb->content,",");

        $fb->name = $input['book_name'];
        $fb->desc = $input['desc'];
        // $input['urlname'] = strtolower(preg_replace('/[ ,]+/', '-', trim($input['name'])));
        $fb->save();
        //dd($input);
        //exit;
        // Subcategory::create($input);
        return Redirect::route('flipbook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fb = Flipbook::find($id);
        $imgArr = explode(",",$fb->content);
        foreach($imgArr as $img)
        {
            $image = public_path($img);
        if (file_exists($image)) {
            unlink($image);
        }
        }
        $fb->delete();
        return Redirect::route('flipbook.index');
    }
}