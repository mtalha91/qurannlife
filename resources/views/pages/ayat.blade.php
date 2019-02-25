@extends('layouts.default')
@section('styles')
@endsection

@section('content')
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="bg-image ayat-page" id="main-image">
            <div class="my-auto ayat-section" id="ayat-section">
                <h3 class="bismillah"><?php echo $bismillah['text_madani']; ?></h3>
                <?php        
                $surah_info = json_decode($surah_info, true);
                ?>        
                <?php
                $image_path_url = "";
                if($ayat != null):

                    //$ayat = json_decode($ayat, true);
                    $image_path_url = base_path().'/public/quranimages/quran-' . $verse_key . ".jpg";
                    //dd($image_path_url);
                    // if Aayt/verse image exist then simply display the image.
                    if(!file_exists($image_path_url)):

                        $english = "";
                        $urdu = "";
                        $arabic = $ayat['verse']['text_indopak'];
                        //print_r($ayat['verse']['translations']); 
                        echo "<span class='verse-key'>[".$ayat['verse']['verse_key']."]</span>";
                        echo "<h2 dir='rtl' lang='ar' class='arabic' id='arabic-ayt'>".$ayat['verse']['text_indopak']."</h2>";
                        foreach ($ayat['verse']['translations'] as $translation) { 
                            if($translation['language_name'] == 'urdu'):
                            $urdu = "<h3 dir='rtl' lang='ur' class='urdu' id='urdu-ayt'>".$translation['text']."</h3>";
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
                endif;
                ?>
                <span class="text-primary surah-title"><?php echo $surah_info['chapter']['name_arabic'] ?> (<?php echo $surah_info['chapter']['name_simple'] ?>)</span>
            </div>
        </div>
        <div id="generatedimage" class="my-auto ayat-section">
            <?php
            if(file_exists($image_path_url)):
                ?><img src="<?php echo url("/public/quranimages")."/quran-" . $verse_key . ".jpg"; ?>" alt="Quran Verse" title="Quran Verse"><?php
            endif;
            ?>
        </div>
              
    </section>
    <?php
    if(!file_exists($image_path_url)):
        ?><div class="loader"></div><?php
    endif;
    ?>    
@stop
<?php
if(!file_exists($image_path_url)):
    ?>
    @section('scripts')
        <script>
        <?php
        $ajax_url = url('/generatedimage');
        ?>
        $(function() {
            var div_content = document.querySelector("#main-image");
            var image;
            html2canvas(div_content).then(function(canvas) {
                console.log('html to canvas start');
                //change the canvas to jpeg image
                image = canvas.toDataURL('image/jpeg');
                document.querySelector("#generatedimage").appendChild(canvas);
                $(".loader").hide();
                $(".ayat-page").hide();
                //console.log(image);
                //then call a super hero php to save the image
                //ajax method.
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.post('<?php echo $ajax_url; ?>', {data: image, verse_key: '<?php echo $verse_key; ?>'}, function(res){
                    console.log(res);
                    
                });
            });

        });
        </script>
    @stop
    <?php
else:
    ?>
    @section('scripts')
        <script>
        <?php
        $ajax_url = url('/generatedimage');
        ?>
        $(function() {
            $(".ayat-page").hide();
        });
        </script>
    @stop
    <?php    
endif;
?>