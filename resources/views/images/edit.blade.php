@extends('layouts.master')
@section('title', 'edito ni foto te re')

@section('content')

    <div class="card">
        <div class="card-body">
            @if ($errors->any)
                <div class=" alert alert-info">
                    @foreach ($errors->all() as $error)
                        {{ $errors }}
                    @endforeach

                </div>
            @endif

            <form action="{{ route('images.update', ['image' => '$image-id']) }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $image->title }}" class="form-controll">

                </div>

                <div class="form-group">
                    <img src="" />
                    <a href="{{ route('image.destroy', ['image' => '$image->id']) }}" class="btn btn-sm btn-link">Fshi foton</a>
                </div>
                <div class="form-group">
                    <label for="title">Imazhi</label>
                    <input type="text" name="image" id="image" class="form-controll">
                </div>

                <button class="btn btn-sm btn-primary">Krijo</button>
            </form>
        </div>


    </div>

@endsection
