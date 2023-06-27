@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Post ID - {{$post->id}}</h4>
                    <div class="card-header-form">
                        <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table ">
                            <tr>
                                <th>Title UZ</th><td>{{$post->title_uz}}</td>
                            </tr>
                            <tr>
                                <th>Title RU</th><td>{{$post->title_ru}}</td>
                            </tr>
                            <tr>
                                <th>Body UZ</th><td>{!! $post->body_uz !!}</td>
                            </tr>
                            <tr>
                                <th>Body RU</th><td>{!! $post->body_ru !!}</td>
                            </tr>
                            <tr>
                                <th>Category</th><td>{!! $post->category->name_uz !!}</td>
                            </tr>
                            <tr>
                                <th>View</th><td>{{ $post->view }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th><td>@foreach($post->tags as $tag)
                                        {{$tag->name_uz}},
                                @endforeach</td>
                            </tr>
                            <tr>
                                <th>Image</th><td><img src="/site/images/posts/{{$post->image}}" alt="rasm" width="150"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                {{--                <div class="card-footer text-right">--}}
                {{--                    <nav class="d-inline-block">--}}
                {{--                        {{$categories->links()}}--}}
                {{--                    </nav>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

@endsection

