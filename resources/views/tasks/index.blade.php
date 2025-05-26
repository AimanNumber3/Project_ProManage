@extends('layouts.app')

@section('content')
<h2>Task List</h2>
<ul>
    @foreach($tasks as $task)
        <li>{{ $task->title }}</li>
    @endforeach
</ul>
@endsection
