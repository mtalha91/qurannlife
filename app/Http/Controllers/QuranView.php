<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quran;

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
    
    public function surah($surah_id)
    {   
        $urdu_lang = '54';
        $english_lang = '20';

        $bismillah = Quran::getbismillah(1, $urdu_lang);
        $surah_info = Quran::getSurahInfo($surah_id, $english_lang);
        $surah_urdu = Quran::getSurah($surah_id, $urdu_lang);
        $surah_english = Quran::getSurah($surah_id, $english_lang);
        
        return view('pages.surah', ['bismillah' => $bismillah['verses'][0], 'surah_info' => $surah_info, 'surah_urdu' => $surah_urdu, 'surah_english' => $surah_english]);
    }

	public function ayat($surah_id, $ayat_id)
    {
        $urdu_lang = '54';
        $english_lang = '20';

        $bismillah = Quran::getbismillah(1, $urdu_lang);
        $surah_info = Quran::getSurahInfo($surah_id, $english_lang);
        $ayat = Quran::getAyat($surah_id, $ayat_id, $urdu_lang);

        return view('pages.ayat', ['bismillah' => $bismillah['verses'][0], 'surah_info' => $surah_info, 'ayat' => $ayat]);
    }
}
