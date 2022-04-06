@extends('layouts.frontend')

@section('content')
    <div
        class="mt-16 flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500">
        <div class="bg-white border-2 border-gray-200 max-w-lg mx-auto px-10 py-8 rounded-lg shadow-xl w-full">
            <div class="max-w-md mx-auto space-y-6">

                {{ $posts }}

            </div>
        </div>
    </div>
@endsection
