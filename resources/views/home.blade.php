@extends('layouts.main')
@section('container')

<section id="hero">
  <div class="row">
    <div class="col-md-6">
      <div class="text-center p-5">
        <h1>Build Your  
          <span class="fw-bold">Consistency</span></h1>
        <p class="pt-2">For those of you who are lazy and want to change, consistency is key if you want to change for the better.</p>
      </div>
    </div>
    <div class="hero_image col">
      <img src="./images/hero1.png" alt="hero picture">
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e7e8f5" fill-opacity="1" d="M0,256L80,234.7C160,213,320,171,480,170.7C640,171,800,213,960,224C1120,235,1280,213,1360,202.7L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
</section>
<!-- akhir Hero Section -->


  <!-- content -->
  <div class="content">
     <div class="row">
        <div class="col-md-10 offset-md-1 pt-5">
           <div class="titlepage">
              <h2>Do you want to create good habit that <br> can change your life?</h2>
              <p style="padding-top: 40px; color: #FF6000;">Let’s start with Esteema, build your routine to become the best version of yourself</p>
              <div>
                <a
                  class="btn tombol m-2"
                  href="/login"
                  role="button"
                  target="_blank"
                  rel="noopener"
                  >Login</a
                >
              </div>
           </div>
        </div>
     </div>
  </div>

@endsection