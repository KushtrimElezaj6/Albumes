@extends('layouts.master')

@section('title', 'Krijo album te ri')
@section('content')

    <div class="card">
        <div class="card-body">
            @if ($errors->any)
                <div class="alert alert-info"></div>
                @foreach ($errors->all() as $errors)
                    {{ $errors }}
                @endforeach


            @endif
            <form action="{{ route('albums.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Albumet e 2023" class="form-controll">

                </div>
                <button class=" btn btn-sm btn-primary mt-2"> Krijo</button>
            </form>
        </div>
    </div>

@endsection
