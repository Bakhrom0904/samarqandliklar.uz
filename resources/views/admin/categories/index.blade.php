@extends('layouts.admin')

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
                    <h4>Categories</h4>
                    <div class="card-header-form">
                        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Add</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name_uz}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td><a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-info">Update</a></td>
                                    <td><a href="{{route('admin.categories.show',$category->id)}}" class="btn btn-info">View</a></td>
                                    <td>
                                        <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Confirm delete')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody></table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                       {{$categories->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
