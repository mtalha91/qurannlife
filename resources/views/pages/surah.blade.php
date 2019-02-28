@extends('layouts.default')
@section('content')
    
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
      <div class="my-auto">
      <h3 class="bismillah"><?php echo $bismillah['text_madani']; ?></h3>
      <?php
      
      $surah_info = json_decode($surah_info, true);
      ?>
      <h1>SURAH <span class="text-primary"><?php echo $surah_info['chapter']['name_arabic'] ?> (<?php echo $surah_info['chapter']['name_simple'] ?>)</span></h1>
      
      {{ $paginator->render() }}
      <?php      
      if($surah_urdu != null && $surah_english != null):
        $surah_urdu = json_decode($surah_urdu, true);
        $surah_english = json_decode($surah_english, true);
        for ($i=0; $i < count($surah_english['verses']); $i++):
          $v = $surah_english['verses'][$i];
          $v_urdu = $surah_urdu['verses'][$i]['translations'][0]['text'];
          // echo '<pre>';
          // print_r($v);
          // echo '</pre>';
          ?>
            <div class="col ayat">
              <div class="resume-item d-flex flex-column flex-md-row row">
                <div class="col-12">
                  <a href="{{url()->current()}}/ayat/<?php echo $v['id']; ?>/<?php echo str_replace(":", "-", $v['verse_key']); ?>">
                    <div class="row">
                      <div class="col-2 verse-key"><?php echo $v['verse_key']; ?></div>
                      <div class="col-11">
                          <div class="col-12 arabic" dir="rtl" lang="ar"><?php echo $v['text_madani']; ?></div>
                          <div class="col-12 urdu" dir="rtl" lang="ur"><?php echo $v_urdu; ?></div>
                          <div class="col-12 english"><?php echo $v['translations'][0]['text']; ?></div>
                      </div>
                    </div> 
                  </a>
                  <hr>
                </div>
              </div>                
            </div>
          <?php
          endfor;

        endif;
        ?>
        {{ $paginator->render() }}
      </div>
    </section>

@stop