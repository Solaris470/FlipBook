<?php

namespace App\Http\Controllers\Front;

use Symfony\Component\HttpFoundation\Session\Session;
use Zip;
use File;
use ZipArchive;
use App\Http\Controllers\Controller;
use App\Models\Flipbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function index(){
        $val['data'] = DB::table('flipbook as fb')
        ->join('flipbook_file as file','fb.id','=','file.FlipBookID')
        ->select('fb.id as idbook','fb.name as namebook','file.ID as idimg','file.Name as imgname','file.Page')
        ->where('file.Page',1)
        ->get();
        // dd($val['data']);
        return view('front.index',$val);
    }

    public function ebook($id){
        $val = DB::table('flipbook as fb')
        ->join('flipbook_file as file','fb.id','=','file.FlipBookID')
        ->select('fb.id as idbook','fb.name as namebook','file.ID as idimg','file.Name as imgname','file.Page')
        ->where('fb.id',$id)
        ->get();
        $path = resource_path('views/output/').$id;
        File::makeDirectory($path, $mode = 0777, true, true);
        $myfile = fopen($path.'/'.$val[0]->idbook.".html", "w") or die("Unable to open file!");
        $txt = "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"style.css\">
    <title>Flipbook</title>
</head>
<body>
    <div id=\"test\">
        <div class=\"test\">
            <div id=\"book\">";
            fwrite($myfile, $txt);
            foreach ($val as $img)
            {
                // dd($img);
                if ($img->Page == 1)
                {
                    $txt = "<div style=\"background:url(".$img->imgname."); background-size:100% 100%;\"></div>";
                    fwrite($myfile, $txt);
                }
                else
                {
                    $txt = "<div style=\"background:url(".$img->imgname."); background-size:cover;\"></div>";
                    fwrite($myfile, $txt);
                }
            }
            $txt = "
            </div>
        </div>
    </div>
    <script src=\"https://kit.fontawesome.com/97a4ddb345.js\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js\"></script>
    <script src=\"turn.js\"></script>
    <script>
        $(document).ready(function(){
            // $('.open').click(function(){
            //     $('#test').css('display','block');
            //     $('#con').css('display','none');
            // });
            // $('#close').click(function(){
                // $('#test').css('display','none');
                // $('#con').css('display','flex');
            // });
            $('#qrcode').click(function(){
                $('#opqrcode').css('display','flex');
                $('#book').css('display','none');
                // $('.tools').css('display','none');
            });
        });
        $('#book').turn({gradient:true,acceleration:true});
    </script>
</body>
</html>";
        fwrite($myfile, $txt);
        fclose($myfile);
        return view('front.ebook',compact('val'));
    }

    public function zipfile($id){
        $zip = new ZipArchive;
    
        $fileName = $id.".zip";
        File::delete(public_path("zip/".$fileName));
    
        if ($zip->open(public_path("zip/".$fileName), ZipArchive::CREATE) === TRUE)
        {
            // Folder files to zip and download
            // files folder must be existing to your public folder
            // $files = File::files(public_path('css'));
            $files['css'] = File::files(public_path('css/output'));
            $files['js'] = File::files(public_path('lib/output'));
            $files['web'] = File::files(resource_path('views/output/'.$id.'/'));
            $files['img'] = File::files(public_path('/images/'.$id));
            
            // dd($files);
                
            // loop the files result
            foreach ($files['css'] as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            foreach ($files['js'] as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            foreach ($files['web'] as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            foreach ($files['img'] as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }   
            $zip->close();
        }
        
        // // Download the generated zip
        return response()->download(public_path("zip/".$fileName));
        // // dd($fileName);
    }

    public function edit($id,$page){
        $val = DB::table('flipbook as fb')
        ->join('flipbook_file as file','fb.id','=','file.FlipBookID')
        ->select('fb.id as idbook','fb.name as namebook','file.ID as idimg','file.Name as imgname','file.Page')
        ->where('fb.id',$id)
        ->where('file.Page',$page)
        ->get();
        return view('front.edit',compact('val'));
    }
}
