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
                    <h4>Tags</h4>
                    <div class="card-header-form">
                        <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name (UZ)</th>
                                <th>Name (RU)</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$tag->name_uz}}</td>
                                    <td>{{$tag->name_ru}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td>
                                        <a href="{{route('admin.tags.edit',$tag->id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('admin.tags.destroy',$tag->id)}}" method="POST">
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
                {{--                <div class="card-footer text-right">--}}
                {{--                    <nav class="d-inline-block">--}}
                {{--                        {{$categories->links()}}--}}
                {{--                    </nav>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/admin/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/assets/js/page/datatables.js"></script>
@endsection
