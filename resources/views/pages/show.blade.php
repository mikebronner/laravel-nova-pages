@extends("layouts.app", [
    "title" => $page->title,
])

@section("content")
    @if ($page->layout === "standard")
        <div class="relative pt-8 pb-16 bg-white overflow-hidden prose">
    @endif

    @if ($page->layout === "full-width")
        <div class="relative rounded-lg bg-white h-screen overflow-hidden mx-4 sm:mx-6 lg:mx-8 mb-20">
    @endif

        {!! $page->content !!}

    </div>
@endsection
