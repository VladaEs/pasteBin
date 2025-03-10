
@extends('layouts.layout')

@section("title", "Register")
@section("content")

    <div class="flex justify-center items-center h-[85vh]">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">SIgn in</h2>

        <x-form.form-paste action="{{route('createAccount')}}" method="POST" id="pasteForm">
            <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input
                type="email"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                placeholder="your@email.com"
                name="email"
                required
            />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input
                    type="text"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Jack London"
                    name="username"
                    required
                />
                </div>

            <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input
                type="password"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                placeholder="••••••••"
                name="password"
                required
            />
            </div>
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">
            Sign In
            </button>
        </x-form.form-paste>

        <div class="mt-6 text-center text-sm text-gray-600">
            Already has an account?
            <a href="{{route("login")}}" class="text-indigo-600 hover:text-indigo-500 font-medium">Log in</a>
        </div>
        </div>
    </div>

@endsection
