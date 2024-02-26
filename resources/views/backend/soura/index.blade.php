@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <div class="card">
                    <div class="card-header text-right">كل السور
                        <span class="float-left">
                        <a href="{{route('soura.create')}}">
                            <button class="btn btn-primary">اضافة سورة</button>
                            </a>
                    </span>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped" style="direction: rtl">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم السورة</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الملف</th>
                                <th scope="col">القارئ</th>
                                <th scope="col">عدد التنزيلات</th>
                                <th scope="col">الحجم</th>
                                <th scope="col">تعديل</th>
                                <th scope="col">حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(count($souras)>0)
                                @foreach($souras as $key =>$soura)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$soura->title}}</td>
                                        <td>{{$soura->description}}</td>

                                        <td>
                                            <audio controls  class="audio-element" id="audio" style="width: 220px" controlsList="nodownload">
                                                <source src="{{asset('storage')}}/{{$soura->file}}" type="audio/ogg">
                                                Your browser does not support this element
                                            </audio>
                                        </td>
                                        <td>{{$soura->category->name}}</td>
                                        <td>{{$soura->download}}</td>
                                        <td>{{$soura->size}}bytes</td>
                                        <td>
                                            <a href="{{route('soura.edit',$soura)}}">
                                                <button class="btn btn-info">تعديل</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('soura.destroy',$soura)}}" method="post"
                                                  onSubmit="return confirm('Do you want to delete?')">@csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">حذف</button>

                                            </form>
                                        </td>


                                    </tr>
                                @endforeach
                            @else

                                <td colspan="9" style="text-align: center">لم يتم اضافة سور بعد</td>
                            @endif

                            </tbody>
                        </table>
                           {{$souras->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
