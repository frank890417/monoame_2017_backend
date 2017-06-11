@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style='padding-top: 20px'>
            <div class="panel panel-default">
                <div class="panel-heading">文章列表</div>
                <div class="panel-body">
                    @if (isset($works))
                      <table class='table table-hover' id=worktable>
                        <thead>
                          <th>縮圖</th>
                          <th>標題</th>
                          <th>簡介</th>
                          <th>日期</th>
                          <th>客戶</th>
                          @if (!Auth::guest())
                            <th>最後編輯</th>
                            <th>檢視</th>
                            <th>編輯</th>
                            <th>刪除</th>
                          @endif
                        </thead>
                        @foreach ($works as $id => $work)
                          <tr class=''> 
                            <td> <img src="{{ $work->cover }}" alt="" style="width: 100px"> </td>
                            @if (!Auth::guest())
                              <td> <a href="{!! URL::to('work/').'/'.$work->id.'/edit' !!}" target=''>{{ $work->title }}</a> </td>
                            @else
                              <td> {{ $work->title }} </td>
                            @endif
                            
                            <td> {{ $work->description}}</td>
                            <td> {{ $work->established_time}}</td>
                            <td> {{ $work->company}}</td>
                            

                            


                            @if (!Auth::guest())
                              <td> {{ $work->established_time }} </td>
                              <td> 
                                  <a class='btn btn-default btn-md' href="{!! URL::to('work/'.$work->id) !!}" >瀏覽</a>
                              </td>
                              <td>
                                  <a class='btn btn-default btn-md' href="{!! URL::to('work/'.$work->id.'/edit') !!}" >編輯</a>
                              </td>
                              <td>
                                  <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除文章嗎？")){document.getElementById("delete_work_{{$work->id}}").submit();}'>刪除</button>
                                  <form id='delete_work_{{$work->id}}' action="{{url('work/'.$work->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </form>
                                 
                              </td>
                            @endif
                            
                          </tr>
                        @endforeach
                      </table>
                    @endif
                    @if (Auth::guest())
                      請<a href='{!! url("login") !!}'>登入帳號</a>管理文章
                    @else
                      {{ Auth::user()->name }}，你已成功登入！
                      <a class='btn btn-default' href='{!! URL::to('work/create') !!}'>新增文章</a>
                    @endif

                    <br>

                    
                </div>


            </div>


            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">重要更新</h3>
              </div>
              <div class="panel-body">
                20170310 從雜學校複製格式超快
              </div>
            </div>


        </div>
    </div>
</div>

@endsection入


{{-- send varaibles to JS field --}}

@section('blade_pass_variables')
<script>

</script>
@endsection



@section('require_js_after')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endsection