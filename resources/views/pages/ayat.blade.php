@extends('layouts.default')
@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Harmattan|Mada|Markazi+Text|Tajawal|Noto+Sans|Amiri|Scheherazade" rel="stylesheet">
    <style>
        #fonts {
            font-family: 'Mada', sans-serif;
            font-family: 'Tajawal', sans-serif;
            font-family: 'Markazi Text', serif;
            font-family: 'Harmattan', sans-serif;
            font-family: 'Noto Sans', sans-serif;
            font-family: 'Amiri', serif;
            font-family: 'Scheherazade', serif;
        }

        #about{ font-family: 'Noto Sans', sans-serif !important;}


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
            box-sizing: border-box;

        }

        .bg-image h1,.bg-image h2,.bg-image h3,.bg-image h4,.bg-image h5,
        .bg-image h6,.bg-image p,.bg-image span,.bg-image div,span.text-primary.surah-title {
            color: #fff !important;

        }
        h3.bismillah ,h2#arabic-ayt ,span.text-primary.surah-title {
            font-family: 'Noto Sans', sans-serif !important;
        }
        h3#urdu-ayt {
            font-family: 'Noto Sans', sans-serif;
        }
        span.verse-key {
            display: block;
            margin: auto;
            text-align: center;
        }
        h2.arabic,h3.urdu,h3.english {
            text-align: center;
            margin:8% auto;
            line-height: 1.2;
        }
        span.text-primary.surah-title {
            display: block;
            text-align: center;
        }

        .font-line-1{

        }
        .font-line-2 {
            font-size: 35px;
        }

        .font-line-3 {
            font-size: 30px;
        }

        .font-line-4 {
            font-size: 25px;
        }

    </style>
@endsection

@section('content')
    {{--<img src="{{ url('img/bg-1.jpg') }}" >--}}

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="bg-image" id="main-image">
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
          $arabic = $ayat['verse']['text_indopak'];
          //print_r($ayat['verse']['translations']); 
          echo "<span class='verse-key'>[".$ayat['verse']['verse_key']."]</span>";
          echo "<h2 class='arabic' id='arabic-ayt'>".$ayat['verse']['text_indopak']."</h2>";
          foreach ($ayat['verse']['translations'] as $translation) { 
            if($translation['language_name'] == 'urdu'):
              $urdu = "<h3 class='urdu' id='urdu-ayt'>".$translation['text']."</h3>";
              break;
            endif;
          }
          foreach ($ayat['verse']['translations'] as $translation) { 
            
            if($translation['language_name'] == 'english'):
              $english = "<h3 class='english' id='english-ayt'>".$translation['text']."</h3>";
            endif;
          }
          echo $urdu.$english;
            
        endif;
        ?>
        <span class="text-primary surah-title"><?php echo $surah_info['chapter']['name_arabic'] ?> (<?php echo $surah_info['chapter']['name_simple'] ?>)</span>
      </div>
        </div>

    </section>
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <img id="can-img" src="">
    </section>>






@stop

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ url('js/html2canvas.js') }}"></script>

    <script>
        jQuery(document).ready(function () {
            //images_font_init();
           // document.getElementById('main-image').style.fontFeatureSettings = '"Harmattan" 0';

            document.getElementById('main-image').onclick = function() {
                html2canvas(this, {
                    onrendered: draw_content
                });
            }

        });
        function draw_content(canvas) {
            //document.body.appendChild(canvas);
            var img = canvas.toDataURL('image/png', 1.0);
            document.getElementById('can-img').src = img;
        }

        function images_font_init() {
            var divsIds = [];
            divsIds[0] = 'arabic-ayt';
            divsIds[1] = 'urdu-ayt';
            divsIds[2] = 'english-ayt';

            for (i = 0; i <= divsIds.length; i++) {
                switch (get_number_of_line(divsIds[i])){
                    case 1:
                        jQuery('#' + divsIds[i] ).addClass('font-line-1');
                        break;

                    case 2:
                        jQuery('#' + divsIds[i] ).addClass('font-line-2');
                        break;

                    case 3:
                        jQuery('#' + divsIds[i] ).addClass('font-line-3');
                        break;


                    case 4:
                        jQuery('#' + divsIds[i] ).addClass('font-line-4');
                        break;

                    default:
                        jQuery('#' + divsIds[i] ).addClass('font-line-4');
                        break;

                }
            }
        }

        // Helper Function
        function get_number_of_line(elementId) {
            var el = document.getElementById(elementId);
            var divHeight = el.offsetHeight;
            var lineHeight = getLineHeight(el);
            var lines = divHeight / lineHeight;
            return lines;
        }

        // Helper Funtion
        function getLineHeight(element){
            var temp = document.createElement(element.nodeName);
            temp.setAttribute("style","margin:0px;padding:0px;font-family:"+element.style.fontFamily+";font-size:"+element.style.fontSize);
            temp.innerHTML = "test";
            temp = element.parentNode.appendChild(temp);
            var ret = temp.clientHeight;
            temp.parentNode.removeChild(temp);
            return ret;
        }

    </script>
@endsection