<footer class="site-footer section-spacing text-center " id="eight">    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="footer-links">
                    <li><a href="javascript:void(0);">About Us</a></li>
                    <li><a href="javascript:void(0);">Terms of Use</a></li> 
                    <li><a href="javascript:void(0);">Privacy Policy</a></li>
                    <li><a href="{{url('/contact')}}">Contact Us</a></li>
                    <li><a href="{{url('/gallery')}}">Gallery</a></li>
                </ul>
            </div>
            
            <div class="col-md-12 text-center"> 
                <ul class="social">
                    <li><a href="{{$social[0]['url']}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{$social[1]['url']}}" target="_blank"><i class="fa fa-twitter "></i></a></li>
                    <li><a href="{{$social[2]['url']}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="whatsapp" href="https://api.whatsapp.com/send?phone=91{{$contact[0]['whatsapp']}}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
            <div class="col-md-12"> <small>&copy; {{date('Y')}} IgniterPro. All rights reserved.</small></div>
        </div>

    </div>
</footer>
