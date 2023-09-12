@extends('layouts.app')
@section('content')
    @if(count($ringtones) > 0)
        <h1 class="text-center mt-2 mb-4">{{$ringtones[0]->category->name}}</h1>
    @endif
<div class="container">
    <div class="row my-4">
        @if(count($ringtones) > 0)
        @foreach($ringtones as $ringtone)
        <div class="col-md-3 mb-3" >
            <div class="soura">
                <img
                    src="https://th.bing.com/th/id/R.abe58e6bce56579327cf19f5188afbe7?rik=JkvlqHQt%2bWWG6A&pid=ImgRaw&r=0"
                    alt="" class="w-100">
                <h2 class="text-center my-3">{{$ringtone->title}}</h2>
                <div class="card-body">
                    <audio controls id="{{$ringtone->id}}" class="audio-element" style="width: 220px" controlsList="nodownload">
                        <source src="{{asset('storage')}}/{{$ringtone->file}}" type="audio/ogg">
                        Your browser does not support this element
                    </audio>
                </div>
                <div class="card-footer">
                    <a href="{{route('front.soura.show',[$ringtone->id])}}">
                        <button class="btn btn-primary" style="width: 200px;">التفاصيل</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div style="margin-top: 100px">
            <p style="width: 300px; border-radius: 15px ; margin:140px auto 0 ;text-align: center;font-size: 40px">لا يوجد سور بعد لهذا القارئ سيتم الاضافة قريبا</p></div>
        @endif
    </div>

    {{$ringtones->links()}}
</div>
@endsection





