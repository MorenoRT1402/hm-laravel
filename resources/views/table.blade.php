@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="overflow-x-auto">
        <table class="table-auto border-collapse border border-gray-200 shadow-md rounded-lg text-sm lg:text-base">
            <thead>
                <tr class="bg-gray-800 text-white">
                    @foreach ($headers as $th_header)
                        <th class="py-2 px-4 text-left uppercase tracking-wider border border-gray-300">
                            {{ $th_header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-100' }} hover:bg-gray-200">
                        @foreach ($row as $cell)
                            <td class="py-2 px-4 border border-gray-300 break-words">
                                {{ $cell }}
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($headers) }}" class="py-2 px-4 text-center border border-gray-300">
                            No hay datos disponibles
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
