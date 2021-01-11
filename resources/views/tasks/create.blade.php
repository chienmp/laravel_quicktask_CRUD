@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/users.js')}}"></script>

<body>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 style="text-align: center">{{trans('task')}}</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif
            <form method="post">
                @csrf
                <div class="form-group">

                    <label for="name"> Name:</label>
                    <input type="text" class="form-control" name="name"  />
                </div>

                <div class="form-group" >
                    <label>User</label>
                    <select required name="id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">{{trans('add')}}</button>
                <a href="{{route('index')}}" class="btn btn-info">Back</a>
            </form>
        </div>
    </div>
</body>
@endsection
