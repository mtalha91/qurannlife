@extends('layouts.default')
@section('content')
    
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
      <div class="my-auto">
      <h1>SURAHS (CHAPTERS)</h1>

      <?php
      if($chapters != null):
        $count = 0;
        // echo '<pre>';
        // print_r($chapters['chapters']); 
        // echo '</pre>';
        ?>
      

        @foreach ($chapters['chapters'] as $s)
          <?php        
          if($count == 0 || $count == 3):
            ?><div class="row"><?php
          endif;
          $count++;
          ?>
            <div class="col">
              <div class="resume-item d-flex flex-column flex-md-row sm-4">
                <div class="resume-content mr-auto">
                  <h3 class="mb-0 text-primary"><a href="{{url()->current()}}/chapters/<?php echo $s['id']; ?>"><?php echo $s['name_arabic']; ?></a></h3>
                  <div class="subheading"><?php echo $s['chapter_number']; ?> - <?php echo $s['name_complex']; ?></div>
                  <div><?php echo $s['translated_name']['name']; ?></div>
                  <p>Verses: <?php echo $s['verses_count']; ?></p>
                </div>
                
              </div>
          </div>
          <?php        
          if($count == 3):
            ?></div><?php
            $count = 0;
          endif;
          
          ?> 
        @endforeach
        <?php
        endif;
        ?>
      </div>
    </section>

@stop