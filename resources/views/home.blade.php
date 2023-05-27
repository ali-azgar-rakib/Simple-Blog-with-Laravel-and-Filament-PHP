@php
/** @var $posts LengthAwarePagination*/

@endphp


<x-app-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach ($posts as $post)


        <x-post :post="$post">
        </x-post>

        @endforeach
        {{ $posts->onEachSide(2)->links() }}
    </section>

    <x-sidebar></x-sidebar>

</x-app-layout>