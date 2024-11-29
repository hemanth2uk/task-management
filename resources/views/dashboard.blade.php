@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <a href="{{ route('tasks.index') }}">Manage Tasks</a>
@endsection