{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', '職員情報の更新')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>編集</h2>
                <form action="{{ action('Admin\UserController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                            <label class="col-md-2"　for="gender">性　別</label>
                            <input type="radio" name="gender" value="1">女 性
                            <input type="radio" name="gender" value="2">男 性
                            <input type="radio" name="gender" value="3">どちらでもない
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $user_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection