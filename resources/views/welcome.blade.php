
@extends('layouts.app')

@section('content')

<div class="container">
    @if (Auth::check())
        <h2>Tasks List</h2>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <a href="/task" class="btn btn-primary">Add New Task</a>
        <table class="table">
            <thead>
                <tr>
                    <th colspan='2'>Tasks</th>
                </tr>
            </thead>

            <tbody>
                @foreach($user->tasks as $task)
                <tr>
                    <td>
                        {{$task->description}}
                    </td>
                    <td>
                        <form action="/task/{{$task->id}}">
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                            <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                            {{csrf_field()}}
                        </form>
                        <button class="btn btn-danger deleteAjax" data-id="{{ $task->id }}">Ajax Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>You need to login in.<a href="/login">Click here to login</a></h3>
    @endif
</div>
@endsection
