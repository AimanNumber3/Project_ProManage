@extends('layouts.app')

@section('content')
<h2>Project List</h2>
<ul>
    @foreach($projects as $project)
        <li>{{ $project->title }}</li>
    @endforeach
</ul>
@endsection
