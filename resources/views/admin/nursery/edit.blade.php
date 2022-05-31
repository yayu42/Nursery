@extends('layouts.admin')
@section('cond_title', '園児登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>園児登録</h2>
                <form action="{{ action('Admin\NurseryController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">氏　名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $nursery_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"　for="gender">性　別</label>
                        <input type="radio" name="gender" value="1">女 性
                        <input type="radio" name="gender" value="2">男 性
                        <input type="radio" name="gender" value="3">どちらでもない
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $nursery_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
             </form> 
             <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($nursery_form->histories != NULL)
                                @foreach ($nursery->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection