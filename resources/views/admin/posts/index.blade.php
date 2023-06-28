@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-header">
                    <h4>Posts</h4>
                    <div class="card-header-form">
                        <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                            <tr>
                                <th>T/R</th>
                                <th>Title_UZ</th>
                                <th>Category</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$post->title_uz}}</td>
                                    <td>{{$post->category->name_uz}}</td>
                                    <td>
                                        <img alt="image" src="/site/images/posts/{{$post->image}}" width="35">
                                    </td>
                                    <td>
                                        <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-info">Detail</a>
                                        <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('admin.posts.destroy',$post->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Confirm delete')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{$posts->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/admin/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/assets/js/page/datatables.js"></script>
@endsection
