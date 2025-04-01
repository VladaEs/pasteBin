@extends('layouts.pasteLayout')


@section("title", "View paste")




@section("content")

<div class='flex m-auto'>
    <div class="pastesList flex flex-row w-[100%] mt-5 ml-5 text-white">
        <div class="blockPaste flex flex-col w-[800px] h-[250px] gap-5  bg-neutral-900 dark:border-neutral-700 border
        border-gray-300  text-sm rounded-md p-2.5">

            <span>Your paste Has been created.</span>
            <span>The link to access your paste is below: </span>
            <span id="linkToCopy">{{route('viewPaste', $pasteId)}}</span>
            <div class="">
                <x-button color='red' id="linkButton">Copy the link</x-button>
            </div>

        </div>
    </div>
</div>


@endsection


@section('scripts')

<script>
    document.getElementById('linkButton').addEventListener('click',function(event){
        let value= document.getElementById('linkToCopy').textContent;
        navigator.clipboard.writeText(value);
    })

</script>

@endsection
