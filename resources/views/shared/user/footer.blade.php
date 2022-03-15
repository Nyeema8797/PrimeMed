<!--footer-area part start here-->
<footer class="footer-area pt-70 pb-70"> 
    <div class="footer-wave-box">
        <div class="footer-wave footer-animation">

        </div>
    </div>  
    <div class="container">          
        <div class="footer">
            <div class="row">
                <!--<div class="col-md-3">
                    <div class="footer-left">
                        <h4>menu</h4>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="">about us</a></li>
                            <li><a href="">lab info</a></li>
                            <li><a href="">appointment</a></li>
                            <li><a href="">medicine order</a></li>
                            <li><a href="">services</a></li>
                            <li><a href="">contact</a></li>
                        </ul>
                    </div>
                </div>-->
                <div class="col-md-5">
                    <div class="footer-left">
                        <h4>contact form</h4>
                        <form class="" method="post" action="{{action('User\ContactController@save')}}">
                            @csrf
                            <div class="form-group"> <label class="sr-only">Name</label> <input type="text" name="name" class="form-control" required="" id="nameNine" placeholder="Your Name"> </div>
                            <div class="form-group"> <label class="sr-only">Email</label> <input type="email" name="email" class="form-control" required="" id="emailNine" placeholder="Email Address"> </div>
                            <div class="form-group"> <label class="sr-only">Email</label> <input type="text" name="contactNo" class="form-control" required="" id="emailNine" placeholder="Contact No"> </div>
                            <div class="form-group"> <label class="sr-only">Name</label> <textarea class="form-control" name="message" required="" rows="5" id="messageNine" placeholder="Write message"></textarea></div>
                            <button type="submit" class="btn text-center btn-blue">Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-middle">
                        <h4>contact us</h4>
                        <a href="tel:017123457654" class="contact">&nbsp;<i class="fas fa-phone-volume"></i> 017123457654&nbsp;</a>
                        <a href="mailto: primemed@gmail.com" class="email">&nbsp;<i class="fas fa-envelope-open-text"></i> primemed@gmail.com&nbsp;</a></br>
                        <a href="https://www.facebook.com" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com" class="twitter"><i class="fab fa-twitter-square"></i></a>
                        <a href="https://www.whatsapp.com" class="whatsapp"><i class="fab fa-whatsapp-square"></i></a>
                        <a href="https://www.linkedin.com" class="linkedin"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-right">
                        <h4>about-us</h4>
                        <p>first of all we are provide all types of medicine in home delivery.
                            when you visit our website you can get information on medical laboratory how much price each medical test. also we provide ambulance service.
                            you can take favour from our website on live medical help if you need...
                        </p>
                        <!--<a href="">read more</a>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-footer">
                        <p>all copyrights &copy; by masuma zannat chowdhury,ummeh honey khan meem, nyeema islam mumu &amp; sameha sumaita in the year of 2020 &reg;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>