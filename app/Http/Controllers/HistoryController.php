<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job_master;
use App\PurchHistory;
use App\expensedetail;
use App\Acco_Qty_Used;
use App\JobMaster;
use PDF;

class HistoryController extends Controller
{
    

    public function index(){

        $site = job_master::with('siteeng.user')->where('deleted_at',NULL)->paginate(10);
         return view('site.index',compact('site'));
    }

    public function sitecost($id){
    
        $show = PurchHistory::with('vendor','infosite.user','infosite.manager')->where('site_id',$id)->paginate(10);
        $cost = expensedetail::with('name')->where('site_id',$id)->get();
        $currcost = Acco_Qty_Used::with('usedQuantity','expence')->where('site_id',$id)->groupBy('item_number')
                    ->selectRaw('sum(used_qty) as total, item_number')
                    ->get();
        $count = count($cost);
        $count2 = count($currcost);
          return view('site.show',compact('cost','show','count','currcost','count2','id'));

        
    }

    public function sitePdf($id){
        // return $id;

        $show = PurchHistory::with('vendor','infosite.user','infosite.manager')->where('site_id',$id)->paginate(10);
        $cost = expensedetail::with('name')->where('site_id',$id)->get();
        $currcost = Acco_Qty_Used::with('usedQuantity','expence')->where('site_id',$id)->groupBy('item_number')
                    ->selectRaw('sum(used_qty) as total, item_number')
                    ->get();
        $count = count($cost);
        $count2 = count($currcost);
        $data = JobMaster::find($id);
        //return view('site.show',compact('cost','show','count','currcost','count2','id'));
          $pdf = PDF::loadView('site.expensePdf', compact('data','show','count','cost','count2','currcost','id'));
  
        return $pdf->download('SiteDetail.pdf');

        
    }
}
