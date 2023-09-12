@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif

                <div class="card">

                    <div class="card-header text-right">تعديل كارت</div>

                    <div class="card-body">
                        <form action="{{route('card.update',[$card->id])}}" method="post"  style="direction: rtl" enctype="multipart/form-data">@csrf
                            @method('PUT')
                            <div class="form-group text-right" >
                                <label>اسم الكارت</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$card->title}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">تعديل</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
