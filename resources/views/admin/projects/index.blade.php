@extends('layouts.admin')

@section('content')
    <h1>Index </h1>
    <div>
        <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Crea</a>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Categoria</th>
                <th scope="col">N Tech</th>
                <th scope="col">Contenuto</th>
                <th scope="col">Slug</th>
                <th scope="col">Dettagli</th>
                <th scope="col">Modifica</th>
                <th scope="col">Cancella</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projectsArray as $curProject)
            <tr>
                <th scope="row">{{ $curProject->id }}</th>
                <td>{{ $curProject->title }}</td>
                <td>{{ $curProject->type?->name }}</td>
                <td>
                    {{ count($curProject->technologies) }}             
                </td>
                <td>{{ $curProject->content }}</td>
                <td>{{ $curProject->slug }}</td>
                <td>
                    <a class="btn btn-info"
                    href="{{ route('admin.projects.show', ['project' => $curProject->slug]) }}">Dettagli</a>
                </td>
                <td>
                    <a class="btn btn-warning"
                    href="{{ route('admin.projects.edit', ['project' => $curProject->slug]) }}">Modifica</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.projects.destroy', ['project' => $curProject->slug]) }}"
                            method='POST'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" href=""><i
                                class="fa-solid fa-trash"></i></button>
                            </form>
                            
                            {{-- <form action="{{ route('admin.projects.destroy', ['project' => $curProject->slug]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" href=""><i
                                    class="fa-solid fa-trash"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container py-5 d-flex justify-content-center">
                    {{ $projectsArray->links() }}
                </div>
                @endsection
                