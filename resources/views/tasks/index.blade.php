@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-12 px-4">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Tasks</h1>

        <div class="mb-6 text-center">
            <a href="{{ route('tasks.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Task
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <ul class="space-y-4">
                @foreach ($tasks as $task)
                    <li class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-lg font-medium text-gray-800">{{ $task->title }} - <span class="text-sm text-gray-600">{{ $task->status }}</span></span>

                        <div class="flex items-center space-x-4">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-700">Edit</a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
