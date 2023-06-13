<?php

use App\expensedetail;

 function testt(){
	return 'testrr';
}

function totalexpense($id){

     $cost = expensedetail::where('site_id',$id)->get();
     $totalsum = 0;
     foreach($cost as $sot){
         $totalsum += $sot->price*$sot->send_on_site;
     }
     return $totalsum;

} 
?>