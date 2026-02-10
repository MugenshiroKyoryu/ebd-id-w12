<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Insert Communities
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="mb-4 flex justify-end">
                    <a class="font-bold rounded text-xs bg-green-500 hover:bg-green-500/80 text-white p-4"
                       href="{{ route('community.index') }}">
                        Back
                    </a>
                </div>

                @if(session('status'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('community.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div class="flex flex-row items-center gap-4">
                        <div class="basis-1/5">
                            <strong>Name :</strong>
                        </div>
                        <div class="basis-4/5">
                            <input
                                class="w-full py-2 px-3 text-gray-700 bg-blue-50 border border-amber-100 rounded leading-tight focus:outline-none focus:shadow-outline"
                                name="name"
                                type="text"
                                placeholder="Community Name"
                                value="{{ old('name') }}"
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
                                placeholder="Community Location"
                                value="{{ old('location') }}"
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
                                placeholder="Community District"
                                value="{{ old('district') }}"
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
                                placeholder="Community Province"
                                value="{{ old('province') }}"
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
                                        @checked(in_array($item->id, old('tag_id', [])))
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
