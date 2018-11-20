@extends('layouts.default')
@section('content')
    
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
      <div class="my-auto">
      <h1>SURAHS (CHAPTERS)</h1>

      <?php
      $count = 0;
      ?>

      @foreach ($chapters as $s)
        <?php        
        if($count == 0 || $count == 3):
          ?><div class="row"><?php
        endif;
        $count++;
        ?>
          <div class="col-sm"><pre>
          <?php print_r($s); ?>
          </pre></div>
        <?php        
        if($count == 3):
          ?></div><?php
          $count = 0;
        endif;
        
        ?> 
      @endforeach

        <h1 class="mb-0">Clarence
          <span class="text-primary">Taylor</span>
        </h1>
        <div class="subheading mb-5">3542 Berry Street · Cheyenne Wells, CO 80810 · (317) 585-8468 ·
          <a href="mailto:name@email.com">name@email.com</a>
        </div>
        <p class="lead mb-5">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</p>
        <div class="social-icons">
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#">
            <i class="fab fa-github"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </section>

@stop