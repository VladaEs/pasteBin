@props(["rows"=> 5])


<textarea class='py-3 px-4 block w-full
border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
dark:placeholder-neutral-500 dark:focus:ring-neutral-600 textAreaProp'
rows="{{$rows}}" {{$attributes}} >

{{$slot}}
</textarea>
