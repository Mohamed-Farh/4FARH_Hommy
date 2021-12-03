<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\Front\Aboutus;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Property;
use App\Models\Property_Comment;
use App\Models\Social;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class ShowFrontController extends Controller
{
    //----------------- Show all Properties In The Website  ------------------
    public function all_property()
    {
        $all_properties= Property::orderBy('id', 'desc')->paginate(9);

        return view('includes.frontpages.all_Properties', compact('all_properties'));
    }

    public function previous_property()
    {
        $all_properties= Property::orderBy('id', 'desc')->where('status', 'sold')->paginate(9);

        return view('includes.frontpages.previous_Properties', compact('all_properties'));
    }

    public function available_property()
    {
        $all_properties= Property::orderBy('id', 'desc')->where('status', 'for_sale')->paginate(9);

        return view('includes.frontpages.available_Properties', compact('all_properties'));
    }

    public function show_property_details($id)
    {
        $property = Property::where('id', $id)->first();

        return view('includes.frontpages.property_details', compact('property'));
    }

    //----------------- Show about In The Website  ------------------
    public function about()
    {
        $abouts= Aboutus::orderBy('id', 'desc')->get();

        return view('includes.frontpages.about', compact('abouts'));
    }

    public function subscribes(Request $request)
    {
        try {
            $Subscribe = new Subscribe();
            $Subscribe->email         = $request->email;
            $Subscribe->save();

            toastr()->success(trans('admins_trans.sub_message'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
    public function home_subscribes(Request $request)
    {
        try {
            $Subscribe = new Subscribe();
            $Subscribe->email         = $request->email;
            $Subscribe->save();

            toastr()->success(trans('admins_trans.sub_message'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    //----------------- Show all Agents In The Website  ------------------
    public function show_agents()
    {
        $agents= Agent::orderBy('id', 'desc')->paginate(8);

        return view('includes.frontpages.agents', compact('agents'));
    }

    public function show_agent_details($id)
    {
        $agent = Agent::where('id', $id)->first();

        return view('includes.frontpages.agent_details', compact('agent'));
    }



    public function front_property_add_comment(Request $request)
    {
        try{
            if( Auth::check() ){
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

                toastr()->success(trans('homy_trans.add_comment'));
                return redirect()->back();
            }else{
                toastr()->error(trans('homy_trans.login_first'));
                return redirect()->back();
            }
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



     //----------------- Show gallary The Website  ------------------
     public function show_gallary()
     {
         $gallaries = Gallery::orderBy('id', 'desc')->paginate(9);

         return view('includes.frontpages.gallary', compact('gallaries'));
     }

     //----------------- Show jobs The Website  ------------------
     public function show_jobs()
     {
         return view('includes.frontpages.jobs');
     }




    //----------------- Show about In The Website  ------------------
    public function news()
    {
        $news = News::orderBy('id', 'desc')->paginate(3);

        return view('includes.frontpages.news', compact('news'));
    }
    //----------------- Show One Property In The Website  ------------------
    public function news_details($head_en)
    {

        $single_new = News::where('head_en', $head_en)->first();

        return view('includes.frontpages.news_details', compact('single_new'));
    }







        //----------------- Show Search In The Website  ------------------

        public function home_search(Request $request)
        {
            $all_properties = Property::when($request->keyword, function ($query, $keyword) {
                return $query->where('title_en', 'like', "%{$keyword}%");

            })->when($request->category_id, function ($query, $category_id) {
                return $query->where('category_id', 'like', "%{$category_id}%");

            })->when($request->city_en, function ($query, $city_en) {
                return $query->where('city_en', 'like', "%{$city_en}%");
            })->when($request->city_ar, function ($query, $city_ar) {
                return $query->where('city_ar', 'like', "%{$city_ar}%");

            })->when($request->address_en, function ($query, $address_en) {
                return $query->where('address_en', 'like', "%{$address_en}%");
            })->when($request->address_ar, function ($query, $address_ar) {
                return $query->where('address_ar', 'like', "%{$address_ar}%");


            })->when($request->price && in_array($request->price, ['more_expensive', 'less_expensive']), function ($query) use ($request) {
                return $query->orderBy('price', $request->price == 'less_expensive' ? 'asc' : 'desc');
            })->when($request->size && in_array($request->size, ['more_size', 'less_size']), function ($query) use ($request) {
                return $query->orderBy('size', $request->size == 'less_size' ? 'asc' : 'desc');


            })->when( ($request->min_price && $request->max_price), function ($query) use ($request) {
                    $query = $query->where('price','>=',$request->min_price);
                    $query = $query->where('price','<=',$request->max_price);
                return $query ;

            })->when( ($request->min_size && $request->max_size), function ($query) use ($request) {
                $query = $query->where('size','>=',$request->min_size);
                $query = $query->where('size','<=',$request->max_size);
            return $query ;

            })->paginate(10);
            // dd($all_properties);

            return view('includes.frontpages.all_properties', compact('all_properties'));
        }


}
