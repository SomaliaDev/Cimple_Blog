@extends('admin.laytout')

@section('content')
    @include('common.errors')
    <form class="am-form" method="post" action="{{route('admin.article.update', ['article' => $article->id])}}">
        <fieldset>
            <legend>{{$title}}</legend>
            @include('admin.article.form')
            {{method_field('PUT')}}
            <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
        </fieldset>
    </form>
@endsection