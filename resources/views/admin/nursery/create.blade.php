{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'デイリーボード'を埋め込む --}}
@section('title', 'デイリーボード')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
            <div class="header-title-area">
                <h2>保育アプリ　仮</h2>
                <form action="{{ action('Admin\NurseryController@create') }}" method="post" enctype="multipart/form-data">
                    
                 @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2"> </label>
                    </div>
                    <div class="front-group row">
                        <a href="https://d870986cce574aa58d646e8695c3aa0e.vfs.cloud9.ap-northeast-1.amazonaws.com/admin/nursery/ledger">
                            <img src="https://gyazo.com/c40903939bb453a6407ebc88d7816e63" alt="園児台帳">
                        </a>
                    </div>
                    
                    {{--以下、・園内連絡・保護者連絡・指導計画・職員登録のリンク作成--}}
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection