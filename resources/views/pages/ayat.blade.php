@extends('layouts.default')
@section('styles')
    <style>
        .bg-image {
            background-image: url({{ url('img/bg-1.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px 10px;
            color: #fff;
            width:100%;
            position: relative;
            margin:auto;
            max-width: 900px;
            min-height: 700px;
        }
        .bg-image h1,.bg-image h2,.bg-image h3,.bg-image h4,.bg-image h5,
        .bg-image h6,.bg-image p,.bg-image span,.bg-image div,span.text-primary.surah-title {
            color: #fff !important;
        }
        span.verse-key {
            display: block;
            margin: auto;
            text-align: center;
        }
        h2.arabic,h3.urdu,h3.english {
            text-align: center;
            margin:8% auto;
        }
        span.text-primary.surah-title {
            display: block;
            text-align: center;
        }

    </style>
@endsection
@section('content')
    {{--<img src="{{ url('img/bg-1.jpg') }}" >--}}

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="bg-image" >
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
          echo "<span class='verse-key'>[".$ayat['verse']['verse_key']."]</span>";
          echo "<h2 class='arabic'>".$ayat['verse']['text_indopak']."</h2>";
          foreach ($ayat['verse']['translations'] as $translation) { 
            if($translation['language_name'] == 'urdu'):
              $urdu = "<h3 class='urdu'>".$translation['text']."</h3>";
              break;
            endif;
          }
          foreach ($ayat['verse']['translations'] as $translation) { 
            
            if($translation['language_name'] == 'english'):
              $english = "<h3 class='english'>".$translation['text']."</h3>";
            endif;
          }
          echo $urdu.$english;
            
        endif;
        ?>
        <span class="text-primary surah-title"><?php echo $surah_info['chapter']['name_arabic'] ?> (<?php echo $surah_info['chapter']['name_simple'] ?>)</span>
      </div>
        </div>
    </section>

@stop