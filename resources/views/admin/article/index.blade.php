@extends('admin.laytout')

@section('content')
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf">
            {{$title}}
        </div>
    </div>

    <hr>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a href="{{route('admin.article.create')}}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
                </div>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>
                <tr>
                    <th class="table-title">标题</th>
                    <th class="table-type">排序</th>
                    <th class="table-type">允许评论</th>
                    <th class="table-type">状态</th>
                    <th class="table-author am-hide-sm-only">创建日期</th>
                    <th class="table-date am-hide-sm-only">修改日期</th>
                    <th class="table-set">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td><a href="{{route('admin.article.edit', ['article'=> $article->id])}}">{{$article->title}}</a></td>
                        <td>{{$article->order}}</td>
                        <td>
                            @if($article->isAllowCommet == 1)
                                <span class="am-text-secondary">是</span>
                            @else
                                <span class="am-text-danger">否</span>
                            @endif
                        </td>
                        <td>
                            @if($article->status == 1)
                                <span class="am-text-secondary">已发布</span>
                            @else
                                <span class="am-text-danger">草稿</span>
                            @endif
                        </td>
                        <td class="am-hide-sm-only">{{$article->created_at}}</td>
                        <td class="am-hide-sm-only">{{$article->updated_at}}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    {{--<a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="{{route('admin.cate.edit', ['cate'=> $cate->id])}}">--}}
                                    {{--<span class="am-icon-pencil-square-o"></span> 编辑--}}
                                    {{--</a>--}}
                                    <form action="{{route('admin.article.destroy', ['article' => $article->id ])}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span
                                                    class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="am-cf">
                共 {{$articles->total()}} 条记录
                <div class="am-fr">
                    {!! $articles->render(new \App\AmazeuiThreePresenter($articles)) !!}
                </div>
            </div>
        </div>
    </div>
@endsection