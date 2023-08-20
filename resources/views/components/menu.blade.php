<nav class="mt-10">
    @foreach($menu as $item)
    <a href="{{ route($item['route']) }}"
       class="@if($item['active']) bg-gray-700 bg-opacity-25 @endif text-gray-100 flex items-center mt-4 py-2 px-6">

        <span class="mx-3">{{$item['title']}}</span>
    </a>
    @endforeach

{{--    <a href="{{ route('admin.posts.index') }}"--}}
{{--       class="text-gray-100 flex items-center mt-4 py-2 px-6">--}}

{{--        <span class="mx-3">Статьи</span>--}}
{{--    </a>--}}
</nav>
