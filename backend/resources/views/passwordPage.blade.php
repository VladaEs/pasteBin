@extends('layouts.block')


@section("title", "View paste")

@section('content')

    <div class="text-white flex flex-col column w-screen h-screen  justify-center items-center mt-[-7%]">
        <x-textfield>To view this paste, you need to enter the password</x-textfield>
        <div class="w-[60%]">
            <x-form.form-paste action="{{route('checkPastePassword', $pasteId)}}" method="POST">
                <div class="flex flex-row">
                    @csrf
                    <x-input placeholder="Password" class="flex-1" type="password" name='password'/>
                    {{-- <x-button class="flex-10">Submit</x-button> --}}
                </div>
                @error('password')
                    <x-error-message class="">{{ $message }}</x-error-message>
                @enderror
            </x-form.form-paste>
        </div>

    </div>

@endsection
