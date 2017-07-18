  <?php

if ($this->session->flashdata('error')!= '') {?>
<div class="container">
    <?php
    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') .'</div>';?> 
</div>
 <?php } if ($this->session->flashdata('success') != '') { ?>
        <div class="container">
            <?php 
            echo '
            <div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';?>
        </div>
            <?php 
    
}

?>
<!-- Start single page header -->
  <section id="single-page-header">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-left">
              <h2>Contact</h2>
              <p>Let us know what you have in mind</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-right">
              <ol class="breadcrumb">
                  <li><a href="<?= base_url('home')?>">Home</a></li>
                <li class="active">Contact</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- Start contact section  -->
  <section id="contact">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="title-area">
      
              <h2 class="title">Have any Questions?</h2>
              
              <span class="line"></span>
              <p>Do you have any questions? please feel free to share you thoughts.</p>
            </div>
         </div>
         <div class="col-md-12">
           <div class="cotact-area">
             <div class="row">
               <div class="col-md-4">
                 <div class="contact-area-left">
                   <h4>Contact Info</h4>
                   <!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>-->
                   <address class="single-address">
                     <p>No 6 Orafajo-dem street Adekaa, gboko, benue state.</p>
                     <p>contact@patmicrofinancecooperativesocietylimited.com</p>
                     <p>info@patmicrofinancecooperativesocietylimited.com</p>
                     <p>(+238) 08068723980</p>
                     <p>(+238) 08063407450</p>
                     <p>(+238) 07035089913</p>
                   </address> 
                   <div class="footer-right contact-social">
                      <a href="index.html"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>                
                 </div>
               </div>
               <div class="col-md-8">
                 <div class="contact-area-right">
                     <form action="<?= base_url('Customercontrol/contactus')?>" method="POST" class="comments-form contact-form">
                    <div class="form-group">                        
                        <input type="text" class="form-control" placeholder="Full name" name="name" required="" value="<?= set_value('name')?>">
                    </div>
                    <div class="form-group">                        
                        <input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?= set_value('email')?>">
                    </div>
                         
                     <div class="form-group">                        
                         <input type="text" class="form-control" placeholder="Subject" name="subject" required="" value="<?= set_value('subject')?>">
                    </div>
                    <div class="form-group">                        
                        <textarea placeholder="Comment" rows="3" class="form-control" name="comment" required=""></textarea>
                    </div>
                    <button class="comment-btn">Submit Comment</button>
                  </form>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
  </section>
  <!-- End contact section  -->

  <!-- Start google map -->
  <section id="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>
  <!-- End google map -->

