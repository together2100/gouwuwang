@extends('admin.layout.index')

@section('content')

  <div class="col-xs-12"> 
   <div class="panel panel-default"> 
    <div class="panel-heading"> 
     <div class="card-title"> 
      <div class="title">
       角色权限信息
      </div> 
     </div> 
    </div> 
    <div class="panel-body"> 
    <center>
        <h4>当前用户{{ $role->name }}的角色权限信息</h4>
   
     <form class="form-horizontal" action="/saveauth" method="post"> 
        {{ csrf_field() }}
        
        <input type="hidden" name="rid" value="{{ $role->id }}">
      <div class="form-group"> 
       <div class="col-sm-10"> 
        <div class="checkbox3 checkbox-round checkbox-check checkbox-light"> 
            @foreach($node as $row)
         <input type="checkbox" id="checkbox-10" name="nids[]" value="{{ $row->id }}"
         @if(in_array($row->id,$nids)) checked @endif/> 
         <label for="checkbox-10">{{ $row->name }}</label> 
            @endforeach
        </div> 
      </div> 
     
      <div class="form-group"> 
       <div class="col-sm-offset-2 col-sm-10"> 
        <button type="submit" class="btn btn-info">分配权限</button> 
        <button type="submit" class="btn btn-default">返回</button> 
       </div> 
      </div> 
     </form> 
     </center>
    </div> 
   </div> 
  </div>
@endsection