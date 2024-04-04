<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Slide;
use DB;
use Auth;

class PageHomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function edit() {
        $page_home = PageHomeItem::where('id',1)->first();
        return view('admin.page_home', compact('page_home'));
    }

    public function update(Request $request) {
    

        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        if($request->search_background != '') {
            $request->validate([
                'search_background' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'search_background.image' => ERR_PHOTO_IMAGE,
                'search_background.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'search_background.max' => ERR_PHOTO_MAX
            ]);
            $rand_value = md5(mt_rand(11111111,99999999));
            $ext = $request->file('search_background')->extension();
            $final_name = $rand_value.'.'.$ext;
            $request->file('search_background')->move(public_path('uploads/site_photos/'), $final_name);
            $data['search_background'] = $final_name;
        }

        if($request->testimonial_background != '') {
            $request->validate([
                'testimonial_background' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'testimonial_background.image' => ERR_PHOTO_IMAGE,
                'testimonial_background.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'testimonial_background.max' => ERR_PHOTO_MAX
            ]);
            $rand_value = md5(mt_rand(11111111,99999999));
            $ext = $request->file('testimonial_background')->extension();
            $final_name = $rand_value.'.'.$ext;
            $request->file('testimonial_background')->move(public_path('uploads/site_photos/'), $final_name);
            $data['testimonial_background'] = $final_name;
        }

        if($request->video_background != '') {
            $request->validate([
                'video_background' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'video_background.image' => ERR_PHOTO_IMAGE,
                'video_background.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'video_background.max' => ERR_PHOTO_MAX
            ]);
            $rand_value = md5(mt_rand(11111111,99999999));
            $ext = $request->file('video_background')->extension();
            $final_name = $rand_value.'.'.$ext;
            $request->file('video_background')->move(public_path('uploads/site_photos/'), $final_name);
            $data['video_background'] = $final_name;
        }


        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');
        $data['search_heading'] = $request->input('search_heading');
        $data['search_text'] = $request->input('search_text');
        $data['brand_heading'] = $request->input('brand_heading');
        $data['brand_subheading'] = $request->input('brand_subheading');
        $data['brand_total'] = $request->input('brand_total');
        $data['brand_status'] = $request->input('brand_status');
        $data['video_heading'] = $request->input('video_heading');
        $data['video_text'] = $request->input('video_text');
        $data['video_youtube_id'] = $request->input('video_youtube_id');
        $data['video_status'] = $request->input('video_status');
        $data['listing_heading'] = $request->input('listing_heading');
        $data['listing_subheading'] = $request->input('listing_subheading');
        $data['listing_total'] = $request->input('listing_total');
        $data['listing_status'] = $request->input('listing_status');
        $data['testimonial_heading'] = $request->input('testimonial_heading');
        $data['testimonial_subheading'] = $request->input('testimonial_subheading');
        $data['testimonial_status'] = $request->input('testimonial_status');
        $data['location_heading'] = $request->input('location_heading');
        $data['location_subheading'] = $request->input('location_subheading');
        $data['location_total'] = $request->input('location_total');
        $data['location_status'] = $request->input('location_status');

        $slide_data=Slide::where('id',1)->first();
        
        if ($request->hasFile('slide1')) {
            $image=$request->file('slide1');
            $imgname=$request->file('slide1')->getClientOriginalName();
            $destinationpath=public_path('uploads/sliders/');
            $image->move($destinationpath,$imgname);
            $slide_data->slide1=$imgname;
            
            }
            if ($request->hasFile('slide2')) {
                $image=$request->file('slide2');
                $imgname=$request->file('slide2')->getClientOriginalName();
                $destinationpath=public_path('uploads/sliders/');
                $image->move($destinationpath,$imgname);
                $slide_data->slide2=$imgname;
                }
                if ($request->hasFile('slide3')) {
                    $image=$request->file('slide3');
                    $imgname=$request->file('slide3')->getClientOriginalName();
                    $destinationpath=public_path('uploads/sliders/');
                    $image->move($destinationpath,$imgname);
                    $slide_data->slide3=$imgname;
                    }
                    if ($request->hasFile('slide4')) {
                        $image=$request->file('slide4');
                        $imgname=$request->file('slide4')->getClientOriginalName();
                        $destinationpath=public_path('uploads/sliders/');
                        $image->move($destinationpath,$imgname);
                        $slide_data->slide4=$imgname;
                        }
                        if ($request->hasFile('slide5')) {
                            $image=$request->file('slide5');
                            $imgname=$request->file('slide5')->getClientOriginalName();
                            $destinationpath=public_path('uploads/sliders/');
                            $image->move($destinationpath,$imgname);
                            $slide_data->slide5=$imgname;
                            }
                            $slide_data->save();

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }

}
