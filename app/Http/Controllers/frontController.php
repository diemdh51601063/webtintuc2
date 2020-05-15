<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\tin;
use App\nhomtin;
use App\loaitin;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{
    public function getfront()
    {
        $data=tin::where('trangthai', 1)->orderBy('ngaydangtin', 'desc')->take(20)->get();

    	return view('front/index',['data'=>$data]);
    }
    public function getcategory($search)
    {

        $data=DB::table('nhomtin')->where('nhomtinseo', '=', $search)->get();
        if(count($data)!=0)
    {
        $datant=nhomtin::where('nhomtinseo',$search)->get('id');
        $datatin=nhomtin::find($datant)[0]->tin;
    }
        else
        {
         $datalt=loaitin::where('loaitinseo',$search)->get();
         $datatin=$datalt[0]->tin;
        }
                         
    	return view('front/category',['data'=>$datatin]);

    }
    public function getdetail($seo,$search)
    { 
        $seo=substr($seo, 0, -1);
        $tin=tin::find($search);

        if($tin->tieudeseo!=$seo)
            return redirect($tin->tieudeseo.'-post'.$search.'.html');
        
    /*   echo "<br>";
        echo $tin->tieudeseo;
        echo "<br>";
        echo $seo;
         echo "<br>";
         echo $search;*/

    	return view('front/detail',['tin'=>$tin]);
    }
    public function getsearch($search)
    {




    	return view('front/search');



    }
}
