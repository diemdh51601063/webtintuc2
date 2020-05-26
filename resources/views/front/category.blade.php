@extends('front.layout')



@section('content')



@endsection


@section('content2')
<div>
@foreach($data as $key => $value)
@if($value->trangthai==0)
    continue;
@endif
<div class="card mb-3" style="max-width: 720px; border-bottom: 0px;border-right: 0px; border-left: 0px;">
  <div class="row no-gutters">
    <div class="col-md-4">
     <a href="{{$value->tieudeseo}}-post{{$value->id}}.html"> <img  style="width: 240px;height: 223px;" src="upload/tintuc/{{$value->hinhdaidien}}" class="card-img" alt="{{$value->mota}}"></a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="{{$value->tieudeseo}}-post{{$value->id}}.html">{{$value->tieude}}</a></h5>
        <p class="card-text"><a style="color: black;" href="{{$value->loaitin->loaitinseo}}.html">{{$value->loaitin->tenloaitin}}</a></p>
        <p class="card-text"><small class="text-muted">{{$value->ngaydangtin}}</small></p>
      <!--  <p class="card-text">28-04-2020 06:25:29</p>-->
      </div>
    </div>
  </div>
</div>
@endforeach
</div>


@endsection