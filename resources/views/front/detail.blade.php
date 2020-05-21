@extends('front.layout')


@section('content')
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">




          @if(session('thongbao')) 
     <script type="text/javascript">
  
window.alert('Thêm thành công.')

</script>             
          @endif
            <div class="col-lg-12 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="upload\tintuc\{{$tin->hinhdaidien}}" alt="$tin->mota">
                  </div>
                  <div class="blog_details">
                     <h2>{{$tin->tieude}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4 ">
                        <li><a href="{{$tin->loaitin->loaitinseo}}.html"><i class="fa fa-user"></i>{{$tin->loaitin->tenloaitin}}</a></li>
                    
                     </ul>
                     <p class="excert"><?php echo $tin->noidung; ?></p>
                   
                  </div>
               </div>
        
               <div class="comments-area">
                  
               
                  

               
         <?php foreach ($dsbinhluan as $key => $value):
            if($value->trangthai!=1) continue;
          ?>             <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                     <div class="user justify-content-between d-flex">
                         
                           <div class="desc">
                              <p class="comment">
                                {{$value->noidung}}
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#"> {{$value->ten}}</a>
                                    </h5>
                                    <p class="date"> {{$value->thoigian}}</p>
                                 </div>
                                 <div class="reply-btn">
                                  <!--  <a href="#" class="btn-reply text-uppercase">reply</a>-->
                                 </div>
                              </div>
                           </div>
 
                  

                        </div>
                     </div>
                  </div><?php endforeach ?>
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="binhluan-{{$tin->id}}" id="commentForm" method="POST">
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                      
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                  </form>
               </div>
            </div>
           
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
                       @endsection

@section('content2')




<div id="content5">
  
</div>



@endsection

@section('script')

<script type="text/javascript">
localStorage.setItem('luu',<?php echo $tin->id; ?>);

 $(window).scroll(function() {

 
    if($(window).scrollTop()  >= ($(document).height() - $(window).height())*0.95-300) {
      /*    var list = $('p').toArray();
       var x =(list[list.length-1].innerHTML);

       window.consolog(x);*/
          $.get("tin/"+ localStorage.getItem("luu"), function(data){
    var json=JSON.parse(data);
//console.log(json);
if(json.id!=localStorage.getItem("luu"))

  {
    localStorage.setItem('luu',json.id);
//window.alert(json.id);
  //  $('#content5').append(data);
   // localStorage.setItem()
  

      t='<div class="card mb-3" style="max-width: 720px; border-bottom: 0px;border-right: 0px; border-left: 0px;">  <div class="row no-gutters">    <div class="col-md-4">      <img src="upload/tintuc/'+json.hinhdaidien+'" class="card-img" alt="">    </div>    <div class="col-md-8">      <div class="card-body">        <h5 class="card-title"><a href="'+json.tieudeseo+'-post'+json.id+'.html"> '+json.tieude+'</a></h5>        <p class="card-text"></p>              <p >'+json.ngaydangtin+'</p>      </div>    </div>  </div></div>'


$('#content5').append(t);}



  });
    }
});
</script>
  <script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

@endsection