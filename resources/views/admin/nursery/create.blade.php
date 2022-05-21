{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'デイリーボード'を埋め込む --}}
@section('cond_title', 'デイリーボード')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>メイン ページ</h2>
                <form action="{{ action('Admin\NurseryController@create') }}" method="post" enctype="multipart/form-data">
                    
                 @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">デイリーボード</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('cond_title') }}">
                        </div>
                    </div>
                    <div class="front-group row">
                       <script src=　>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection