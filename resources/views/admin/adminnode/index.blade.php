@extends('admin.layout.index')

@section('content')

  <div class="col-md-12"> 
   <!-- Advanced Tables --> 
   <div class="panel panel-default"> 
    <div class="panel-heading">
      <h3>权限列表</h3> 
    </div> 
    <div class="panel-body"> 
     <div class="table-responsive"> 
      <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"> 
       <div class="row" style="margin: 0;">
        <div class="col-sm-6"> 
         <div class="dataTables_length" id="dataTables-example_length"> 
          <label><select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
               <option value="10">10</option>
                <option value="25">25</option> 
                <option value="50">50</option> 
                <option value="100">100</option> 
            </select> records per page</label> 
         </div> 
        </div> 
        <form action="/adminrole" method="get">
        <div class="col-sm-6"> 
         <div id="dataTables-example_filter" class="dataTables_filter"> 
          <input type="text" name="keywords" class="form-control input-sm" aria-controls="dataTables-example"
          value=""/>
          <button class="btn btn-info">搜索</button> 
         </div> 
        </div> 
        </form>
       </div> 
       <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info"> 
        <thead> 
         <tr role="row"> 
          <th class="sorting_asc">ID</th>
          <th class="sorting_asc">权限名称</th>
          <th class="sorting_asc">控制器名称</th>
          <th class="sorting_asc">方法名称</th>
          <th class="sorting_asc">操作</th>
         </tr> 
        </thead> 
        <tbody> 
            @foreach($node as $key => $value)
         <tr class="gradeA odd"> 
          <td class="sorting_1">{{ $value->id}}</td> 
          <td class="sorting_1">{{ $value->name}}</td> 
          <td class="sorting_1">{{ $value->mname}}</td> 
          <td class="sorting_1">{{ $value->aname}}</td> 
          <td class="sorting_1">
          <form action="/adminnoder/{{ $value->id }}" method="post" style="display:inline-block;">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
                    <button class="btn btn-danger" >删除</button>
                </form>
                <a href="/adminnode/{{ $value->id }}/edit" class="btn btn-info">修改</a>
          </td> 
         </tr> 
         @endforeach
        </tbody> 
       </table>
       <div class="row" style="margin: 0;">
        <div class="col-sm-6">
         <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">
          Showing 1 to 10 of 57 entries
         </div>
        </div>
        <div class="col-sm-6">

          {{$node->render()}}
         </div>
        </div>
       </div>
      </div> 
     </div> 
    </div> 
   </div> 
   <!--End Advanced Tables --> 
  </div>
@endsection
