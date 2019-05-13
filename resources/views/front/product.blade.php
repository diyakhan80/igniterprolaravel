

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
	            <button class="btn btn-default btn-sm">Show</button>
	            </div>
	          </div> <!-- /portfolio-item -->
	          @endforeach
			@endif
        </div> <!-- /row -->

        
      </div> <!-- /container -->
    </section>
 