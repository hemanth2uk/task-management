@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-12 px-4">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Task Title</label>
                <input type="text" name="title" id="title" placeholder="Task Title" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Task Description</label>
                <textarea name="description" id="description" placeholder="Task Description" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Due Date</label>
                <input type="datetime-local" name="due_date" id="due_date" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Assign User</label>
                <select name="user_id" id="user_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Create Task
                </button>
            </div>
        </form>
    </div>
@endsection
