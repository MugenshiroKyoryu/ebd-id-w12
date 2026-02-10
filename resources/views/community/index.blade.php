<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Community
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded"
                   href="{{ route('community.create') }}">
                    Create
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto border-collapse border border-amber-950 w-full mx-auto">
                    <thead>
                        <tr>
                            <th class="border border-amber-950 px-2 py-1">ID</th>
                            <th class="border border-amber-950 px-2 py-1">ชื่อชุมชน</th>
                            <th class="border border-amber-950 px-2 py-1">Location</th>
                            <th class="border border-amber-950 px-2 py-1">District</th>
                            <th class="border border-amber-950 px-2 py-1">Province</th>
                            <th class="border border-amber-950 px-2 py-1">Tag ที่เชื่อม</th>
                            <th class="border border-amber-950 px-2 py-1">จัดการ</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($communities as $item)
                            <tr>
                                <td class="border border-amber-950 px-2 py-1">{{ $item->id }}</td>
                                <td class="border border-amber-950 px-2 py-1">{{ $item->name }}</td>
                                <td class="border border-amber-950 px-2 py-1">{{ $item->location }}</td>
                                <td class="border border-amber-950 px-2 py-1">{{ $item->district }}</td>
                                <td class="border border-amber-950 px-2 py-1">{{ $item->province }}</td>

                                {{-- แสดง Tag ที่เชื่อม --}}
                                <td class="border border-amber-950 px-2 py-1">
                                    @if ($item->tags->isEmpty())
                                        <span class="text-gray-400">ไม่เชื่อม</span>
                                    @else
                                        <ul class="list-disc list-inside text-sm">
                                            @foreach ($item->tags as $t)
                                                <li>{{ $t->tag_name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>

                                {{-- จัดการ --}}
                                <td class="border border-amber-950 px-2 py-1">
                                    <form action="{{ route('community.destroy', $item) }}" method="POST" class="flex gap-2">
                                        <a class="bg-amber-500 hover:bg-amber-700 text-white py-2 px-4 rounded"
                                           href="{{ route('community.edit', $item) }}">
                                            <span class="material-symbols-outlined">edit</span>
                                        </a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded"
                                                onclick="return confirm('ยืนยันการลบ?')">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
