@extends('dashboard.index')
@section('content')
<div class="container mx-auto px-5 md:px-10 xl:px-20 overflow-x-hidden">
    <h1 class="text-2xl mb-8 text-center font-semibold uppercase mt-16">Subjects</h1>
    @if (session()->has('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    </div>
    @endif
    <div class="flex justify-end">
        <a href="/dashboard/subjects/create"
            class="transition duration-300 bg-[#315887] hover:bg-[#1C314C] text-white px-4 py-2 rounded-md mb-4">
            Tambah mata pelajaran <i class="fa-solid fa-plus"></i>
        </a>
    </div>
    @if ($subjects->isEmpty())
    <div class="flex justify-center items-center h-32">
        <span class="text-gray-400 font-medium">Belum ada mata pelajaran</span>
    </div>
    @else
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-base text-gray-700 uppercase bg-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3">Kode</th>
                    <th scope="col" class="px-6 py-3">Mata Pelajaran</th>
                    <th scope="col" class="px-6 py-3">Tanggal dibuat</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white border-b">
                @foreach ($subjects as $subject)
                <tr class="text-sm">
                    <th scope="row" class="px-6 py-4">{{
                        $subject->id }}</th>
                    <td class="px-6 py-4">{{ $subject->name }}</td>
                    <td class="px-6 py-4">{{ $subject->created_at }}</td>
                    <td class="px-6 py-4 flex space-x-1">
                        <a href="/dashboard/subjects/{{ $subject->id }}/edit"
                            class="transition duration-300 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <form action="/dashboard/subjects/{{ $subject->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah anda yakin ingin menghapus mata pelajaran ini?')"
                                class="transition duration-300 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection