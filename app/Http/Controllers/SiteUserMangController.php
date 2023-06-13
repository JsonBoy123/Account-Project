<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemqtynew;
use App\siteuser;
use App\Acco_Qty_Used;
use Illuminate\Support\Facades\Auth;

class SiteUserMangController extends Controller
{
    
    public function __construct() 
        {
          $this->middleware('auth');
        }

    public function iqsupdate(Request $request){
        if($request->user != ''){
            $user = $request->user;
        }else{
            $user = $request->old_user;
        }
      $siteuser = siteuser::where(['user_id'=> $user,'site_id'=>$request->site_id])->first();
        if($siteuser != null){
              $resid = $siteuser->id;
        }
          
        if($siteuser == null){
           $store = New siteuser;
           $store->user_id = $user;
           $store->site_id = $request->site_id;
           $store->user_status = 'active';
           $store->from_date = date('Y-m-d');
           $store->pervious_user = Auth::user()->id;
           $store->save();

          $resid = 0;
           siteuser::where(['user_id'=> $request->old_user,'site_id'=>$request->site_id])->update(['user_status' => 'deactive']);

        }
        // return $resid;

        $count = count($request->item);
        for($i=0;$i<$count;$i++){
         itemqtynew::where(['site_id' => $request->site_id,'item_number' => $request->item[$i],'wareh_id' => $request->wareh_id[$i]])->decrement('quantity' ,$request->quantity[
                $i]);
           $austore = New Acco_Qty_Used;
           $austore->item_number = $request->item[$i];
           $austore->site_id = $request->site_id;
           $austore->actual_qty = $request->quantityy[$i];
           $austore->used_qty = $request->quantity[$i];
           $austore->ref_id = $resid;   
           $austore->save();

        }
        
       return redirect()->back()->with('mgs','Updated Successfully');
    }
}
