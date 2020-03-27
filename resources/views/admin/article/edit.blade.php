@extends('admin.layout.index')

@section('content')
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-title">
                <div class="title">修改公告</div>
            </div>
        </div>
        <div class="panel-body">
            <form action="/article/{{ $data['id']}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
                <div class="form-group">
                    <label>标题</label>
                    <input type="text" class="form-control" name="title"value="{{ $data['title'] }}">
                </div>
                <div class="form-group">
                    <label >作者</label>
                    <input type="text" class="form-control" name="editor" value="{{ $data['editor'] }}">
                </div>
                <div class="form-group">
                    <label>图片</label>
                    <img src="{{ $data['thumb'] }}" alt="" width="100px">
                    <input type="file" class="form-control" name="thumb" >
                    <input type="hidden" class="form-control" name="old_thumb" value="{{ $data['thumb'] }}" >
                </div>
                <div class="form-group">
                    <label>描述</label>
                    <script id="editor" type="text/plain" name="descr" style="width:800px;height:500px;">
                    {!!$data['descr']!!}</script>
                </div>

                <button type="submit" class="btn btn-default">修改</button>
                <button type="submit" class="btn btn-default">返回</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('ajax')
<script type="text/javascript">
// 实例化编辑器
// 建议使用工厂方法getEditor创建和引用编辑器实例,如果在某个闭包下引用该编辑器,直接
// 调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');
</script>
@endsection