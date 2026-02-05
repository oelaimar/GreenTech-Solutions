@extends('layouts.app')

@section('title', 'Profile')

@section('aside')
    <!-- Sidebar Navigation -->
@endsection

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Page Heading -->
        <div class="mb-8">
            <h2 class="text-3xl font-black tracking-tight">Profile Settings</h2>
            <p class="text-[#638863] dark:text-[#a3b8a3] mt-1 font-medium">Manage your account information and preferences.</p>
        </div>

        @if (session('status') === 'profile-updated')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">Profile updated successfully.</span>
            </div>
        @endif

        <!-- Profile Information -->
        <div class="bg-white dark:bg-[#1a2e1a] rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm overflow-hidden p-8">
            <header class="mb-6">
                <h2 class="text-xl font-bold text-[#111811] dark:text-white">Profile Information</h2>
                <p class="text-[#638863] dark:text-[#a3b8a3] text-sm mt-1">Update your account's profile information and email address.</p>
            </header>

            <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('patch')

                <div class="space-y-2">
                    <label for="name" class="text-sm font-bold text-[#111811] dark:text-white">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/50 text-[#111811] dark:text-white placeholder-[#638863]" required autofocus autocomplete="name">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="email" class="text-sm font-bold text-[#111811] dark:text-white">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/50 text-[#111811] dark:text-white placeholder-[#638863]" required autocomplete="username">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-primary hover:bg-primary/90 text-background-dark px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-primary/20 transition-all">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Delete Account -->
        <div class="bg-white dark:bg-[#1a2e1a] rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm overflow-hidden p-8">
            <header class="mb-6">
                <h2 class="text-xl font-bold text-red-600">Delete Account</h2>
                <p class="text-[#638863] dark:text-[#a3b8a3] text-sm mt-1">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
            </header>

            <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                @csrf
                @method('delete')

                <div class="space-y-2 mb-6">
                    <label for="password" class="text-sm font-bold text-[#111811] dark:text-white">Password</label>
                    <input type="password" id="password" name="password" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-red-500/50 text-[#111811] dark:text-white placeholder-[#638863]" placeholder="Enter password to confirm" required>
                    @error('password', 'userDeletion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-red-500/20 transition-all">
                    Delete Account
                </button>
            </form>
        </div>
    </div>
@endsection
