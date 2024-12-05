@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-12 px-4">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Task Status</label>
                <select name="status" id="status" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Task
                </button>
            </div>
        </form>
    </div>
@endsection
