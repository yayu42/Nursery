{{-- layouts/profle.blade.phpを読み込む --}}
       @extends('layouts.profile')
       
       {{--profile.blade.phpの@yield('title)に'職員情報登録'を埋め込む --}}
       @section('title','Myプロフィール')
       
       {{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
       @section('content')
         <div class="container">
             <div class="row">
                 <div class="col-md-8 mx-auto">
                  <h2>職員情報</h2>
                  <form action="{{ action('Admin\UserController@create') }}" method="post" enctype="multipart/form-data">
                     
                     @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     <div class="form-group row">
                        <label class="col-md-2">氏　名</label>
                        <div class="col-md-10">
                              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2"　for="gender">性　別</label>
                        <input type="radio" name="gender" value="1">女 性
                        <input type="radio" name="gender" value="2">男 性
                        <input type="radio" name="gender" value="3">どちらでもない
                     </div>
                     <div class="form-group{{ $errors->has('birth') || $errors->has('birth_year') || $errors->has('birth_month') || $errors->has('birth_day') ? ' has-error' : '' }}">
                         <label for="birth_year" class="col-md-4 control-label">生年月日</label>
                         <div class="form-group row">
                             <div class="col-md-2">
                                 <select id="birth_year" class="form-control" name="birth_year">
                                     <option value="">----</option>
                                     @for ($i = 1980; $i <= 2005; $i++)
                                     <option value="{{ $i }}"@if(old('birth_year') == $i) selected @endif>{{ $i }}</option>
                                     @endfor
                                 </select>
                                     @if ($errors->has('birth_year'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('birth_year') }}</strong>
                                     </span>
                                     @endif
                             </div>
                             
                             <div class="col-md-2">
                                 <select id="birth_month" class="form-control" name="birth_month">
                                     <option value="">--</option>
                                     @for ($i = 1; $i <= 12; $i++)
                                     <option value="{{ $i }}"@if(old('birth_month') == $i) selected @endif>{{ $i }}</option>
                                     @endfor
                                 </select>
                                 
                                     @if ($errors->has('birth_month'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('birth_month') }}</strong>
                                     </span>
                                     @endif
                             </div>
                             
                             <div class="col-md-2">
                                 <select id="birth_day" class="form-control" name="birth_day">
                                     <option value="">--</option>
                                     @for ($i = 1; $i <= 31; $i++)
                                     <option value="{{ $i }}"@if(old('birth_day') == $i) selected @endif>{{ $i }}</option>
                                     @endfor
                                 </select>

                                     @if ($errors->has('birth_day'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('birth_day') }}</strong>
                                     </span>
                                     @endif
                             </div>
                         </div>
                         
                         <div class="row col-md-6 col-md-offset-4">
                             @if ($errors->has('birth'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('birth') }}</strong>
                             </span>
                             @endif
                         </div>
                     </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection