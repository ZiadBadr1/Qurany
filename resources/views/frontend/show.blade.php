@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 50px;text-align: right">
                    <div class="card-header">{{$ringtone->title}}</div>

                    <div class="card-body" style="text-align: center;">
                        <audio controls style="width: 650px" class="audio-element" controlsList="nodownload"  >
                            <source src="/storage/{{$ringtone->file}}" type="audio/ogg">
                            Your browser does not support this element
                        </audio>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('front.soura.download',$ringtone->id)}}" method="post">@csrf
                            <button type="submit" class="btn btn-primary btn-sm" style="width: 180px;border-radius: 10px;">تنزيل</button>
                        </form>

                    </div>

                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>

                </div>
                <table class="table mt-4" border="2">
                    <tr>
                        <td>{{$ringtone->title}}</td>
                        <th>اسم السورة</th>
                    </tr>
                    <tr>
                        <th>الوصف</th>
                        <td>{{$ringtone->description}}</td>
                    </tr>
                    <tr>
                        <th>الامتداد</th>
                        <td>{{$ringtone->format}}</td>
                    </tr>
                    <tr>
                        <th>الحجم</th>
                        <td>{{$ringtone->size}}</td>
                    </tr>
                    <tr>
                        <th>اسم القارئ</th>
                        <td>{{$ringtone->category->name}}</td>
                    </tr>
                    <tr>
                        <th>عدد التنزيلات</th>
                        <td>{{$ringtone->download}}</td>
                    </tr>
                </table>
            </div>
        </div>
@endsection
