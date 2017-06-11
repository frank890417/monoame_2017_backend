@extends('layouts.app')

@section('content')
<div class='container'>
  <a href='{!! URL::to('work') !!}'>返回文章列表</a>
  <h1>{{ $title }} </h1>
  <hr>
    <form action="{{ url('work') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class='form-group'>
         <label for="title">標題</label>
         <input name=title id=title class='form-control' value='' placeholder='文章標題'>
       </div>
       <!-- 選擇攤位用的vue元件 -->
       <company-selector></company-selector>
      <div class='form-group'>
        <label for='author'>撰文者</label>
        <input id=author name=author class='form-control'></input>
      </div>
      <div class='form-group'>
        <label for='author'>作品連結</label>
        <input id=link name=link class='form-control'></input>
      </div>
      <div class='form-group'>
        <label for='author'>客戶</label>
        <input id=company name=company class='form-control' ></input>
      </div>
      <div class='form-group'>
        <label for='established_time'>顯示上稿時間</label>
        <input id=established_time name=established_time type='datetime' class='form-control'></input>
      </div>
      <div class='form-group' >
        <label for='company'>封面圖片</label><br>
        <div class="row">
          <div class="col-sm-2">
            <img class='cover_preview' src='' width="100%">
          </div>
          <div class="col-sm-10">
            <input id=cover name=cover class='form-control' style='width: 80%; display: inline-block' value=''></input>
            <br>
            <div class="btn btn-default btn-md btn-dropzone-cover" style='width: 18%; display: inline-block'>上傳圖片</div><br>
          </div>
        </div>  
      </div>
      <div class='form-group'>
         <label for='description'>短版簡介</label>
         <textarea name='description' id='description' style='height: 100px' class='form-control' > </textarea>
      </div>
       <div class='form-group'>
         <div class="btn btn-default btn-md btn-dropzone" style='display:none;'>上傳圖片</div><br>
         <label for='conten'>內容</label><br>
          <textarea name='content' id='content' style='height: 400px' class='form-control' ></textarea> <br>
        <div class='form-group'>
        </div>
        <button type=submit class='btn btn-default btn-md'>新增文章</button>
   </form>

  </div>

  
  <script>
    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    
  </script>

@endsection


@section('require_js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script>
@endsection