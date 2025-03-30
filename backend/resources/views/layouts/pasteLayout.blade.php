@extends('layouts.layout')



@section('content')
    <div class='spaceSide'>
        <x-workspace>
            <x-gridlayoutform>
                <div>

                    @yield('leftSide')

                </div>


                <x-sidebar>

                    @yield('rightSide')

                </x-sidebar>
            </x-gridlayoutform>
        </x-workspace>
    </div>

    @section('scripts')
        @yield('scripts')
    @endsection


@endsection
