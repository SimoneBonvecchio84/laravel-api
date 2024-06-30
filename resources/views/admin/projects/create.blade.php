@extends('layouts.admin')
{{-- @include('partials.errors') --}}
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="py-5" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">
                <h4>Titolo Progetto</h4>
            </label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <h4 class="py-2">Tecnologie</h4>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($technologies as $curTech)
                    <input name="technologies[]" type="checkbox" class="btn-check" id="tech - {{ $curTech->id }}"
                        autocomplete="off" value="{{ $curTech->id }}">
                    <label class="btn btn-primary" for="tech - {{ $curTech->id }}">{{ $curTech->name }}</label>
                @endforeach
            </div>
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">
                <h4>Descrizione</h4>
            </label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
        </div>
        <button class="btn btn-success" type="submit">Salva</button>
    </form>
@endsection
