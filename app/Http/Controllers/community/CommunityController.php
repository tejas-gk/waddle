<?php

namespace App\Http\Controllers\community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Community;
class communityController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewCommunity(Request $request)
    {
        $community = DB::table('communities')->insert([
            'community_name' => $request->name,
            'community_description' => $request->description,
            'summary' => $request->summary,
            'community_image' => $request->community_image,
            'community_banner'=>$request->banner,
            'admin_id' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if($request->hasFile('community_image')){
            $image=$request->file('community_image');
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/storage/community_image'),$image_name);
            $image_path=public_path('images/'.$image_name);
            $community=DB::table('communities')->where('community_image',$request->community_image);
            // $image->save();
        }

        return redirect()->back()->with('success','Community Created Successfully');
    }
    public function community()
    {
        $communities = DB::table('communities')->get();
        return view('community.community-page.community-home-page', compact('communities'));
    }
}
