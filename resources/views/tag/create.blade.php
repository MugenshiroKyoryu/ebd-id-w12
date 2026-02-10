@extends('layouts.app')

@section('title', 'Add Tag')
@section('nav_title', 'Tag Management')

@section('content')
    <div class="w-2/3 mx-auto my-10">

        {{-- หัวข้อหน้า --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Add Tag
        </h2>

        {{-- แสดงข้อความสำเร็จ ถ้ามี --}}
        @if ($message = session('success'))
            <div
                class="mb-6 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert"
            >
                <div class="flex">
                    <div class="py-1">
                        <svg
                            class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                            />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- กล่องฟอร์ม --}}
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            <form action="{{ route('tag.store') }}" method="POST">
                @csrf

                {{-- ฟิลด์ Title Description --}}
                <div class="mb-4">
                    <label
                        for="tag_name"
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Title Description
                    </label>

                    <input
                        id="tag_name"
                        name="tag_name"
                        type="text"
                        value="{{ old('tag_name') }}"
                        placeholder="Tag Description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                               focus:outline-none focus:shadow-outline @error('tag_name') border-red-500 @enderror"
                    >

                    @error('tag_name')
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- ปุ่ม Back ซ้าย / Submit ขวา --}}
                <div class="flex items-center justify-between mt-6">
                    <a
                        href="{{ route('tag.index') }}"
                        class="font-bold rounded text-xs bg-gray-500 hover:bg-gray-600 text-white px-4 py-2"
                    >
                        Back
                    </a>

                    <button
                        type="submit"
                        class="font-bold rounded text-xs bg-blue-500 hover:bg-blue-600 text-white px-4 py-2"
                    >
                        Submit
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
