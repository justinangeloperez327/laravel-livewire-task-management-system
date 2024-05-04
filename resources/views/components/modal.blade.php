@props(['name'])

<div
    x-data="{ show : false , name : '{{ $name }}' }"
    x-show="show"
    x-on:hashchange.window="show = (location.hash === '#'+name)"
    x-on:open-modal.window="($event.detail.name === name) ? (show = true, location.hash = '#'+name) : '';"
    x-on:close-modal.window="location.hash = '#'"
    x-on:keydown.escape.window="location.hash = '#'"
    style="display:none;" class="fixed z-50 inset-0" x-transition.duration>

    {{-- Gray Background --}}
    <div x-on:click="location.hash = '#'" class="fixed inset-0 bg-gray-500 opacity-40"></div>

    {{-- Modal Body --}}
    <div class="bg-gray-900 rounded mx-5 sm:mx-10 md:mx-20 lg:mx-32 xl:mx-40 2xl:mx-auto fixed inset-0 sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl max-h-full my-10 overflow-y-auto">
        @if (isset($title))
            <div class="px-4 py-3 flex items-center justify-between border-gray-300">
                <div class="text-xl text-white">{{ $title }}</div>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
        @endif
        <div class="p-4">
            {{ $content }}
        </div>
    </div>
    {{$footer}}
</div>
