@extends('admin.layout.index')

@section('content')
<div class="col-xs-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-title">
                <div class="title">添加角色</div>
            </div>
        </div>
        <div class="panel-body">
            <form action="/adminrole" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="">角色名称</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <button type="submit" class="btn btn-default">添加</button>
                <button type="submit" class="btn btn-default">返回</button>
            </form>
        </div>
    </div>
</div>
@endsection