<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

<div class="py-12 px-4">
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-4">To Do</h2>
            <div class="space-y-2">
                @foreach ($pendingTasks as $task)
                    <div wire:key={{ $task->id }} class="bg-yellow-200 p-2">
                        <p class="text-sm">{{$task->title}}</p>
                        <p class="text-xs text-gray-500">Status: Pending</p>
                        <button class="text-sm py-1 px-2 bg-blue-600 hover:bg-blue-500 text-white" wire:click="showTaskDetails({{ $task }})">Show</button>
                    </div>

                @endforeach
            </div>
        </div>

        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-4">In Progress</h2>
            <div class="space-y-2">
                @foreach ($inProgressTasks as $task)
                    <div wire:key={{ $task->id }} class="bg-blue-200 p-2">
                        <p class="text-sm">{{$task->title}}</p>
                        <p class="text-xs text-gray-500">Status: In Progress</p>
                        <button class="text-sm py-1 px-2 bg-blue-600 hover:bg-blue-500 text-white" wire:click="showTaskDetails({{ $task }})">Show</button>
                    </div>

                @endforeach
            </div>
        </div>

        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-4">Done</h2>
            <div class="space-y-2">
                @foreach ($completedTasks as $task)
                    <div wire:key={{ $task->id }} class="bg-green-200 p-2">
                        <p class="text-sm">{{$task->title}}</p>
                        <p class="text-xs text-gray-500">Status: In Progress</p>
                        <button class="text-sm py-1 px-2 bg-blue-600 hover:bg-blue-500 text-white" wire:click="showTaskDetails({{ $task }})">Show</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <x-modal name="task-modal">
        <x-slot name="title">
            Task Details
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updateTaskStatus">
                <input
                    wire:model="title"
                    type="text"
                    name="title"
                    id="title"
                    class="block w-full border-0 py-1.5 pl-2 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder=""
                >
                <button type="submit">Update</button>
            </form>
        </x-slot>

        <x-slot name="footer">

            <x-secondary-button wire:click="closeModal">Close</x-secondary-button>
        </x-slot>
    </x-modal>
</div>
