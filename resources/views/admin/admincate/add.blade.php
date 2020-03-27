@extends('admin.layout.index')

@section('content')
<div class="col-xs-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-title">
                <div class="title">添加分类</div>
            </div>
        </div>
        <div class="panel-body">
            <form action="/admincate" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="">分类名称</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <select name="pid" class="form-control">
                    <option value="0">-- 请选择 --</option>
                    @foreach($cate as $key => $value)
                    <option value="{{ $value->id }}" {{ substr_count($value->path,',') >= 2 ? 'disabled' : '' }}
                    {{ $value->id == $id ? 'selected' : '' }}>
                    {{ $value->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">状态</label>
                    <select name="status" class="form-control">
                    <option value="0">-- 启用 --</option>
                    <option value="1">-- 禁用 --</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-default">添加</button>
                <button type="submit" class="btn btn-default">返回</button>
            </form>
        </div>
    </div>
</div>
@endsection