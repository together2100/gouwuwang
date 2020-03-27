@extends('admin.layout.index')

@section('content')

  <div class="col-md-12"> 
   <!-- Advanced Tables --> 
   <div class="panel panel-default"> 
    <div class="panel-heading">
      <h3>订单列表</h3> 
    </div> 
    <div class="panel-body"> 
     <div class="table-responsive"> 
      <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"> 
       <div class="row" style="margin: 0;">

        
        </div> 
        
       </div> 
       <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info"> 
        <thead> 
         <tr role="row"> 
          <th class="sorting_asc">ID</th>
          <th class="sorting_asc">订单号</th>
          <th class="sorting_asc">用户名</th>
          <th class="sorting_asc">商品名</th>
          <th class="sorting_asc">商品数量</th>
          <th class="sorting_asc">商品总价</th>
          <th class="sorting_asc">用户地址</th>
          <th class="sorting_asc">订单状态</th>
          <th class="sorting_asc">订单创建时间</th>
          <th class="sorting_asc">订单修改时间</th>
          <th class="sorting_asc">操作</th>
         </tr> 
        </thead> 
        <tbody> 
         <tr class="gradeA odd"> 
          <td class="sorting_1">{{ $data['id']}}</td> 
          <td class="sorting_1">{{ $data['order_num'] }}</td> 
          <td class="sorting_1">{{ $data['user_id'] }}</td> 
          <td class="sorting_1">{{ $data['shop_id'] }}</td> 
          <td class="sorting_1">{{ $data['num'] }}</td> 
          <td class="sorting_1">￥{{ $data['total'] }}</td> 
          <td class="sorting_1">{{ $data['address_id'] }}</td> 
          <td class="sorting_1">
            <form action="/orders/{{ $data['id'] }}" method="post">
            <select name="status">
              <option value="0" {{ $data['status'] == 0 ? 'selected':'' }}>未付款</option>
              <option value="1" {{ $data['status'] == 1 ? 'selected':'' }}>已付款</option>
              <option value="2" {{ $data['status'] == 2 ? 'selected':'' }}>未发货</option>
              <option value="3" {{ $data['status'] == 3 ? 'selected':'' }}>已发货</option>
              <option value="4" {{ $data['status'] == 4 ? 'selected':'' }}>未收货</option>
              <option value="5" {{ $data['status'] == 5 ? 'selected':'' }}>已收货</option>
              <option value="6" {{ $data['status'] == 6 ? 'selected':'' }}>交易完成</option>
            </select>
          </td> 
          <td class="sorting_1">{{ $data['created_at'] }}</td> 
          <td class="sorting_1">{{ $data['updated_at'] }}</td> 
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <td>
            <button>提交</button>
          </td>
          </form>
         </tr> 
        </tbody> 
       </table>
       </div>
      </div> 
     </div> 
    </div> 
   </div> 
   <!--End Advanced Tables --> 
  </div>
@endsection