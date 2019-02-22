<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quran;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

use function is_numeric;

class QuranView extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $chapters = Quran::getallchapters();
        //dd($chapters);
        return view('pages.home', ['chapters' => $chapters]);
    }
    
    public function surah($surah_id,Request $request)
    {
        $page_query = $request->query('page');
        $page =  ( !empty($page_query) && ($page_query != null) && is_numeric($page_query) ) ? $page_query : 1 ;

        $urdu_lang = '54';
        $english_lang = '20';

        $bismillah = Quran::getbismillah(1, $urdu_lang);
        $surah_info = Quran::getSurahInfo($surah_id, $english_lang);
        $surah_urdu = Quran::getSurah($surah_id, $urdu_lang,$page);
        $surah_english = Quran::getSurah($surah_id, $english_lang,$page);

        $info = json_decode($surah_info);
        $paginator = new Paginator(
            range(1,$info->chapter->verses_count), //a fake range of total items, you can use range(1, count($collection)) //collection it self
            $info->chapter->verses_count, //count as in 1st parameter
            50, //items per page
            \Illuminate\Pagination\Paginator::resolveCurrentPage(), //resolve the path //Which is the current page page = ?
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()] // current url where pagination is to applied
        );

        return view('pages.surah',
            ['bismillah' => $bismillah['verses'][0], 'surah_info' => $surah_info,
                'surah_urdu' => $surah_urdu, 'surah_english' => $surah_english , 'paginator' => $paginator]);
    }

	public function ayat($surah_id, $ayat_id)
    {
        $urdu_lang = '54';
        $english_lang = '20';

        $bismillah = Quran::getbismillah(1, $urdu_lang);
        $surah_info = Quran::getSurahInfo($surah_id, $english_lang);
        $ayat = Quran::getAyat($surah_id, $ayat_id, $urdu_lang);

        return view('pages.ayat', ['bismillah' => $bismillah['verses'][0], 'surah_info' => $surah_info, 'ayat' => $ayat, 'surah_id' => $surah_id, 'ayat_id' => $ayat_id]);
    }

    public function generatedimage()
    {            
        if(isset($_POST) && isset($_POST['data'])){

            $data = $_POST['data'];
            $image = base64_decode(explode(",", $data)[1]);
            $image_path_url = base_path().'/public/quranimages/quran-';
            $temp_name = $image_path_url . $_POST['surah_id'] ."-". $_POST['ayat_id'] . ".jpg";
            
            if(file_exists($temp_name)){
                echo $temp_name;
            }else{
                $savefile = @file_put_contents($temp_name , $image);
                if($savefile){
                    echo $temp_name;
                }else{
                    echo "Image not saved";
                } 
            }               
        }
    die();
    }
}
