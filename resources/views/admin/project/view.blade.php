<div class="page-content-wrapper">
    <div class="page-content">
        <div class="portlet-body form">
                <div class="invoiceWrap" style="background: #0f578a;padding: 20px;color: #fff;margin-bottom: 20px;height: 150px;">
                    <div class="invoiceHead">
                        <div class="row">
                            <div class="col-md-4">
                               <h3>Invoice</h3> 
                            </div>
                            <div class="col-md-4">
                               <img class="logo" src="{{url('images/igniter-logo2.png')}}" style="width:160px;float:left"> 
                            </div>
 
                            <div class="col-md-4" style="width:260px;float:right">
                                <ul class="invoiceList" style="list-style-type: none;padding-left: 0;float: right;">
                                    <li style="display: inline-block;">
                                        <ul class="invoicesubList" style="list-style-type: none;padding-left: 0">
                                            <li style="display: block;padding: 0 20px;">+91-8840086174</li>
                                            <li style="display: block;padding: 0 20px;">info@igniterpro.com</li>
                                            <li style="display: block;padding: 0 20px;">www.igniterpro.com</li>
                                            <li style="display: block;padding: 0 20px;">D-295, Indranagar, Lucknow</li>
                                        </ul>
                                    </li>
                                    {{-- <li>
                                        <ul class="invoicesubList">
                                            
                                            <li>City, State, Country</li>
                                            <li>Zip Code</li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="invoiceInfo" style="border-bottom: 2px solid #ca9345; padding-bottom:10px;">
                               <div class="row">
                                   <div class="col-md-8">
                                       <div class="row">
                                           <div class="col-md-4">
                                              <div class="invoiceTotal"  >
                                                   <span>Bill To:</span>
                                               </div> 
                                               {{-- <ul>
                                                   <li>fsdfsdfsd</li>
                                                   <li>safafafafsadfdsf</li>
                                                   <li>safafafafsadfdsf</li>
                                                   <li>safafafafsadfdsf</li>
                                               </ul> --}}
                                           </div>
                                           <div class="col-md-4">
                                                <div class="invoice-detail" style="margin-bottom: 10px";    >
                                                   <div class="invoiceTotal" style="float: left;">
                                                       <span>Name: </span>
                                                   </div>
                                                   <div>{{$project['client']['name']}}</div>
                                                </div>
                                                <div class="invoice-detail" style="margin-bottom: 10px";    >
                                                   <div class="invoiceTotal" style="float: left;">
                                                       <span>Date Of Issue: </span>
                                                   </div>
                                                   <div>{{date('Y-m-d')}}</div>
                                               </div>
                                               
                                           </div>
                                            <div class="col-md-4">
                                                <div class="invoice-detail" style="margin-bottom: 10px";    >
                                                    <div class="invoiceTotal" style="float: left;">
                                                    <span>Email:</span>
                                                    </div>
                                                    <div >{{$project['client']['email']}}</div>
                                                </div>
                                                <div class="invoice-detail" style="margin-bottom: 10px";    >
                                                    <div class="invoiceTotal" style="float: left;">
                                                    <span>Phone: </span>
                                                    </div>
                                                    <div>{{$project['client']['phone_code'].'-'.$project['client']['mobile_number']}}</div>
                                                </div>
                                            </div>
                                       </div>

                                   </div>
                                    
                                   <div class="col-md-4">
                                        <div class="invoice-total">
                                           <div class="invoiceTotal" style="float: right;">
                                               <span>Total Amount</span>
                                           </div>
                                           <div class="invoice-detail" style="margin-bottom: 10px";    >
                                               <h3><i class="fa fa-rupee"></i>{{IND_money_format($project['project_price'])}}</h3>
                                           </div>
                                       </div>
                                   </div>
                               </div> 
                            </div>
                <div class="form-body">
                    <h3 class="form-section">Project Details For - {{$project['project_name']}}</h3>
                    <div class="row">
                        <table class="table" >
                            <tbody>
                            <tr>
                                {{-- <td width="30%" style="text-align: right;"><strong>Client Name:</strong></td>
                                <td width="30%" style="text-align: right;"><strong>Project Name:</strong></td> --}}
                               {{--  <td width="30%" style="text-align: right;"><strong>Project Type:</strong></td> --}}
                               {{--  <td width="30%" style="text-align: right;"><strong>Project Price:</strong></td> --}}
                                <td width="20%" ><strong>Project Duration:</strong></td>
                                <td width="20%" ><strong>Project Start Date:</strong></td>
                                <td width="20%" ><strong>Project Initial Payment:</strong></td>
                                <td width="10%" ><strong>Project Remaining Payment:</strong></td>
                                {{-- <td width="30%" style="text-align: right;"><strong>Project Agent Name:</strong></td>
                                <td width="30%" style="text-align: right;"><strong>Agent Commission:</strong></td> --}}
                                @if($project['project_price']!=$project['payment']['recieved_payment'])
                                    <td width="10%" ><strong>Project's Next Payment Date:</strong></td>
                                    <td width="10%" ><strong>Project's Next Delivery Date:</strong></td>
                                @endif
                                @if($project['project_price']!=$project['payment']['recieved_payment'])
                                    <td width="10%" ><strong>Project's Payment Status:</strong></td>
                                @else
                                    <td width="10%" ><strong>Project's Payment Status:</strong></td>
                                @endif
                            </tr>
                            <tr>
                                {{-- <td width="70%">{{$project['client']['name']}}</td>
                                <td width="70%">{{$project['project_name']}}</td> --}}
                                {{-- <td>{{$project['project_type']}}</td> --}}

                               
                               {{--  <td><i class="fa fa-inr" style="font-size:14px;"></i> {{IND_money_format($project['project_price'])}}</td> --}}
                                <td>{{$project['project_duration']. ' ' .'days'}}</td>
                                <td>{{date('Y-m-d',strtotime($project['project_start_from']))}}</td>
                                <td><i class="fa fa-rupee"></i> {{IND_money_format($project['payment']['recieved_payment'])}}</td>
                                <td><i class="fa fa-rupee"></i> {{IND_money_format($project['project_price']-$project['payment']['recieved_payment'])}}</td>
                               {{--  <td>{{$project['agent']['name']}}</td>
                                <td><i class="fa fa-inr" style="font-size:14px;"></i>{{' '.$project['agent_commission']}}</td> --}}
                                @if($project['project_price']!=$project['payment']['recieved_payment'])
                                    <td>{{date('Y-m-d',strtotime($project['payment']['next_payment']))}}</td>
                                    <td>{{date('Y-m-d',strtotime($project['payment']['next_delivery']))}}</td>
                                @endif
                                @if($project['project_price']!=$project['payment']['recieved_payment'])
                                   <td>Completed</td>
                                @else
                                    <td>Ongoing</td>
                                @endif
                            </tr>
                           
                            <tr>
                                <td width="30%"></td>
                                <td>
                                    <a href="{{url('admin/project/'.___encrypt($project['id'].'/pdf'))}}" class="btn btn-primary print-window"><i class="fa fa-download"></i> Export PDF</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>      
    </div>
</div>
@section('requirejs')
{{-- <script type="text/javascript">
    $('.print-window').click(function() {
    window.print();
});
</script> --}}

@endsection
