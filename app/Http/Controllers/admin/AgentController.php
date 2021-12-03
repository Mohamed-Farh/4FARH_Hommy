<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();

        // $top_new = News::where('status', '0');

        return view('pages.admin.agents.index', compact('agents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {

            //To Store One Photo For Home Page
            $file = $request->hasFile('photo');

            if ($file != '' ) {
                $image = $request->file('photo');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath =('image/agents');
                $image->move($destinationPath, $name);
                $photo=$name;
            }else{
                $photo = 'default.png';
            }

            $agent = new Agent();
            $agent->photo              =  $photo;
            $agent->name_ar            =  $request->name_ar;
            $agent->name_en            =  $request->name_en;
            $agent->phone              =  $request->phone;
            $agent->ex_years           =  $request->ex_years;

            $agent->position_ar        =  $request->position_ar;
            $agent->position_en        =  $request->position_en;
            $agent->about_ar           =  strip_tags($request->about_ar);
            $agent->about_en           =  strip_tags($request->about_en);

            $agent->email              =  $request->email;
            $agent->facebook           =  $request->facebook;
            $agent->twitter            =  $request->twitter;
            $agent->linked_in          =  $request->linked_in;

            $agent->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('agents.index');
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
        $agent = Agent::findOrFail($id);

        return view('pages.admin.agents.edit', compact('agent'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        try {
            $agent = Agent::where('id', $agent->id)->first();

            // To Store One Photo For Home Page
            if ($request->hasFile('photo')){
                $image = $request->file('photo');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath =('image/agents');

                if ( $image->move($destinationPath, $name) ){
                    if($agent->photo){
                    $old_photo = $agent->photo; //get old photo
                    unlink('image/agents/'.$old_photo);  //delete old photo from folder
                    }
                    $agent->photo = $name;
                    $agent->save();
                }
            }

            $agent->update([
                $agent->name_ar            =  $request->name_ar,
                $agent->name_en            =  $request->name_en,
                $agent->phone              =  $request->phone,
                $agent->ex_years           =  $request->ex_years,

                $agent->position_ar        =  $request->position_ar,
                $agent->position_en        =  $request->position_en,
                $agent->about_ar           =  strip_tags($request->about_ar),
                $agent->about_en           =  strip_tags($request->about_en),

                $agent->email              =  $request->email,
                $agent->facebook           =  $request->facebook,
                $agent->twitter            =  $request->twitter,
                $agent->linked_in          =  $request->linked_in,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('agents.index');
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
        $agent = Agent::findOrFail($request->id);
        if($agent->photo)
        {
            if (File::exists('image/agents/' .$agent->photo) ) {
                unlink('image/agents/'.$agent->photo);
            }
        }
        $agent->delete();

        toastr()->error(trans('messages.Delete'));
        return redirect()->route('agents.index');
    }
}
