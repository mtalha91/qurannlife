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
        //$surah = Quran::all();
        $quran = new Quran();        
        $chapters = $quran->getallchapters();
        //dd($chapters);
        //hello
        //
        return view('pages.home', ['chapters' => $chapters]);
    }
	
	public function ayat(Request $request)
    {
        // $flight = App\Flight::where('number', 'FR 900')->first();
        // $flight = App\Flight::find(1);

        return view('ayat', ['ayat' => Quran::findOrFail($id)]);
    }
}
