@extends("layouts.app", [
    "title" => $page->title,
])

@section("content")
    @if ($page->layout === "standard")
        <div class="relative pt-8 pb-16 bg-white overflow-hidden prose">
    @endif

    @if ($page->layout === "full-width")
        <div class="relative rounded-lg bg-white overflow-hidden">
    @endif

        {!! $page->content !!}

    </div>
@endsection
