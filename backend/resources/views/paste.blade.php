@extends('layouts.layout')


@section("title", "View paste")



@section('content')


<div class='spaceSide'>
    <x-workspace>

        <x-gridlayoutform>
            <div>
                <x-textfield>
                    {{ __('View the paste') }}
                </x-textfield>


                <x-textarea name="pasteContent" id="TextArea" rows='5' >{{$pasteContent}}</x-textarea>
                @error('pasteContent')
                    <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                @enderror



                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                </hr>



            </div>
            <x-sidebar>
                {{ __('Public Pastes') }}
            </x-sidebar>
        </x-gridlayoutform>
    </x-workspace>

</div>

@endsection
