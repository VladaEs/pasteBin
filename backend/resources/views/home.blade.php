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
                        {{__("New Paste")}}
                    </x-textfield>
                    <x-textarea placeholder="Type your message here" id="TextArea" rows='5' />
                    <x-textfield rows='10'>
                        {{__("Optional Paste Settings")}}
                    </x-textfield >
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700"></hr>


                    <x-form.form-paste action="" method="POST" id="pasteForm" onkeydown="return event.key != 'Enter';">
                        {{-- Select --}}
                        <x-form.form-row-wrapper>
                            <div class="text-white flex-1"><x-form.paste-option-span>{{__("Category")}}</x-form.paste-option-span></div>
                            <x-form.input-wrapper>
                                <x-form.form-select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </x-form-select>
                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>
                        {{-- Select --}}

                         {{-- tags --}}
                         <x-form.form-row-wrapper>
                            <div class="text-white flex-1"><x-form.paste-option-span>{{__("Tags")}}</x-form.paste-option-span></div>
                            <x-form.input-wrapper>
                                <div id="tags-container" class="w-full gap-5 bg-gray-50 border border-gray-300 dark:text-neutral-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-neutral-900 dark:border-neutral-700">
                                    <ul id="tags-list" class="flex flex-row flex-wrap"></ul>
                                    <input type="text" id="tags-input" class="inputField inputFieldTags" >
                                    <input type="hidden" id="hidden-field-tags">
                                </div>




                            </x-form.input-wrapper>
                        </x-form.form-row-wrapper>
                        {{-- tags --}}


                    </x-form-paste>

                </div>
                <x-sidebar>
                    {{__("Public Pastes")}}
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
    textArea.addEventListener('input', function(event){
        if (textArea) {
            textArea.style.height = 'auto'; // Reset the height
            textArea.style.height = `${textArea.scrollHeight}px`; // Set the height
    }
    });


//-=-=-=-=-=-=-=-=-=-=-=-=-=tags -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
let tags= [];
let hiddenInput =document.getElementById('hidden-field-tags');
$('#tags-container').on('click', function(){
    $('.inputFieldTags').focus();
});
$("#tags-input").on('keydown', function(event){
    if(event.key =="Enter"){
        console.log("saved: "+ event.target.value);
    }
    else{
        console.log(event.target.value);
    }

});





//-=-=-=-=-=-=-=-=-=-=-=-=-=tags -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

</script>


</body>
</html>
