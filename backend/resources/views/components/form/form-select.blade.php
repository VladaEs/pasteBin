@props([
    'valueName' => "id",
    "options"=>[],
    "old"=>'1',
])

<select {{ $attributes }}
    class="w-full gap-5 bg-gray-50 border border-gray-300 dark:text-neutral-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-neutral-900 dark:border-neutral-700">
    @isset($options)

        @foreach ($options as $option)
            @isset($option[$valueName])

                <option value="{{$option["id"]}}" {{$old == $option["id"]? "selected": '' }}   >{{ __($option[$valueName])}}</option>
            @endisset
        @endforeach
    @endisset



</select>
