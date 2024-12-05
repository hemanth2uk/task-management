@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mx-auto mt-12">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Admin Dashboard</h1>

        <a href="{{ route('tasks.create') }}" class="btn btn-lg bg-green-500 text-white py-2 px-4 rounded-lg mb-4 flex items-center">
            <i class="bi bi-plus-circle mr-2"></i> Create New Task
        </a>

        @if(session('success'))
            <div class="alert alert-success bg-green-100 text-green-700 border-l-4 border-green-500 p-4 mb-4 rounded-md">
                {{ session('success') }}
                <button type="button" class="text-green-700 hover:text-green-900 ml-4" data-bs-dismiss="alert" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
        @endif

        <div class="overflow-x-auto shadow-lg rounded-lg bg-white">
            <table class="min-w-full table-auto text-left">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Due Date</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $task->title }}</td>
                            <td class="px-4 py-2">{{ Str::limit($task->description, 50) }}</td>
                            <td class="px-4 py-2 text-center">
                                <span class="inline-block px-3 py-1 rounded-full text-white
                                    {{ $task->status == 'Pending' ? 'bg-yellow-400' : '' }}
                                    {{ $task->status == 'In Progress' ? 'bg-blue-500' : '' }}
                                    {{ $task->status == 'Completed' ? 'bg-green-500' : '' }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</td>
                            <td class="px-4 py-2 flex justify-center gap-2">
                                <form action="{{ route('tasks.update', $task) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm px-2 py-1 border rounded">
                                        <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm bg-blue-500 text-white py-1 px-3 rounded-md mt-2">Update</button>
                                </form>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm bg-red-500 text-white py-1 px-3 rounded-md mt-2">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
