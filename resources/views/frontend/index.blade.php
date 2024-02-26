@extends('layouts.app')
@section('content')
    <h1 class="text-center mt-2 mb-4">سور القران الكريم </h1>
    <div class="container">
        <div class="row my-4">
            @if(count($soura) > 0)
                @foreach($soura as $s)
                    <div class="col-md-3 mb-3">
                        <div class="soura">
                            <img
                                src="https://th.bing.com/th/id/R.abe58e6bce56579327cf19f5188afbe7?rik=JkvlqHQt%2bWWG6A&pid=ImgRaw&r=0"
                                alt="" class="w-100">
                            <h2 class="text-center my-3">{{$s->title}}</h2>
                            <div class="card-footer">
                                <a href="{{route('front.card.show',[$s->title])}}">
                                    <button class="btn btn-primary" style="width: 200px;">عرض الكل</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div style="margin-top: 100px">
                    <p style="width: 100%; text-align: center; margin-top: 200px">لا يوجد سور بعد سيتم الاضافة قريبا</p></div>
            @endif
            <div class="justify-content-center">
               <span> {{ $soura->links() }}</span>
            </div>
        </div>
    </div>
@endsection
