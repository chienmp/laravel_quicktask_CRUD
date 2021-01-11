@extends('layouts.app')
@section('title', 'Update')
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 style="text-align: center">{{trans('user_update')}}</h1>

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
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name" value={{ $user->name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $user->email }} />
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{route('users.index')}}" class="btn btn-info">Back</a>
        </form>
    </div>
</div>
@endsection
