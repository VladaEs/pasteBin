<form {{$attributes}} class="wrapper w-full flex flex-col gap-1">
    @csrf
    {{$slot}}
</form>
