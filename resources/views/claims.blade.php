@php use App\Models\Category; @endphp
@extends('layouts.user')

@section('head')

@endsection

@section('content')
    <x-user.bread-crumb :data="['Home', 'Claim']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">
            Claim your Business
        </h1>
    </div>
    <div class="container mx-auto py-8">
        <form action="{{ route('view.claim.company') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="website">
                    Website
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('website') border-red-500 @enderror" id="website" type="text" placeholder="Website" name="website" value="{{ old('website') }}" required>
                @error('website')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    Phone
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror" id="phone" type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company_name">
                    Company Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company_name') border-red-500 @enderror" id="company_name" type="text" placeholder="Company Name" name="company_name" value="{{ old('company_name') }}" required>
                @error('company_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    Message
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('message') border-red-500 @enderror" id="message" placeholder="Message" name="message" required>{{ old('message') }}</textarea>
                @error('message')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="company_id" value="{{ $company->id }}">

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>

@endsection
