@props([
        'images' => []
 ])

@if(count($images) > 0)
    <div x-data="{}" class="px-2">
        <div class="flex justify-center -mx-2">
            @foreach($images as $image)
                <div class="bg-gray-500">
                    <a x-on:click="$dispatch('img-modal',{ imgModalSrc:'{{ asset('storage/images/' . $image->name)  }}' })" class="cursor-pointer">
                        <img alt="{{ $image->name  }}" class="object-fit w-full" src="{{ asset('storage/images/' . $image->name) }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endif

@once
    <div x-data="{ imgModal : false, imgModalSrc : '' }">
        <div
        x-on:img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc;"
        x-cloak
        x-show="imgModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform"
        x-transition:enter-end="opacity-100 transform"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform"
        x-transition:leave-end="opacity-0 transform"
        x-on:click.away = "imgModalSrc= ''"
        class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center bg-black bg-opacity-75"
        >
            <div x-on:click.away="imgModal" class="flex flex-col max-w-3xl max-h-full overflow-auto">
                <div class="z-50">
                    <button x-on:="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                        </svg>
                    </button>
                </div>
                <div class="p-2">
                    <img
                        class="object-contain h-1/2-screen"
                        :alt="imgModalSrc"
                        :src="imgModalSrc"
                    >
                </div>
            </div>

        </div>
    </div>
    @push('css')
        <style>
            [x-cloak] {display: none !important;}
        </style>
    @endpush
@endonce
