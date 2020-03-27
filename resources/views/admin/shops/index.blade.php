@extends('admin.layout.index')

@section('content')

  <div class="col-md-12"> 
   <!-- Advanced Tables --> 
   <div class="panel panel-default"> 
    <div class="panel-heading">
      <h3>商品列表</h3> 
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
        <form action="/adminuser" method="get">
        <div class="col-sm-6"> 
         <div id="dataTables-example_filter" class="dataTables_filter"> 
          <input type="text" name="keywords" class="form-control input-sm" aria-controls="dataTables-example"
          value=""/>
          <button class="btn btn-info">搜索</button> 
         </div> 
        </div> 
        </form>
       </div> 
       <table class="table table-striped table-bordered table-hover dataTable no-footer"
        id="dataTables-example" aria-describedby="dataTables-example_info"> 
        <thead> 
         <tr role="row"> 
          <th class="sorting_asc">操作</th>
          <th class="sorting_asc">ID</th>
          <th class="sorting_asc">商品名称</th>
          <th class="sorting_asc">商品类别</th>
          <th class="sorting_asc">商品图片</th>
          <th class="sorting_asc">描述内容</th>
          <th class="sorting_asc">数量</th>
          <th class="sorting_asc">价格</th>
          <th class="sorting_asc">操作</th>
         </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $row)
         <tr class="gradeA odd"> 
          <td class="sorting_1"><input type="checkbox" name="bulletin" value="{{ $row['id'] }}"></td> 
          <td class="sorting_1">{{ $row['id'] }}</td>
          <td class="sorting_1">{{ $row['name'] }}</td> 
          <td class="sorting_1">{{ $row['cate_id'] }}</td> 
          <td class="sorting_1"><img src="{{ $row['pic'] }}" width="100px" alt=""></td> 
          <td class="sorting_1">{!!$row['descr']!!}</td> 
          <td class="sorting_1">{{ $row['num'] }}</td> 
          <td class="sorting_1">{{ $row['price'] }}</td> 
          <td class="sorting_1">
               <form action="/shops/{{ $row['id'] }}" method="post" style="display:inline-block;">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
                    <button class="btn btn-danger" >删除</button>
                </form>
                 <a href="/shops/{{ $row['id'] }}/edit" class="btn btn-info">修改</a>
          </td> 
         </tr> 
         @endforeach
        </tbody> 
       </table>
       <button class="btn btn-info allchoose">全选</button>
       <button class="btn btn-info nochoose">全不选</button>
       <button class="btn btn-info fchoose">反选</button>
       <a href="javascript:void(0)" class="btn btn-danger del">批量删除</a>
       <div class="row" style="margin: 0;">
        <div class="col-sm-6">
         <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">
          
         </div>
        </div>
        <div class="col-sm-6">
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

@section('ajax')
<script>
    $(".allchoose").click(function (){
        $("#dataTables-example").find("tr").each(function (){
            $(this).find(":checkbox").prop("checked",true); // 全选
        });
    });

    $(".nochoose").click(function (){
        $("#dataTables-example").find("tr").each(function (){
            $(this).find(":checkbox").prop("checked",false); // 全不选
        });
    });

    $(".fchoose").click(function (){
        $("#dataTables-example").find("tr").each(function (){
            $(this).find(":checkbox").each(function (){ // 遍历input
                if($(this).prop("checked")){
                    $(this).prop("checked",false); // 反选
                }else{
                    $(this).prop("checked",true);
                 }
            });
        });
    });

    $(".del").click(function (){
        arr = [];
        $(":checkbox").each(function (){
            if($(this).prop("checked")){
                id = $(this).val(); // 获取id
                arr.push(id); // 把id压入数组
            }
        });
        $.get('/articledel',{id:arr},function (data){
                // alert(data);
                if(data == 1){
                    alert('删除成功');
                    for(var i = 0; i < arr.length; i++){
                        $("input[value = " + arr[i] +"]").parents("tr").remove(); 
                    }
                }else{
                        alert(data);
                    }
        });
    });

</script>
@endsection