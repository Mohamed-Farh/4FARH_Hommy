<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Property_Comment;
use Illuminate\Http\Request;

class Property_CommentController extends Controller
{
    public function show_property_comments($id)
    {
        $property = Property::where('id', $id)->first();

        $property_comments = Property_Comment::where('property_id', $id)->orderBy('id', 'desc')->get();

        return view('pages.admin.property_comments.index', compact('property_comments', 'property'));
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
        try{

             //To Store One Photo For Home Page
            $file = $request->hasFile('file');

            if ($file != '' ) {
                 $file = $request->file('file');
                 $file_name = time().'.'.$file->getClientOriginalExtension();
                 $filePath =('files/property_comment/');
                 $file->move($filePath, $file_name);
                 $save = $file_name;
             }else{
                 $save = 'null';
             }

             $comment = new Property_Comment();
             $comment->file                = $save;
             $comment->user_id             = Auth::id();
             $comment->property_id         = $request->property_id;
             $comment->property_comment    = $request->property_comment;
             $comment->save();

            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
    public function update(Request $request)
    {
        try {

             $comment = Property_Comment::findOrFail($request->id);

             if($request->file('file'))
             {
                 $file = $request->file('file');
                 $file_name = time().'.'.$file->getClientOriginalExtension();
                 $filePath =('files/property_comment/');

                 if ( $file->move($filePath, $file_name) ){
                     if($comment->file !='null'){
                         $old_file = $comment->file; //get old photo
                         unlink('files/property_comment/'.$old_file);  //delete old photo from folder
                     }
                     $comment->file = $file_name;
                     $comment->save();
                 }
             }

             $comment->update([
                $comment->property_comment    = $request->property_comment,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $comment = Property_Comment::findOrFail($request->id);
        if($comment->file)
        {
            if (File::exists('files/property_comment/' .$comment->file) ) {
                unlink('files/property_comment/'.$comment->file);
            }
        }
        $comment->delete();

        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }



    public function property_comment_visible(Request $request)
    {
        try {
            $comments = Property_Comment::findOrFail($request->id);

            if($comments->status == '0'){
                $comments->update([
                    $comments->status = '1',
                ]);
            }elseif($comments->status == '1'){
                $comments->update([
                    $comments->status = '0',
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
