<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Community
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="mb-4 flex items-center justify-between">
                    <div class="text-center font-bold">
                        <h2>Edit Community</h2>
                    </div>

                    <a class="font-bold rounded text-xs bg-green-500 hover:bg-green-500/80 text-white p-4"
                       href="{{ route('community.index') }}">
                        Back
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="mb-4 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">{{ $message }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @php
                    $selected = $selectedTagIds ?? old('tag_id', []);
                @endphp

                <form action="{{ route('community.update', $community->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-row items-center gap-4">
                        <div class="basis-1/5">
                            <strong>Name :</strong>
                        </div>
                        <div class="basis-4/5">
                            <input
                                class="w-full py-2 px-3 text-gray-700 bg-blue-50 border border-amber-100 rounded leading-tight focus:outline-none focus:shadow-outline"
                                name="name"
                                type="text"
                                value="{{ old('name', $community->name) }}"
                            >
                            @error('name')
                                <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-row items-center gap-4">
                        <div class="basis-1/5">
                            <strong>Location :</strong>
                        </div>
                        <div class="basis-4/5">
                            <input
                                class="w-full py-2 px-3 text-gray-700 bg-blue-50 border border-amber-100 rounded leading-tight focus:outline-none focus:shadow-outline"
                                name="location"
                                type="text"
                                value="{{ old('location', $community->location) }}"
                            >
                            @error('location')
                                <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-row items-center gap-4">
                        <div class="basis-1/5">
                            <strong>District :</strong>
                        </div>
                        <div class="basis-4/5">
                            <input
                                class="w-full py-2 px-3 text-gray-700 bg-blue-50 border border-amber-100 rounded leading-tight focus:outline-none focus:shadow-outline"
                                name="district"
                                type="text"
                                value="{{ old('district', $community->district) }}"
                            >
                            @error('district')
                                <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-row items-center gap-4">
                        <div class="basis-1/5">
                            <strong>Province :</strong>
                        </div>
                        <div class="basis-4/5">
                            <input
                                class="w-full py-2 px-3 text-gray-700 bg-blue-50 border border-amber-100 rounded leading-tight focus:outline-none focus:shadow-outline"
                                name="province"
                                type="text"
                                value="{{ old('province', $community->province) }}"
                            >
                            @error('province')
                                <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-2">
                        <strong>Tags :</strong>
                        <div class="mt-2 flex flex-wrap gap-4">
                            @foreach ($tags as $item)
                                <label class="inline-flex items-center gap-2">
                                    <input
                                        class="rounded border-gray-300"
                                        name="tag_id[]"
                                        type="checkbox"
                                        value="{{ $item->id }}"
                                        @checked(in_array($item->id, $selected))
                                    >
                                    <span>{{ $item->tag_name }}</span>
                                </label>
                            @endforeach
                        </div>

                        @error('tag_id')
                            <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                                class="font-bold rounded text-xs bg-blue-500 hover:bg-blue-500/80 text-white p-4">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
