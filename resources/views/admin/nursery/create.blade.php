@extends('layouts.profile')
       
       {{--profile.blade.phpの@yield('title)に'れんらく帳'を埋め込む --}}
       @section('title','れんらく帳')
       
       {{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
       @section('content')
         <div class="container">
             <div class="row">
                 <div class="col-md-8 mx-auto">
                  <h2>れんらく帳</h2>
                  <form action="{{ action('Admin\NurseryController@create') }}" method="post" enctype="multipart/form-data">
                     
                     @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     
@endsection