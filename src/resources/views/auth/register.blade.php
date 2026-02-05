@extends('layouts.app')

@section('title', 'register')

@section('content')

    <div class="max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden p-8 md:p-12 transition-all duration-300">
        <div class="mb-10 text-center">
            <div class="flex flex-col items-center gap-3 justify-center mb-6">
                <box-icon type='solid' name='leaf' color="currentColor" class="text-green-700 w-12 h-12"></box-icon>

            </div>
            <h2 class="text-2xl font-bold text-[#111811]">Welcome Back</h2>
            <p class="text-[#638863] mt-2">Please enter your details to sign in.</p>
        </div>
        @if(session('success'))
            <div class="bg-red-100 border border-green-400 text-green-700 px-4 py-3 rounded-md relative" role="alert">
                <strong class="font-bold">Success</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <form action="{{route('registration.register')}}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name:</label>
                <input class="mt-1 p-3 block w-full boarder border-gray-300 outline-non rounded-md shadow-md" type="text" id="name" name="name" value="{{old('name')}}">
                @error('name')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input class="mt-1 p-3 block w-full boarder border-gray-300 outline-non rounded-md shadow-md" type="email" id="email" name="email" value="{{old('email')}}">
                @error('email')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input class="mt-1 p-3 block w-full boarder border-gray-300 outline-non rounded-md shadow-md" type="password" id="password" name="password" value="{{old('password')}}">
                @error('password')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password:</label>
                <input class="mt-1 p-3 block w-full boarder border-gray-300 outline-non rounded-md shadow-md" type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-green-500 hover:bg-green-300 text-white rounded-md">
                Create Acount
            </button>

            <p class="my-2">
                Already have an account?  <a href="{{route('login')}}" class="text-red-500">sing in</a>
            </p>
        </form>
    </div>
@endsection
