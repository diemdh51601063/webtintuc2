<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\tin;
use App\nhomtin;
use App\loaitin;
use App\binhluan;
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

        $tin->solanxem+=1;
        $tin->save();
        if($tin->tieudeseo!=$seo)
            return redirect($tin->tieudeseo.'-post'.$search.'.html');
        
    $dsbinhluan=$tin->binhluan;

    



    	return view('front/detail',['tin'=>$tin,'dsbinhluan'=>$dsbinhluan]);
    }


    public function postdetail(Request $request,$value)
    { 
         $this->validate($request,
            [
                'comment'=>'required|min:1|max:255|',
                'name'=>'required|min:1|max:255|',
                'email'=>'required|min:1|max:255|email',
               
            ],
            [   
                
                'comment.required'=>'Bạn chưa nhập bình luận.',
                'comment.min'=>'Bình luận phải có độ dài từ 1 cho đến 255 ký tự.',
                'comment.max'=>'Bình luận phải có độ dài từ 1 cho đến 255 ký tự.',

                'name.required'=>'Bạn chưa nhập tên.',
                'name.min'=>'Tên phải có độ dài từ 1 cho đến 255 ký tự.',
                'name.max'=>'Tên luận phải có độ dài từ 1 cho đến 255 ký tự.',

                'email.required'=>'Bạn chưa nhập email.',
                'email.min'=>'Email phải có độ dài từ 1 cho đến 255 ký tự.',
                'email.max'=>'Email phải có độ dài từ 1 cho đến 255 ký tự.',                             
            ]

        );

            $binhluan = new binhluan;
            $binhluan->noidung=$request->comment;
            $binhluan->email=$request->email;
            $binhluan->ten=$request->name;
            $binhluan->id_tin=$value;
            $binhluan->save();

            $tin=tin::find($value);






      return  redirect($tin->tieudeseo.'-post'.$value.'.html')->with('thongbao','Thêm thành công.');
    }






    public function getsearch($search)
    {




    	return view('front/search');



    }

     public function gettin($tin)
     {
         


            
            echo '<div class="card mb-3" style="max-width: 720px; border-bottom: 0px;border-right: 0px; border-left: 0px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="assets/img/news/whatNews1.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        <p class="card-text">28-04-2020 06:25:29</p>
      </div>
    </div>
  </div>
</div>';

     }
}
