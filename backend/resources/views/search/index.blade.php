@extends('layouts.pasteLayout')



@section("title", "Find Paste")


@section("content")

<div class="mt-5 spaceSide flex flex-col  text-white">


    <x-textfield>Type a name of the paste that you are looking for</x-textfield>
    @csrf


    <x-input placeholder="how to center a div" class="flex-1" type="text" name='PasteName' id="pasteNameInput"/>
    <x-error-message class=" ErrorMessage"></x-error-message>

    {{-- <div class="pastesList flex flex-row w-[100%] mt-5 ml-5">
        <div class="blockPaste flex flex-col w-[250px] h-[150px] gap-5  bg-neutral-900 dark:border-neutral-700 border
        border-gray-300  text-sm rounded-md p-2.5">

            <x-textfield class="text-xl">Paste Name</x-textfield>
            <span>category</span>
        </div>
    </div> --}}


</div>


@endsection


@section('scripts')
    <script>
        let timeoutId;
        window.onload =()=>{

        let input = document.getElementById('pasteNameInput');
        input.addEventListener("input",inputHandler);

        }
        function inputHandler(event){
            clearTimeout(timeoutId);
            let inputValue = event.target.value;
            timeoutId= setTimeout(() => {
                getPastes(inputValue);
            }, 1000);
        }

        async function getPastes(val){
            let body ={
                'pasteName': val,
            }
            let data=await fetch('/search', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'url': '/payment',
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value
                },
                body: JSON.stringify(body)
            });
            let response= await data.json();
            handleResponse(response);
        }
        function handleResponse(data){
            if(data['success']== false){
                console.log('false');
                document.querySelector('.ErrorMessage').textContent = data['errors']['pasteName'];
                return 0;
            }
            console.log(data);
            document.querySelector('.ErrorMessage').textContent = '';



            const container = document.querySelector('.pastesList');
            container.textContent = '';
            data['data'].forEach(paste => {

                const pasteBlock = document.createElement('div');
                pasteBlock.classList.add('blockPaste', 'flex', 'flex-col', 'w-[250px]', 'h-[150px]', 'gap-5', 'bg-neutral-900', 'dark:border-neutral-700', 'border', 'border-gray-300', 'text-sm', 'rounded-md', 'p-2.5');


                const pasteNameLink = document.createElement('a');

                pasteNameLink.href = `/paste/${paste['id']}`;
                pasteNameLink.classList.add('text-xl');  // Optional styling for the link
                pasteNameLink.textContent = paste['paste_custom_name'];  // Insert the paste name into the link

                // Create the category span
                const categorySpan = document.createElement('span');
                categorySpan.textContent = paste['paste_category'];

                // Append the paste name link and category to the block
                pasteBlock.appendChild(pasteNameLink);
                pasteBlock.appendChild(categorySpan);

                // Append the paste block to the container
                container.appendChild(pasteBlock);
        });

        }
    </script>
@endsection

