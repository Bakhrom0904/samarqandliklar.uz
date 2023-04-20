@extends('layouts.admin')

@section('title')

    Create User

@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('admin.users.store')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Create</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Roles</label>
                            <select name="roles[]" id="" class="form-control" multiple style="height:100px">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
