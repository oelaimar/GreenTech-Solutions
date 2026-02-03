@extends('layouts.app')

@section('title', "login")

@section('content')

    <div class="max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden p-8 md:p-12 transition-all duration-300">
        <div class="mb-10 text-center">
            <div class="flex flex-col items-center gap-3 justify-center mb-6">
                <box-icon type='solid' name='leaf' color="currentColor" class="text-green-700 w-12 h-12"></box-icon>
                <div class="text-primary">
                    <span class="material-symbols-outlined text-4xl">GreenTech</span>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-[#111811]">Welcome Back</h2>
            <p class="text-[#638863] mt-2">Please enter your details to login.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                <strong class="font-bold">Error !</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>

        @endif

        <form action="{{route('login.submit')}}" method="POST" class="mt-6">

            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input class="mt-1 p-3 block w-full boarder border-gray-300 outline-non rounded-md shadow-md" type="email" id="email" name="email" value="{{old('email')}}">
                @error('email')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input class="mt-1 p-3 block w-full boarder border-gray-300 outline-non rounded-md shadow-md" type="password" id="password" name="password" value="{{old('password')}}">
                @error('password')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-green-700 hover:bg-green-500 text-white rounded-md">
                login
            </button>

            <p class="my-2">
                Don’t have an account?  <a href="{{route('register')}}" class="text-red-500">sing up</a>
            </p>

        </form>
    </div>
@endsection
