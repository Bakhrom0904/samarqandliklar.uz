@extends('layouts.admin')

@section('title')

    Create Category

@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Category ID {{$category->id}}</h4>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>ID</th><td>{{$category->id}}</td>
                                </tr>
                                <tr>
                                    <th>Name Uz</th><td>{{$category->name_uz}}</td>
                                </tr>
                                <tr>
                                    <th>Name Ru</th><td>{{$category->name_ru}}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th><td>{{$category->slug}}</td>
                                </tr>
                                <tr>
                                    <th>Craeated_at</th><td>{{date("d-m-Y H:i", strtotime($category->created_at))}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
