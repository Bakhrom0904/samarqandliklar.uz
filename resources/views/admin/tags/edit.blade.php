@extends('layouts.admin')

@section('title')

    Edit Tag

@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('admin.tags.update',$tag->id)}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Tag</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name (UZ)</label>
                            <input type="text" name="name_uz" value="{{$tag->name_uz}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Name (RU)</label>
                            <input type="text" name="name_ru"  value="{{$tag->name_ru}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{$tag->slug}}" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

