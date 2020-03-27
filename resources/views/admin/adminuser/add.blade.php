@extends('admin.layout.index')

@section('content')
<div class="col-xs-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-title">
                <div class="title">添加管理员</div>
            </div>
        </div>
        <div class="panel-body">
            <form action="/adminuser" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="">管理员</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-default">添加</button>
                <button type="submit" class="btn btn-default">返回</button>
            </form>
        </div>
    </div>
</div>
@endsection