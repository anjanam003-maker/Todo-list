<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('My ToDo') }}
                </h2>
                <p class="text-sm text-gray-500">
                    @php
                        $label = match($status ?? 'all') {
                            'pending' => 'Pending',
                            'completed' => 'Completed',
                            default => 'All Tasks',
                        };
                    @endphp
                    {{ $label }}
                </p>
            </div>

            <div class="text-sm text-gray-600">
                {{ now()->format('l, d M') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <aside class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="font-semibold text-gray-800 mb-4">{{ __('My Lists') }}</h3>

                            <div class="space-y-1">
                                <a class="block px-3 py-2 rounded-md text-sm {{ ($status ?? 'all') === 'all' ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50' }}"
                                   href="{{ route('dashboard') }}">
                                    {{ __('All Tasks') }}
                                </a>
                                <a class="block px-3 py-2 rounded-md text-sm {{ ($status ?? 'all') === 'pending' ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50' }}"
                                   href="{{ route('dashboard', ['status' => 'pending']) }}">
                                    {{ __('Pending') }}
                                </a>
                                <a class="block px-3 py-2 rounded-md text-sm {{ ($status ?? 'all') === 'completed' ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50' }}"
                                   href="{{ route('dashboard', ['status' => 'completed']) }}">
                                    {{ __('Completed') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

                <section class="lg:col-span-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <form method="POST" action="{{ route('tasks.store') }}" class="flex flex-col sm:flex-row gap-3">
                                @csrf
                                <input
                                    type="text"
                                    name="task"
                                    placeholder="Add a task"
                                    required
                                    maxlength="255"
                                    class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                />
                                <x-primary-button type="submit">
                                    {{ __('Add') }}
                                </x-primary-button>
                            </form>

                            @error('task')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror

                            <div class="mt-6 space-y-3">
                                @forelse (($tasks ?? []) as $task)
                                    <div class="flex items-center justify-between gap-4 rounded-md bg-gray-50 px-4 py-3">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <form method="POST" action="{{ route('tasks.toggle', $task) }}">
                                                @csrf
                                                @method('PATCH')
                                                <input
                                                    type="checkbox"
                                                    onchange="this.form.submit()"
                                                    {{ $task->status === 'completed' ? 'checked' : '' }}
                                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                />
                                            </form>

                                            <div class="min-w-0">
                                                <div class="truncate {{ $task->status === 'completed' ? 'line-through text-gray-500' : 'text-gray-900' }}">
                                                    {{ $task->task }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ ucfirst($task->status) }}
                                                </div>
                                            </div>
                                        </div>

                                        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                @empty
                                    <div class="text-sm text-gray-600">
                                        {{ __('No tasks yet. Add one above!') }}
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
