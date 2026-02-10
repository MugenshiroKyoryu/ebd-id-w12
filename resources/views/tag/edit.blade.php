@extends('layouts.app')

@section('title', 'Edit Tag')
@section('nav_title', 'Tag Management')

@section('content')
    <div class="w-2/3 mx-auto my-10">

        {{-- หัวข้อ --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Edit Tag
        </h2>

        {{-- กล่องฟอร์ม --}}
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            <form action="{{ route('tag.update', $tag) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Tag Name --}}
                <div class="mb-6">
                    <label
                        for="tag_name"
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Tag Description
                    </label>

                    <input
                        id="tag_name"
                        name="tag_name"
                        type="text"
                        value="{{ old('tag_name', $tag->tag_name) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline
                               @error('tag_name') border-red-500 @enderror"
                    >

                    @error('tag_name')
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Community ที่เชื่อม --}}
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Communities ที่เชื่อมกับ Tag นี้
                    </label>

                    <div class="grid grid-cols-2 gap-3 max-h-60 overflow-y-auto border rounded p-3">
                        @foreach ($communities as $c)
                            <label class="flex items-center space-x-2 text-sm">
                                <input
                                    type="checkbox"
                                    name="community_id[]"
                                    value="{{ $c->id }}"
                                    {{ in_array($c->id, $selectedCommunityIds) ? 'checked' : '' }}
                                >
                                <span>
                                    {{ $c->name }}
                                    <span class="text-xs text-gray-500">
                                        ({{ $c->province }})
                                    </span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- ปุ่ม --}}
                <div class="flex items-center justify-between mt-8">
                    <a
                        href="{{ route('tag.index') }}"
                        class="font-bold rounded text-xs bg-gray-500 hover:bg-gray-600 text-white px-4 py-2"
                    >
                        Back
                    </a>

                    <button
                        type="submit"
                        class="font-bold rounded text-xs bg-blue-600 hover:bg-blue-700 text-white px-4 py-2"
                    >
                        Update
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
