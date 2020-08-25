@extends("layouts.app")

@section("content")
    <div class="relative pt-8 pb-16 bg-white overflow-hidden prose">
        <h1>{{ $page->title }}</h1>

        {!! $page->content !!}

    </div>
@endsection
