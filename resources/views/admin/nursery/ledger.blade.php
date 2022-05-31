{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'園児台帳'を埋め込む --}}
@section('cond_title', '園児台帳')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="header-title-area">
            <h1 class="logo">園児台帳</h1>
                <form action="{{ action('Admin\NurseryController@ledger') }}" method="post" enctype="multipart/form-data">
                    
                 @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">在　園　児</label>
                    　　　　<div class="container">
                    　　　　{{--以下は園児の情報を載せられるようにする--}}
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection