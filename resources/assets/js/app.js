
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });



window.onload=function(){
  if ($('#posttable').length>0){
    $('#posttable').DataTable();
  }
}

if (!window.require_js) window.require_js={};

if (window.require_js.tinymce){
  tinymce.init({
  	selector: '#content',
  	api_key: 'ngpn9ha5mk1a69lvgt66jzupekxmd86rn8e1iwjtyw3i3m6c',
    images_upload_url: 'postAcceptor.php',
    images_upload_base_path: '/some/basepath',
    images_upload_credentials: true,
    setup: function (editor) {
      editor.addButton('uploadpic', {
        text: '上傳圖片',
        icon: false,
        onclick: function () {
          $(".btn-dropzone").click();
        }
      });
      editor.addButton('uploadpic_url', {
        text: '插入圖片(連結網址)',
        icon: false,
        onclick: function () {
          var imgurl = prompt("輸入圖片網址", "插入圖片");
          if(imgurl!="" && imgurl ){
            tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');

          }
        }
      });
    },
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | uploadpic | uploadpic_url',
    plugins : "paste",
    theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
    paste_auto_cleanup_on_paste : true,
    paste_preprocess : function(pl, o) {
        // Content string containing the HTML from the clipboard
        // alert(o.content);
        console.log(o.content);
        
        // o.content = $("<p></p>").html(o.content).text();
    },
    paste_postprocess : function(pl, o) {
        // Content DOM node containing the DOM structure of the clipboard
        // alert(o.node.innerHTML);
        o.node.innerHTML = o.node.innerHTML;
    }
  });
}


// Dropzone class:
// var myDropzone = new Dropzone(".dropzone", { url: "/file/post"});
if (window.require_js.dropzone){
  //初始化Dropzone上傳圖片function
  function gen_dz(classname,callback){  
    var myDropzone = new window.Dropzone(classname, {
      url: "http://build.monoame.com/dropzone/upload.php",maxFiles: 1
      ,sending: function(){
        // vm.page_status="圖片上傳中<img src='../img/loadingicon_gold.png' class=loadingspin>";
      }
      ,success: function(evt,res){
        callback(evt,res);
      }
    });
    // myDropzone.createThumbnailFromUrl(file, this.ndata.img, callback, crossOrigin);
    // $("#dropfrontimg").dropzone({ url: "http://citi2016.unitedway.org.tw/dropzone/" });
    myDropzone.on("complete", function(file) {
      myDropzone.removeFile(file);
      setTimeout(function(){
        // vm.page_status="圖片上傳完畢";
      },300);
      
    });
  }

  gen_dz(".btn-dropzone",function(evt,res){
     console.log(res);
     var imgurl=res.replace("/var/www/monoame2017/public/","http://build.monoame.com/dropzone/");
     console.log(imgurl);
     tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');
  });

  gen_dz(".btn-dropzone-cover",function(evt,res){
     console.log(res);
     var imgurl=res.replace("/var/www/monoame2017/public/","http://build.monoame.com/dropzone/");
     console.log(imgurl);
     $("#cover").val(imgurl);
     $(".cover_preview").attr('src',imgurl);
  });

}
