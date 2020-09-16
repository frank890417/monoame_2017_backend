@extends('layouts.app')

@section('content')  
<div class='container'>
  <ol class="breadcrumb">
    <li>
      <a href='{!! URL::to('work') !!}'>文章列表</a>
    </li>
    <li class="active">
      編輯文章</a>
    </li>

  </ol>
  
  <h1>{{ $title }} </h1>
  <hr>
    <form action="{{url('work/'.$work->id)}}" method="post">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <input type="hidden" name="_method" value="put">
        <div class='form-group'>
         <label for="title">標題</label>
         <input name=title id=title class='form-control' value='{{ $work->title }}' placeholder='文章標題'>
       </div>
      <div class='form-group'>
        <label for='author'>撰文者</label>
        <input id=author name=author class='form-control' value='{{ $work->author }}'></input>
      </div>
      <div class='form-group'>
        <label for='author'>作品連結</label>
        <input id=link name=link class='form-control' value='{{ $work->link }}'></input>
      </div>
      <div class='form-group'>
        <label for='company'>客戶</label>
        <input id=company name=company class='form-control' value='{{ $work->company }}'></input>
      </div>
      <div class='form-group'>
        <label for='tags'>類別</label>
        <input id=tags name=tags class='form-control' value='{{ implode(",", (array)json_decode( $work->tags ?? "[]")) }}'></input>
      </div>
      <div class='form-group'>
        <label for='established_time'>顯示上稿時間</label>
        <input id=established_time name=established_time type='datetime' class='form-control' value='{{ $work->established_time }}'></input>
      </div>
      <div class='form-group' >
        <label for='company'>封面圖片</label><br>
        <div class="row">
          <div class="col-sm-2">
            <img class='cover_preview' src='{{ $work->cover }}' width="100%">
          </div>
          <div class="col-sm-10">
            <input id=cover name=cover class='form-control' style='width: 80%; display: inline-block' value='{{ $work->cover }}'></input>
            <br>
            <div class="btn btn-default btn-md btn-dropzone-cover" style='width: 18%; display: inline-block'>上傳圖片</div><br>
          </div>
        </div>  
      </div>
      <div class='form-group'>
         <label for='description'>短版簡介</label>
         <textarea name='description' id='description' style='height: 100px' class='form-control' > {{ $work->description }}</textarea>
      </div>
       <div class='form-group indep_work'>
         <div class="btn btn-default btn-md btn-dropzone" style='display:none;'>上傳圖片</div><br>
         <label for='content'>內容</label><br>
          <textarea name='content' id='content' style='height: 400px' class='form-control ' > {{ $work->content }}</textarea> <br>
        <div class='form-group'>
        </div>
        <button type=submit class='btn btn-default btn-md'>儲存修改</button>
     </form> 
   

    <form action="{{ url('work/'.$work->id) }}" method="post" id='form_delete_work'> 
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      
    </form> 

  </div>
  <script>
    var company_filter="{!! $work->company !!}";
    var cover_url="{!! $work->covwe !!}";
    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    
  </script>
 
@endsection

@section('require_js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script>
@endsection
