@extends('admin.layout.index')

@section('content')
<div class="col-xs-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-title">
                <div class="title">添加权限</div>
            </div>
        </div>
        <div class="panel-body">
            <form action="/adminnode/{{ $data['id'] }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT')  }}
                <div class="form-group">
                    <label for="">权限名字</label>
                    <input type="text" class="form-control" name="name" value="{{ $data['name'] }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">控制器</label>
                    <input type="text" class="form-control" name="mname" value="{{ $data['mname'] }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">方法名</label>
                    <input type="text" class="form-control" name="aname" value="{{ $data['aname'] }}">
                </div>

                <button type="submit" class="btn btn-default">修改</button>
                <button type="submit" class="btn btn-default">返回</button>
            </form>
        </div>
    </div>
</div>
@endsection