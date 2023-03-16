@extends('layouts.master')

@section('title', 'Images')
@section('content')
    @if ($umages && count($images))
          @foreach($images as $images)
          <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img src="{{$image->image}}" alt="">
              <h5 class="card-title">{{$image->title}}</h5>
            </div>
          </div>


         @else
                  <div class="alert alert-info">
                    Ende nuk keni asnje Imazh
                    </div>
        
    @endif


    

    
@endsection