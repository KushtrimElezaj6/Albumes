@extends('layouts.master')

@section('title', 'Edito albumin ')
@section('content')
    
      <div class="card">
        <div class="card-body">
            @if ($errors->any)
            <div class="alert alert-info">
              @foreach ($errors->all() as $errors )
              {{$errors}}
                  
              @endforeach
            </div>
                
            @endif
            <form action="{{ route('albums.update',['album'=>$albums->id])}}"  method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"   value="{{$albums->title)}}" class="form-controll">

                </div>
                <button class=" btn btn-sm btn-primary"> Krijo</button>
        </form>
        </div>




      </div>



    

    
@endsection