
	<section class="aboutus white-background black" id="one" style="color:white;margin-top: 80px">
	@if(!empty($enquiries))
	    <div class="container">
	         	<div class="row">
	             	<div class="col-md-12 text-center black">
	                 	<h3 class="title">Enquiries SUBMITTED TO <span class="themecolor">US</span></h3>
	            		<p class="a-slog">These are some enquiries submitted to us by the clients and students.</p> 
	             	</div>
	        	</div>
		        <div class="gap">
		             
		        </div>
	        
	        <div class="row about-box">
	         	<tr>
		        @foreach($enquiries as $key => $value)
		        
		        	{{-- <td>{{}}</td> --}}
	         	@endforeach
	            </tr>
	        </div> <!-- /row -->
	         
	         
	         
	         
	    </div>
    

    @else
     	<div class="row">
            <div class="col-md-12 text-center black">
                <h3 class="title">NO enquiries submitted!!!</h3>
            	
            </div>
        </div>
    @endif
</section>


 