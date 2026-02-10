@extends('layouts.app')

@section('title', 'Tag Detail')
@section('nav_title', 'Tag Management')

@section('content')
    <div class="w-2/3 mx-auto my-10">

        {{-- หัวข้อ + ปุ่ม Back --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Tag Detail
            </h2>

            <a
                href="{{ route('tag.index') }}"
                class="font-bold rounded text-xs bg-gray-500 hover:bg-gray-600 text-white px-4 py-2"
            >
                Back
            </a>
        </div>

        {{-- กล่องรายละเอียด Tag --}}
        <div class="bg-white shadow-md rounded px-8 py-6 mb-8">
            <dl class="divide-y divide-gray-200">

                <div class="py-3 flex items-center">
                    <dt class="w-1/4 text-sm font-medium text-gray-500">
                        ID
                    </dt>
                    <dd class="text-sm text-gray-900">
                        {{ $tag->id }}
                    </dd>
                </div>

                <div class="py-3 flex items-center">
                    <dt class="w-1/4 text-sm font-medium text-gray-500">
                        Description
                    </dt>
                    <dd class="text-sm text-gray-900">
                        {{ $tag->tag_name }}
                    </dd>
                </div>

            </dl>
        </div>

        {{-- กล่อง Community ที่เชื่อม (เหมือนข้อมูลในหน้า index) --}}
        <div class="bg-white shadow-md rounded px-8 py-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Community ที่เชื่อมกับ Tag นี้
            </h3>

            @if ($tag->communities->isEmpty())
                <p class="text-sm text-gray-500">
                    ยังไม่มี Community ที่เชื่อมกับ Tag นี้
                </p>
            @else
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-3 py-2 text-sm text-left">ID</th>
                            <th class="border px-3 py-2 text-sm text-left">ชื่อชุมชน</th>
                            <th class="border px-3 py-2 text-sm text-left">Location</th>
                            <th class="border px-3 py-2 text-sm text-left">District</th>
                            <th class="border px-3 py-2 text-sm text-left">Province</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tag->communities as $c)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-3 py-2 text-sm">{{ $c->id }}</td>
                                <td class="border px-3 py-2 text-sm">{{ $c->name }}</td>
                                <td class="border px-3 py-2 text-sm">{{ $c->location }}</td>
                                <td class="border px-3 py-2 text-sm">{{ $c->district }}</td>
                                <td class="border px-3 py-2 text-sm">{{ $c->province }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection
