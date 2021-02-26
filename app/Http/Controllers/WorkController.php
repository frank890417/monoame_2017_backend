<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    // 顯示所有文章
    public function index()
    {
        $works = Work::orderBy('id','desc')->get();
        return view('post_manage')
              ->with('works',$works);
    }

    // 顯示單篇文章
    public function show($id)
    {
      $work= Work::find($id);
      return view('works_show')
            ->with('title','文章編輯 - '.$work->title)
            ->with('work',$work);
    }

    //新增文章
    public function create()
    {
      return view('create')
          ->with('title','新增文章');
    }

    //儲存文章 
    public function store()
    {

      $input=Input::all();
      $input['established_time']= date("Y-m-d H:i:s");
      $input['content']=$this->html_cleaner($input['content']) ;
      $tags = explode(",", $input['tags'] ?? '[]');
      $input['tags'] = json_encode($tags );
      $work=Work::create($input);
      $work->save();
      return Redirect::to('work');
    }
  
    //進入編輯文章頁面
    public function edit($id)
    {
      $work=Work::find($id);
      return view('edit')
            ->with('title','編輯-'.$work->title)
            ->with('work',$work);
    }

    public function html_cleaner($str){

      $re = '/style=\".*?\"/';
      $str = preg_replace($re, "", $str) ;
      $re = '/class=\".*?\"/';
      $str = preg_replace($re, "", $str) ;
      $re = '/align=\".*?\"/';
      $str = preg_replace($re, "", $str) ;
      $re = '/lang=\".*?\"/';
      $str = preg_replace($re, "", $str) ;

      $re = '/\<span class="author-p-.*?\"\>(.*?)\<\/span>/';
      preg_match_all($re, $str, $s_matches);
    
      $len=count($s_matches[0]);
      for($i=0;$i<$len;$i++){
          $str=str_replace($s_matches[0][$i],$s_matches[1][$i],$str);   
      }

      $re = '/\<div.*?\"\>(.*?)\<\/div>/';
      preg_match_all($re, $str, $s_matches);
    
      $len=count($s_matches[0]);
      for($i=0;$i<$len;$i++){
          $str=str_replace($s_matches[0][$i],$s_matches[1][$i],$str);   
      }

      $str=str_replace("../../","/",$str);

      return $str;

    }

    //更新文章資料
    public function update($id)
    {
      $input=Input::all();
      $work=Work::find($id);
      $tags = explode(",", $input['tags'] ?? '[]');
      $input['tags'] = json_encode($tags );
      $input['content']=$this->html_cleaner($input['content']) ;
      // dd($input);
      $work->update($input);


      return Redirect::to('work');


    }

    //刪除文章
    public function destroy($id)
    {
        $work = Work::find($id);
        $work->delete();

        return Redirect::to('work');
    }

    public function jsonall(){
        $works = Work::orderBy('id','desc')->get();
        foreach ($works as $work){
          $work->content=str_replace("\"/dropzone","\"https://build.monoame.com/dropzone",$work->content);
        }
        return $works;
    }

}
