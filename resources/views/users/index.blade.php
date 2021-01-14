@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/users.js') }}"></script>

<body>
    <div class="container">
        <h2>{{ trans('user_table') }}</h2><br><br><br>
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">{{ trans('name') }}</th>
                    <th scope="col">{{ trans('date') }}</th>
                    <th scope="col">{{ trans('email') }}</th>
                    <th scope="col">{{ trans('action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">{{ trans('edit') }}</a>
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return ConfirmDelete()"
                                    class="btn btn-danger">{{ trans('delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
