@extends('layouts.admin')

@section('title')

    Create Post

@endsection
@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Create Post</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title (UZ)</label>
                            <input type="text" name="title_uz" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Title (RU)</label>
                            <input type="text" name="title_ru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Body (UZ)</label>
                            <textarea name="body_uz" class="form-control ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Body (RU)</label>
                            <textarea name="body_ru" class="form-control ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select id="" class="form-control" name="category_id">
                                <option >Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name_uz}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select id="" class="form-control select2" name="tags[]" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name_uz}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="control-label">is Special ?</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="is_special" value="1" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
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
@section('js')
{{--    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>--}}
        <script src="/admin/assets/ckeditor/ckeditor.js"></script>
    <script>
        $('.ckeditor').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
<script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection
