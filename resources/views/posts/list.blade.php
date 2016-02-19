@extends('layout')


@section('container')
    <h2>Posts</h2>

    {!! Alert::render() !!}

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        @can('update-post', $post)
                            <a href="{{ url('edit-post', [$post->id]) }}">Editar</a>
                        @else
                            <a href="#">Reportar post</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $posts->render() !!}
@endsection
