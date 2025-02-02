<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PasteBin made By VladaEs</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="pageWrapper mb-5 flex flex-col">
        <x-header />
        <div class='spaceSide'>
            <x-workspace>
                <x-gridlayoutform>
                    <div>
                        <x-textfield>
                            {{ __('New Paste') }}
                        </x-textfield>
                        <x-textarea placeholder="Type your message here" name="pasteContent" id="TextArea" rows='5' form="pasteForm" />
                        <x-textfield rows='10'>
                            {{ __('Optional Paste Settings') }}
                        </x-textfield>
                        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                        </hr>


                        <x-form.form-paste action="{{route('createPaste')}}" method="POST" id="pasteForm"
                            onkeydown="return event.key != 'Enter';">
                            {{-- Select Category--}}

                            @csrf

                            <x-form.form-row-wrapper>
                                <div class="text-white flex-1">
                                    <x-form.paste-option-span>{{ __('Category') }}</x-form.paste-option-span></div>
                                <x-form.input-wrapper>
                                    <x-form.form-select name="Category">
                                        @forEach($categories as $category){
                                            <option value="{{$category["id"]}}"> {{$category["paste_category"]}}</option>
                                        }
                                        @endforeach
                                        </x-form-select>
                                </x-form.input-wrapper>
                            </x-form.form-row-wrapper>
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
                                        <input type="hidden" id="hidden-field-tags">
                                    </div>




                                </x-form.input-wrapper>
                            </x-form.form-row-wrapper>
                            {{-- tags --}}

                            {{-- Select Expiration--}}
                            <x-form.form-row-wrapper>
                                <div class="text-white flex-1">
                                    <x-form.paste-option-span>{{ __('Paste Expiration') }}</x-form.paste-option-span></div>
                                <x-form.input-wrapper>
                                    <x-form.form-select name="expiration">

                                        @forEach($expirationTime as $expTime){
                                            <option value="{{$expTime["id"]}}">{{$expTime['expiration_name']}}</option>
                                        }
                                        @endforeach

                                        </x-form-select>
                                </x-form.input-wrapper>
                            </x-form.form-row-wrapper>
                            {{-- Select Expiration --}}


                            {{-- Select privacy--}}
                            <x-form.form-row-wrapper>
                                <div class="text-white flex-1">
                                    <x-form.paste-option-span>{{ __('Paste Privacy') }}</x-form.paste-option-span></div>
                                <x-form.input-wrapper>
                                    <x-form.form-select name="privacy">
                                        @foreach($privacy as $index => $pr)
                                            <option value="{{ $index }}">{{ $pr }}</option>
                                        @endforeach


                                        </x-form-select>
                                </x-form.input-wrapper>
                            </x-form.form-row-wrapper>
                            {{-- Select privacy --}}


                            {{-- input password --}}
                            <x-form.form-row-wrapper>
                                <div class="text-white flex-1">
                                    <x-form.paste-option-span>{{ __('Paste Password') }}</x-form.paste-option-span>
                                </div>
                                <x-form.input-wrapper>
                                    <x-input name="password" type="password" placeholder="Type your password here"/>
                                </x-form.input-wrapper>
                            </x-form.form-row-wrapper>
                            {{-- input password --}}

                            {{-- input name --}}
                            <x-form.form-row-wrapper>
                                <div class="text-white flex-1">
                                    <x-form.paste-option-span>{{ __('Paste Name') }}</x-form.paste-option-span>
                                </div>
                                <x-form.input-wrapper>
                                    <x-input name="pasteName" type="text" placeholder="Type paste name here"/>
                                </x-form.input-wrapper>
                            </x-form.form-row-wrapper>
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
                    </x-sidebar>
                </x-gridlayoutform>
            </x-workspace>

        </div>
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
        textArea.addEventListener('input', function(event) {
            if (textArea) {
                textArea.style.height = 'auto'; // Reset the height
                textArea.style.height = `${textArea.scrollHeight}px`; // Set the height
            }
        });


        //-=-=-=-=-=-=-=-=-=-=-=-=-=tags -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        let tags = [];
        let hiddenInput = document.getElementById('hidden-field-tags');
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
                tags.push(event.target.value);
                drawTags(tags);
                this.value= "";
            }
        });
        //-=-=-=-=-=-=-=-=-=-=-=-=-=tags -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    </script>


</body>

</html>
