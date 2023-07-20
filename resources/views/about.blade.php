@extends('layouts.main')
@section('container')

<!-- about -->
<div class="about">
  <div class="container">
     <div class="row d_flex">
       
        <div class="col-md-6">
           <div class="titlepage">
               <h3>We Are a Dynamic Team Of Esteema</h3><br>
              <p>We Are a Dynamic Team Of Esteema, our goal is to create a platform that can help everyone consistently make changes for the better.</p>
           </div>
        </div>
         <div class="col-md-5 offset-md-1">
           <div class="team_img">
              <figure><img src="images/about-img.png" alt="#"/></figure>
           </div>
        </div>
     </div> 
  </div>
</div>
  <!-- about -->

  <!-- team -->
  <div class="team">
     <div class="container">
        <div class="titlepage">
           <h3>Meet Our Team Members</h3><br>
       </div>

       <div class="row g-4">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item" style="background-color: #171c57;">
                <div class="overflow-hidden">
                    <img class="img-fluid" src="images/rama.png" alt="">
                </div>
                
                <div class="text-center p-3">
                    <h5 class="mb-0">Ramadhan Abelio Nusa Putra </h5>
                    <small style="color: white;">Backend Developer</small>
                </div>
                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;  margin-right: 25px;">
                 <ul class="social_icon">
                    <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                 </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
           <div class="team-item" style="background-color: #171c57;">
               <div class="overflow-hidden">
                   <img class="img-fluid" src="images/donius.png" alt="">
               </div>
               
               <div class="text-center p-3">
                   <h5 class="mb-0">Donius Tamo Ama </h5>
                   <small style="color: white;">Frontend Developer</small>
               </div>
               <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;  margin-right: 25px;">
                <ul class="social_icon">
                   <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
               </div>
           </div>
       </div>
       <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item" style="background-color: #171c57;">
            <div class="overflow-hidden">
                <img class="img-fluid" src="images/diann.png" alt="">
            </div>
            
            <div class="text-center p-3">
                <h5 class="mb-0">Dian Nurcahya Ningrum</h5>
                <small style="color: white;">Frontend Developer</small>
            </div>
            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px; margin-right: 25px;">
             <ul class="social_icon">
                <li><a href="https://www.linkedin.com/in/dian-nurcahya-ningrum-517a65222/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/diannurch/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
             </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
     <div class="team-item" style="background-color: #171c57;">
         <div class="overflow-hidden">
             <img class="img-fluid" src="images/haniva.png" alt="">
         </div>
         
         <div class="text-center p-3">
             <h5 class="mb-0"> Haniva Naina Zein </h5>
             <small style="color: white;">Designation</small>
         </div>
         <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;  margin-right: 25px;">
          <ul class="social_icon">
             <li><a href="https://www.linkedin.com/in/hanivanaina/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
             <li><a href="http://instagram.com/hanivanaina"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
         </div>
     </div>
 </div>
    </div>
     
     
  </div>
  </div>
  <!-- end team -->

@endsection