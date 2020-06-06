@extends('layout')

@section('block_title')
    {{ $paste->title }}
@endsection

@section('content')

<div class="row show-bin">
    <div class="small-12 medium-8 columns show-bin-content">
        <h3>{{ $paste->title }}</h3>

        <pre class="line-numbers">
            <code class="language-phplinks">{{ $paste->content }}</code>
        </pre>
    </div>

    @if( ! empty( $tags ) )
    <div class="small-12 medium-4 columns show-bin-sidebar">
        <h3>Codex Entries</h3>
        <ul>
            @foreach( $tags as $tag )
            <li><a href="{{ $tag->url }}" target="_blank" title="{{ strip_tags( $tag->description ) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection
