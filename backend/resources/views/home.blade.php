@extends('layouts.layout')


@section("title", "Paste bin made by VladaEs")


@section('content')
    <div class='spaceSide'>
        <x-workspace>

            <x-gridlayoutform>
                <div>
                    <x-textfield>
                        {{ __('New Paste') }}
                    </x-textfield>


                    <x-textarea placeholder="Type your message here" name="pasteContent" id="TextArea" rows='5' form="pasteForm">{{request()->old('pasteContent')}}</x-textarea>
                    @error('pasteContent')
                        <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                    @enderror

                    <x-textfield >
                        {{ __('Optional Paste Settings') }}
                    </x-textfield>


                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    </hr>


                    <x-form.form-paste action="{{route('createPaste')}}" method="POST" id="pasteForm"
                        onkeydown="return event.key != 'Enter';">
                        {{-- Select Category--}}



                        <x-form.form-row-wrapper>
                            <div class="text-white flex-1">
                                <x-form.paste-option-span>{{ __('Category') }}</x-form.paste-option-span></div>
                            <x-form.input-wrapper>

                                <x-form.form-select name="Category" :options="$categories" valueName="paste_category" old="{{request()->old('Category')}}" />

                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>


                        @error('Category')
                            <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                        @enderror

                        {{-- Select Category --}}



                        {{-- tags --}}
                        <x-form.form-row-wrapper>
                            <div class="text-white flex-1">
                                <x-form.paste-option-span>{{ __('Tags') }}</x-form.paste-option-span></div>
                            <x-form.input-wrapper>
                                <div id="tags-container"
                                    class="w-full gap-5 bg-gray-50 border border-gray-300 dark:text-neutral-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-neutral-900 dark:border-neutral-700">
                                    <ul id="tags-list" class="flex flex-row flex-wrap tagsList"></ul>
                                    <input type="text" id="tags-input" class="inputField inputFieldTags">
                                    <input type="hidden" id="hidden-field-tags" name="pasteTags" value="{{request()->old('pasteTags')}}">
                                </div>
                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>
                        {{-- tags --}}

                        {{-- Select Expiration--}}
                        <x-form.form-row-wrapper>
                            <div class="text-white flex-1">
                                <x-form.paste-option-span>{{ __('Paste Expiration') }}</x-form.paste-option-span></div>
                            <x-form.input-wrapper>

                                <x-form.form-select name="expiration" :options="$expirationTime" valueName="expiration_name" old="{{request()->old('expiration')}}"/>

                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>


                        @error('expiration')
                            <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                        @enderror
                        {{-- Select Expiration --}}





                        {{-- Select privacy--}}
                        {{-- <x-form.form-row-wrapper>
                            <div class="text-white flex-1">
                                <x-form.paste-option-span>{{ __('Paste Privacy') }}</x-form.paste-option-span></div>
                            <x-form.input-wrapper>

                                <x-form.form-select name="privacy" :options="$privacy" valueName="privacy" old="{{request()->old('privacy')}}" />

                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>
                        @error('privacy')
                            <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                        @enderror --}}
                        {{-- Select privacy --}}


                        {{-- input password --}}
                        <x-form.form-row-wrapper>
                            <div class="text-white flex-1">
                                <x-form.paste-option-span>{{ __('Paste Password') }}</x-form.paste-option-span>
                            </div>
                            <x-form.input-wrapper>
                                <x-input name="password" value="{{request()->old('password')}}" type="password" placeholder="Type your password here"/>
                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>
                        @error('password')
                            <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                        @enderror
                        {{-- input password --}}

                        {{-- input name --}}
                        <x-form.form-row-wrapper>
                            <div class="text-white flex-1">
                                <x-form.paste-option-span>{{ __('Paste Name') }}</x-form.paste-option-span>
                            </div>
                            <x-form.input-wrapper>
                                <x-input name="pasteName" type="text" placeholder="Type paste name here" value="{{request()->old('pasteName')}}"/>
                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>

                        @error('pasteName')
                            <x-error-message class="spaceSide">{{ $message }}</x-error-message>
                        @enderror
                        {{-- input name --}}
                        <x-form.form-row-wrapper>
                            <x-button type="submit" color="blue">
                                {{__("Create")}}
                            </x-button>
                    </x-form.form-row-wrapper>
                        </x-form-paste>

                </div>
                <x-sidebar>
                    {{ __('Public Pastes') }}
                    @foreach($publicPastes as $publicPaste)
                    <div class="pasteWrapper flex flex-col">
                        <x-textfield>hello</x-textfield>
                        <div class="flex flex-row text-xs font-normal text-gray-200 tracking-wide capitalize whitespace-nowrap">
                            <span class="pasteTimeCreation">{{$publicPaste['created_at']}}</span>
                            <span class="mr-2 ml-2">|</span>
                            <span class="pasteCategory">{{$publicPaste['paste_category']}}</span>
                        </div>
                    </div>
                    @endforeach
                </x-sidebar>
            </x-gridlayoutform>
        </x-workspace>

    </div>



{{-- <div> {/*section 1 from the right where the text area is*/}
<TextFeild>New Paste</TextFeild>
<TextArea register={reg}/>
<TextFeild>Optional Paste Settings</TextFeild>
<hr className="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700"></hr>
<FormPaste getRegister={getRegister}/>
</div>

<SideBar />


</div>

--}}
<script>
    /* Text Area resize*/
    let textArea = document.getElementById("TextArea");

    const resizeTextArea =  function(event= null) {
        if (textArea) {
            textArea.style.height = 'auto'; // Reset the height
            textArea.style.height = `${textArea.scrollHeight}px`; // Set the height
        }
    }
    resizeTextArea();// initial call
    textArea.addEventListener('input',()=> resizeTextArea(event));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=tags -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    let hiddenInput = document.getElementById('hidden-field-tags');
    let tags = hiddenInput.value.split(',').filter(tag => tag !== '');// gets value from the hidden input.
    // If there is nothing it will remove empty strings like "" this.

    // initial Drawing
    drawTags(tags);




    $('#tags-container').on('click', function() {
        $('.inputFieldTags').focus();
    });
    function drawTags(arr, selector = "tags-list") {

        if (!(Array.isArray(arr)) && !(arr.length >= 1)) return;
        let wrapper = document.getElementById(selector);
        wrapper.innerHTML = "";
        let classArr= ['cursor-pointer'];
        arr.forEach((tag, ind) => {
            const tagItem = document.createElement('li');
            tagItem.textContent = tag;
            classArr.forEach(item=>{tagItem.classList.add(item);});
            tagItem.setAttribute('data-index', ind);
            tagItem.addEventListener('click', function(event){
                let indexDelete =parseInt(this.getAttribute('data-index'), 10);
                if (indexDelete < 0 || indexDelete >= tags.length) return;
                tags.splice(parseInt(indexDelete), 1);
                drawTags(tags);
            });
            wrapper.appendChild(tagItem);
        });
    }
    $("#tags-input").on('keydown', function(event) {
        if (event.key == "Enter") {
            if(event.target.value.length <= 1) return;
            const regExp = /[^a-zA-Z0-9]/g;
            let cleanStr = event.target.value.replace(regExp, '');
            tags.push(cleanStr);
            drawTags(tags);
            this.value= "";
            let strValue = tags.join(",");
            console.log(strValue);
            hiddenInput.value = strValue;


        }
    });
    //-=-=-=-=-=-=-=-=-=-=-=-=-=tags -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
</script>


@endsection
