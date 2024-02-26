@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                <div class="card">

                    <div class="card-header text-right">اضافة سورة</div>

                    <div class="card-body">
                        <form action="{{route('soura.store')}}" method="post"  style="direction: rtl" enctype="multipart/form-data">@csrf
                            <div class="form-group text-right">
                                <label>اسم السورة</label>
                                <select name="title" class="form-control @error('title') is-invalid @enderror"
                                        style="margin-bottom: 10px" value="{{old('title')}}">
                                    <option value=""></option>
                                    @foreach(App\Models\SouraCard::all() as $card)
                                        <option value="{{$card->title}}">{{$card->title}}</option>
                                    @endforeach
                                </select>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group text-right" >
                                <label>الوصف</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <label>الملف</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept="audio/*">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <label>اختر القارئ</label>
                                <select class="form-control  @error('category') is-invalid @enderror" name="category_id">
                                    <option value="">اختر القارئ</option>
                                    @foreach(App\Models\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">اضافة</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
