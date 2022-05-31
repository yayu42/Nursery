{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

@section('title', '登録済み職員情報一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>職員情報一覧</h2></h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\UserController@add') }}" role="button" class="btn btn-primary">新規登録</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\UserController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">氏　名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">氏　名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $user)
                                <tr>
                                    <th>{{ \Str::limit($user->name, 100) }}</th>
                                        <div>
                                            <a href="{{ action('Admin\UserController@edit', ['id' => $user->id]) }}">編集</a>
                                        </div>
                                         <div>
                                            <a href="{{ action('Admin\UserController@delete', ['id' => $user->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection