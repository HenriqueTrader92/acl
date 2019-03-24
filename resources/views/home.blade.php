@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($posts as $post)
        @can('view_post', $post)
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p>
            <b>Author: {{$post->user->name}}</b>
            <a href="{{url("/post/$post->id/update")}}">Editar</a>
        @endcan
    @empty
        <p>Sem nenhum post!</p>
    @endforelse
</div>
@endsection
