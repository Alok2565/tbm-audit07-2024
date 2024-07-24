<?php

namespace App\Http\Controllers\admin;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\admin\HomeBanner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeBannerController extends Controller
{
    public function viewBanner()
    {
		if(empty(Session::get('email')) || Session::get('email') == '1') {
          return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
		}
	  
        $bannersData = HomeBanner::all();
        return view('admin.banner.view', compact('bannersData'));
    }
    public function addBanner()
    {  
		if(empty(Session::get('email')) || Session::get('email') == '1') {
          return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
		}
		
        return view('admin.banner.add');
    }

    public function createBanner(Request $request)
    {
		if(empty(Session::get('email')) || Session::get('email') == '1') {
          return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
		}
		
        $request->validate([
            'slug' => 'required|unique:home_banners,slug',
            'image' => 'required|mimes:jpeg,png,jpg'
        ]);
        $res_banner = new HomeBanner();
        $res_banner->name = $request->input('name');
        $res_banner->slug = $request->input('slug');
        $res_banner->banner_link = $request->input('banner_link');
        $res_banner->desc = $request->input('desc');

        if ($request->hasfile("image")) {
            if (Storage::exists("/public/media/banner/slider/" . $res_banner->image)) {
                Storage::delete("/public/media/banner/slider/" . $res_banner->image);
            }
            $file = $request->file("image");
            $extFile = $file->extension();
            $file_name = time() . "." . $extFile;
            $file->storeAs("/public/media/banner/slider", $file_name);
            $res_banner->image = $file_name;
        }
        $res_banner->status = '1';
        $res_banner->save();
        session::flash('success', 'Slider has been added successfully');
        return redirect('admin/home-banner');
    }

    public function editBanner(Request $request, $id)
    {   
		if(empty(Session::get('email')) || Session::get('email') == '1') {
          return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
		}
		
        $edit_banner = HomeBanner::find($id);
        return view('admin.banner.update', compact('edit_banner'));
    }
    public function updateBanner(Request $request, $id)
    {  
		if(empty(Session::get('email')) || Session::get('email') == '1') {
          return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
		}
		
        $update_banner = HomeBanner::findOrFail($id);
        //dd($update_banner);
        $update_banner->name = $request->input('name');
        $update_banner->slug = $request->input('slug');
        $update_banner->desc = $request->input('desc');

        if ($request->hasFile('image')) {
            if (Storage::exists("/public/media/banner/slider/" . $update_banner->image)) {
                Storage::delete("/public/media/banner/slider/" . $update_banner->image);
            }
            $file = $request->file('image');
            $extFile = $file->extension();
            $fileName = time() . '.' . $extFile;
            $file->storeAs("/public/media/banner/slider", $fileName);
            $update_banner->image = $fileName;
        }
        $update_banner->save();
        return redirect('admin/home-banner')->with('success', 'Banner updated successfully!');
    }
    public function status(Request $request, $id)
    {    
	if(empty(Session::get('email')) || Session::get('email') == '1') {
          return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
		}
		
        try {
            DB::table('home_banners')
                ->where('id', $id)
                ->update(['status' => DB::raw('NOT status')]);
            Session::flash('success', 'Banner status updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update status. Please try again.']);
            return redirect()->back();
        }
        return redirect('admin/home-banner');
    }

    public function destroy(Request $request, $id)
    {	
		if(empty(Session::get('email')) || Session::get('email') == '1') {
          return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
		}
		
        try {
            $homeBanner = HomeBanner::findOrFail($id);
            $homeBanner->delete();
            Session::flash('success', 'Record deleted successfully!');
        } catch (ModelNotFoundException $e) {
            Session::flash('error', 'Record not found.');
            return redirect()->back();
        }
        return redirect('admin/home-banner');
    }
}
