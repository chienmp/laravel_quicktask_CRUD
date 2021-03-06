@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/users.js') }}"></script>

<body>
    <div class="container">
        <h2>{{ trans('task_table') }}</h2><br><br><br>
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <a href="{{ route('add') }}" class="btn btn-success">{{ trans('add') }}</a><br><br>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">{{ trans('name') }}</th>
                    <th scope="col">{{ trans('date') }}</th>
                    <th scope="col">{{ trans('job') }}</th>
                    <th scope="col">{{ trans('action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->user->name }}</td>
                        <td>
                            <a href="{{ route('edit', $task->id) }}" class="btn btn-info">{{ trans('edit') }}</a>
                            <a href="{{ route('delete', $task->id) }}" onclick="return ConfirmDelete()"
                                class="btn btn-danger">{{ trans('delete') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
