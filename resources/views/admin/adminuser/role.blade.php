@extends('admin.layout.index')

@section('content')

  <div class="col-xs-12"> 
   <div class="panel panel-default"> 
    <div class="panel-heading"> 
     <div class="card-title"> 
      <div class="title">
       角色信息
      </div> 
     </div> 
    </div> 
    <div class="panel-body"> 
    <center>
        <h4>当前用户{{ $user->name }}的角色信息</h4>
   
     <form class="form-horizontal" action="/saverole" method="post"> 
        {{ csrf_field() }}
        <input type="hidden" name="uid" value="{{ $user->id }}" >
      <div class="form-group"> 
       <div class="col-sm-10"> 
        <div class="checkbox3 checkbox-round checkbox-check checkbox-light"> 
            @foreach($role as $key => $value )
         <input type="checkbox" id="checkbox-10" name="rids[]" value="{{ $value->id }}"
         @if(in_array($value->id,$rids)) checked @endif /> 
         <label for="checkbox-10">{{ $value->name }}</label> 
            @endforeach
        </div> 
      </div> 
     
      <div class="form-group"> 
       <div class="col-sm-offset-2 col-sm-10"> 
        <button type="submit" class="btn btn-info">分配角色</button> 
        <button type="submit" class="btn btn-default">返回</button> 
       </div> 
      </div> 
     </form> 
     </center>
    </div> 
   </div> 
  </div>
@endsection