
@extends('front.layout')
@section('content')

<small class="text-muted">Tìm thấy {{$soluong}} tin</small>

<br>


@endsection
@section('content2')


@foreach($dstin as $key => $value)

<div class="card mb-3" style="max-width: 720px; border-bottom: 0px;border-right: 0px; border-left: 0px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img style="max-width: 240px;max-height: 223px;" src="upload/tintuc/{{$value->hinhdaidien}}" class="card-img" alt="$value->mota">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="{{$value->tieudeseo}}-post{{$value->id}}.html">{{$value->tieude}}</a></h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
       
        <p class="card-text">{{$value->ngaydangtin}}</p>
      </div>
    </div>
  </div>
</div>
@endforeach




@endsection

@section('script')


@endsection