@extends('layouts.app')
@section('content')
    <h1 class="text-center mt-2 mb-4">{{$souras[0]->title}}</h1>
    <div class="container">
        <div class="row my-4">
            @if(count($souras) > 0)
                @foreach($souras as $soura)
                    <div class="col-md-3 mb-3">
                        <div class="soura">
                            <img
                                src="https://th.bing.com/th/id/R.abe58e6bce56579327cf19f5188afbe7?rik=JkvlqHQt%2bWWG6A&pid=ImgRaw&r=0"
                                alt="" class="w-100">
                            <h2 class="text-center my-3">({{$soura->category->name}}) </h2>
                            <div class="card-body">
                                <audio controls  class="audio-element" id="audio" style="width: 220px" controlsList="nodownload">
                                    <source src="{{asset('storage')}}/{{$soura->file}}" type="audio/ogg">
                                    Your browser does not support this element
                                </audio>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('front.soura.show',[$soura->id])}}">
                                    <button class="btn btn-primary" style="width: 200px;">التفاصيل</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div style="margin-top: 100px">
                    <p>لا يوجد سور بعد سيتم الاضافة قريبا</p></div>
            @endif
        </div>

        {{$souras->links()}}
    </div>

@endsection





