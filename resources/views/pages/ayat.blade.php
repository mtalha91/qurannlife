@extends('layouts.default')
@section('content')
    
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
      <div class="my-auto ayat-section" id="ayat-section">
      <h3 class="bismillah"><?php echo $bismillah['text_madani']; ?></h3>
        <?php        
        $surah_info = json_decode($surah_info, true);
        ?>        
        <?php
        
        if($ayat != null):
          $ayat = json_decode($ayat, true);
          $english = "";
          $urdu = "";
          //print_r($ayat['verse']['translations']); 
          echo "<span class='verse-key'>".$ayat['verse']['verse_key']."</span>";
          echo "<h1 class='arabic'>".$ayat['verse']['text_indopak']."</h1>";
          foreach ($ayat['verse']['translations'] as $translation) { 
            if($translation['language_name'] == 'urdu'):
              $urdu = "<h2 class='urdu'>".$translation['text']."</h2>";
              break;
            endif;
          }
          foreach ($ayat['verse']['translations'] as $translation) { 
            
            if($translation['language_name'] == 'english'):
              $english = "<h2 class='english'>".$translation['text']."</h2>";
            endif;
          }
          echo $urdu.$english;
            
        endif;
        ?>
        <span class="text-primary surah-title"><?php echo $surah_info['chapter']['name_arabic'] ?> (<?php echo $surah_info['chapter']['name_simple'] ?>)</span>
      </div>
    </section>

@stop