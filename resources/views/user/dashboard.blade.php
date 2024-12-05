@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <div class="container mx-auto mt-12 px-4">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">User Dashboard</h1>

        @if(session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Title</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Description</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Due Date</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $task->title }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $task->description }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $task->status }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $task->due_date }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <form action="{{ route('tasks.update', $task) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="flex space-x-2">
                                        <select name="status" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        <button type="submit" class="py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Status</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
