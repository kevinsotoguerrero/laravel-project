@extends('template')

@section('content')
    <h1>Blog</h1>
    @foreach ($posts as $post)
        <p>
            <strong>{{ $post->id }}</strong>
            <a href="{{ route('post', $post->slug) }}">
                {{ $post->title }}
            </a>
            <br>{{ $post->user->name }}
        </p>
    @endforeach
    {{-- para la paginacion --}}
    {{ $posts->links() }}
@endsection
