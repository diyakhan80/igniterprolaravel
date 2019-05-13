

 <section class="recent-works text-center">
      <div class="container">
        <div class="row">
			<div class="col-md-12 text-center black">
				<h3 class="title">Our<span class="themecolor">Products</span></h3>
				
			</div>
		</div>
          
          <div class="gap"></div>

        <div class="row">
	       @if(!empty($products))
			@foreach($products as $product)
	          <div class="col-sm-4 port-item margin-bottom">
	            <div class="item-img-wrap">
	              <img src="{{url('images/Products/'.$product['image'])}}" class="img-responsive" alt="workimg">
	              <div class="item-img-overlay">
	                <a href="{{url('images/Products/'.$product['image'])}}" >
	                  <span></span>
	                </a>
	              </div>
	            </div>
	            <div class="work-desc">
	              <h3><a href="{{$product['url']}}">{{$product['name']}}</a></h3>
	              {{-- <span>{{$product['name']}}</span> --}}
	            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Show</button>
	            </div>
	          </div> <!-- /portfolio-item -->
	          @endforeach
			@endif
        </div> <!-- /row -->

        
      </div> <!-- /container -->
    </section>
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Modal Header</h4>
	        </div>
	        <div class="modal-body">
	          <p>This is a large modal.</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	</div>