@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <div class="card">
                    <div class="card-header text-right">كل الكروت
                        <span class="float-left">
                        <a href="{{route('card.create')}}">
                            <button class="btn btn-primary">اضافة كارت</button>
                            </a>
                    </span>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped" style="direction: rtl">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم السورة</th>
                                <th scope="col">تعديل</th>
                                <th scope="col">حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(count($cards)>0)
                                @foreach($cards as $key =>$card)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$card->title}}</td>
                                        <td>
                                            <a href="{{route('card.edit',$card)}}">
                                                <button class="btn btn-info">تعديل</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('card.destroy',$card)}}" method="post"
                                                  onSubmit="return confirm('Do you want to delete?')">@csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">حذف</button>

                                            </form>
                                        </td>


                                    </tr>
                                @endforeach
                            @else
                                <td colspan="4" style="text-align: center">لم يتم اضافه اي كروت</td>
                            @endif

                            </tbody>
                        </table>
                        {{$cards->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
