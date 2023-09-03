<?php
/**
 * @var \App\Models\Post $post
 */

?>

@extends('layout.admin')

@section('title', 'Статьи')

@section('content')



    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Статьи</h3>

        <div class="mt-8">
            <a href="{{ route("admin.posts.create") }}" class="text-indigo-600 hover:text-indigo-900">Добавить</a>
        </div>
        <h1>{{$version}}</h1>
        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

                    <x-table>
                        <x-slot name="thead">
                            <x-table.tr>
                                <x-table.th>Заголовок</x-table.th>
                                <x-table.th></x-table.th>
                            </x-table.tr>
                        </x-slot>
                        @foreach($posts as $post)
                            <x-table.tr>
                                <x-table.td>
                                    {{ $post->title }}
                                </x-table.td>
                                <x-table.td class="text-right">
                                    @canany(['update', 'delete'], $post)
                                        <a href="{{ route("admin.posts.edit", $post->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900">Редактировать</a>
                                        <form action="{{ route("admin.posts.destroy", $post->id) }}" method="POST">
                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" {{--value="{{$post->id}}--}}
                                            class="text-red-600 deletePostBtn hover:text-red-900">Удалить
                                            </button>
                                        </form>
                                    @endcan
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table>
{{--                    <table class="min-w-full">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                Заголовок--}}
{{--                            </th>--}}
{{--                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody class="bg-white">--}}
{{--                        @foreach($posts as $post)--}}
{{--                            <tr>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">--}}
{{--                                    <div class="text-sm leading-5 text-gray-900">{{ $post->title }}</div>--}}
{{--                                </td>--}}

{{--                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">--}}
{{--                                    <a href="{{ route("admin.posts.edit", $post->id) }}"--}}
{{--                                       class="text-indigo-600 hover:text-indigo-900">Редактировать</a>--}}

{{--                                    <form action="{{ route("admin.posts.destroy", $post->id) }}" method="POST">--}}
{{--                                        @csrf--}}

{{--                                        @method('DELETE')--}}

{{--                                        <button type="submit" --}}{{--value="{{$post->id}}--}}
{{--                                        class="text-red-600 deletePostBtn hover:text-red-900">Удалить--}}
{{--                                        </button>--}}
{{--                                    </form>--}}

{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
                    {{--                    <div class="modal" id="deleteModal" tabindex="-1">--}}
                    {{--                        <div class="modal-dialog">--}}
                    {{--                            <div class="modal-content">--}}
                    {{--                                <form action="{{ route("admin.posts.destroy", $post->id) }}" method="POST">--}}
                    {{--                                    @csrf--}}
                    {{--                                    <div class="modal-header">--}}
                    {{--                                        <h5 class="modal-title">Удалить пост</h5>--}}
                    {{--                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="modal-body">--}}
                    {{--                                        <input type="hidden" name="post_delete_id" id="post_id">--}}
                    {{--                                        <h5>Вы уверены, что хотите удалить этот пост?</h5>--}}
                    {{--                                        <p>Modal body text goes here.</p>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="modal-footer">--}}
                    {{--                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>--}}
                    {{--                                        <button type="submit" class="btn btn-danger">Удалить</button>--}}
                    {{--                                    </div>--}}
                    {{--                                </form>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.deletePostBtn').click(function (e) {
                e.preventDefault();
                let post_id = $(this).val();
                $('#post_id').val(post_id);
                $('#deleteModal').modal.addClass('show')
            });
        });
    </script>
@endsection
