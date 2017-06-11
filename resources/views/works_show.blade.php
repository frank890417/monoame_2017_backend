@extends('layouts.app')

@section('content') 

  @if (isset($work))
  <div class="container indep_post">
    <div class="row">
      <div class="col-sm-12">
       <!--  <ol class="breadcrumb">
            <li>
              <a href='{!! URL::to('') !!}'>文章列表</a>
            </li>
            <li class="active">
              {{ $work -> title }}</a>
            </li>

        </ol> -->
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-9 col_post">
        <div class="col-sm-12">
          <div class='post_image' style="background-image:url('{{ $work->cover }}');" alt=""></div>
        	<h1>{{ $work->title }}</h1>
          <div class='text-muted'>{{ $work->author }}</div>
          <hr> 
        	<div class='content-area indep_work'>{!! $work->content !!}</div>
        	  @endif

           <a class='btn btn-primary' href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current()}}" target="_blank">分享文章</a>

          <a class='btn btn-link' href="{!! URL::previous() !!}">回上一頁</a>
          <br>
        </div>
        <br>

          <div class='col-sm-12'>

              
                
              <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8&appId=172517206543405";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

              <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5" data-width="100%"></div>
             
          </div>
          <div class="col-sm-12">
            <h2>相關類別文章</h2>
            <hr>
          </div>
         
        </div>
   
      </div>
    </div>
    
@endsection


