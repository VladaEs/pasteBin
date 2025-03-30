@extends('layouts.pasteLayout')


@section("title", "View paste")





<div class='spaceSide'>
    @section('leftSide')
            <div>
                <x-textfield>
                    {{ __('View the paste') }}
                </x-textfield>


                <x-textarea name="pasteContent" id="TextArea" rows='5' >{{$pasteContent}}</x-textarea>
                @error('pasteContent')
                    <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                @enderror


                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700" />
                <div class="flex flex-row ml-2">
                    <img src="{{asset('images/eyeIcon.png')}}" class="mr-4" >
                    <span>{{$pasteViews}}</span>
                </div>

            </div>
            @endsection
        @section('rightSide')
            <x-sidebar>
                {{ __('Public Pastes') }}

                @foreach($publicPastes as $publicPaste)
                <div class="pasteWrapper flex flex-col">
                    <x-textfield><a href="{{route('viewPaste', $publicPaste['id'])}}">{{$publicPaste['paste_custom_name']}} </a></x-textfield>
                    <div class="flex flex-row text-xs font-normal text-gray-200 tracking-wide capitalize whitespace-nowrap">

                        <span class="pasteTimeCreation">{{$publicPaste['timeDifference']}} </span>
                        <span class="mr-2 ml-2">|</span>
                        <span class="pasteCategory">{{$publicPaste['paste_category']}}</span>
                    </div>
                </div>
                @endforeach
            </x-sidebar>
        @endsection

</div>
