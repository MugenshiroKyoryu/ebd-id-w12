@extends('layouts.app')

@section('title', 'Tag List')

@section('nav_title', 'Tag Management')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            รายการ Tag
        </h1>

        <a
            href="{{ route('tag.create') }}"
            class="inline-flex items-center px-4 py-2 rounded-md bg-green-600 hover:bg-green-700 text-white text-sm font-medium"
        >
            + เพิ่ม Tag ใหม่
        </a>
    </div>

    <div class="bg-white rounded-lg shadow border border-gray-200 overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">คำอธิบาย</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Community ที่เชื่อม</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-700 w-40">จัดการ</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tags as $item)
                    <tr class="border-b hover:bg-gray-50 align-top">
                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $item->id }}
                        </td>

                        <td class="px-4 py-2 text-sm text-gray-800">
                            {{ $item->tag_name }}
                        </td>

                        <td class="px-4 py-2 text-sm text-gray-800">
                            @if ($item->communities->isEmpty())
                                <span class="text-gray-400">ไม่เชื่อม</span>
                            @else
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($item->communities as $c)
                                        <li>
                                            {{ $c->name }}
                                            <span class="text-xs text-gray-500">
                                                ({{ $c->province }})
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>

                        <td class="px-4 py-2 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a
                                    href="{{ route('tag.show', $item) }}"
                                    class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs font-medium"
                                >
                                    Detail
                                </a>

                                <a
                                    href="{{ route('tag.edit', $item) }}"
                                    class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-xs font-medium"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('tag.destroy', $item) }}"
                                    method="POST"
                                    onsubmit="return confirm('ยืนยันการลบรายการนี้?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-xs font-medium"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if ($tags->isEmpty())
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-sm text-gray-500">
                            ยังไม่มี Tag ในระบบ
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

@endsection
