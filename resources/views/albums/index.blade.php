@extends('layouts.master')

@section('title', 'Albums')
@section('content')

    @if ($albums && count($albums))
        @foreach ($albums as $albums)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $albums->title }}</h5>
                    <p class="card-text">{{ $albums->images->count() }}</p>

                    <div class="btn-group" role="group" aria-label="Basic example">

                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('albums.show', ['albums' => $albums->id]) }}" class="btn btn-links mt-2">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                               </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('albums.edit', ['albums' => $albums->id]) }}" class="btn btn-links ">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                                </a><br>
                        </button>
                        <button type="button" class="btn btn-danger">
                            <a href="{{ route('albums.destroy', ['albums' => $albums->id]) }}" class="btn btn-links ">
                                <i class="fa fa-close" aria-hidden="true"></i>

                            </a>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            Ende nuk keni asnje album
        </div>
    @endif

@endsection
