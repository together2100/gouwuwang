@extends('admin.layout.index')

@section('content')
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-title">
                <div class="title">添加商品</div>
            </div>
        </div>
        <div class="panel-body">
            <form action="/shops" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>商品名称</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label >类别</label>
                    <select name="cate_id" class="form-control">
                        <option> -- 请选择 --</option>
                        @foreach($cate as $k => $v)
                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>图片</label>
                    <input type="file" name="pic">
                </div>
                <div class="form-group">
                    <label>描述</label>
                    <textarea name="descr" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label>价格</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label>数量</label>
                    <input type="text" class="form-control" name="num">
                </div>

                <button type="submit" class="btn btn-default">添加</button>
                <button type="submit" class="btn btn-default">返回</button>
            </form>
        </div>
    </div>
</div>
@endsection
