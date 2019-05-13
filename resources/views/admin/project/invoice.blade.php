<style>
  @media print{
    #PrintDiv{
        display:none !important;
    }
}
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="portlet-body form">
                <div class="invoiceWrap" style="background: #fff;padding: 20px;color: #000;margin-bottom: 20px;width:100%;height: 180px;">
                    <div class="invoiceHead">
                        <div class="row">
                            <div class="col-md-4" style="width:160px;float:left;">
                               <h3>Invoice</h3> 
                            </div>
                            <div class="col-md-4">
                               <img class="logo" class="center" src="{{url('images/igniter-logo2.png')}}" style="width:160px;float:left;"> 
                            </div>
 
                            <div class="col-md-4" style="width:200px;float:right">
                                <ul class="invoiceList" style="list-style-type: none;padding-left: 0;float: right;">
                                    <li style="display: inline-block;">
                                        <ul class="invoicesubList" style="list-style-type: none;padding-left: 0">
                                            <li style="display: block;padding: 0 20px;">+91-8840086174</li>
                                            <li style="display: block;padding: 0 20px;">info@igniterpro.com</li>
                                            <li style="display: block;padding: 0 20px;">www.igniterpro.com</li>
                                            <li style="display: block;padding: 0 20px;">D-295, Indranagar, Lucknow</li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
           
                  <div class="form-body" style="width:100%;">
                    <h3 class="form-section" style="float:left">Bill To:</h3>
                    <div class="row">
                        <table class="table" style="border:none">
                            <tbody>
                            <tr style="padding:10px">
                               
                                <td style="padding:0px 6px 0px 6px" width="20%" ><strong>Name:</strong></td>
                                <td style="padding:0px 6px 0px 6px" width="20%" ><strong>Date Of Issue:</strong></td>
                                <td style="padding:0px 6px 0px 6px" width="20%" ><strong>Email:</strong></td>
                                <td style="padding:0px 6px 0px 6px" width="10%" ><strong>Phone :</strong></td>
                                <td style="padding:0px 6px 0px 6px" width="10%" ><strong>Total Amount :</strong></td>
                              
                            </tr>
                            <tr style="padding:6px">
                               
                                <td style="padding:0px 6px 0px 6px;">{{$projectpayment['project']['client']['name']}}</td>
                                <td style="padding:0px 6px 0px 6px;">{{date('Y-m-d')}}</td>
                                <td style="padding:0px 6px 0px 6px;">{{$projectpayment['project']['client']['email']}}</td>
                                <td style="padding:0px 6px 0px 6px;">{{$projectpayment['project']['client']['phone_code'].'-'.$projectpayment['project']['client']['mobile_number']}}</td>
                             
                                <td style="padding:0px 6px 0px 6px">Rs.{{IND_money_format($projectpayment['project']['project_price'])}}</td>
                                
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-body" style="width:100%;height:250px">
                    <h3 class="form-section">Project Details For - {{$projectpayment['project']['project_name']}}</h3>
                    <div class="row">
                        <table class="table" style="border:1px solid grey">
                            <tbody>
                            <tr style="border: 1px solid grey;">
                             
                                <td style="width:500px;border-top: 1px solid #ddd;"><strong>Project Name:</strong></td>
                               
                                <td style="width:300px;border-top: 1px solid #ddd;" ><strong>Quantity:</strong></td>
                                <td style="width:300px;border-top: 1px solid #ddd;" ><strong>Rate:</strong></td>
                                <td style="width:300px;border-top: 1px solid #ddd;" ><strong>Amount:</strong></td>
                               
                                <td style="width:300px;border-top: 1px solid #ddd;"><strong>Status:</strong></td>
                            </tr>
                            <tr>
                               
                                <td style="width:500px;border-top: 1px solid #ddd;">{{$projectpayment['project']['project_name']}}</td>
                               
                                <td style="width:300px;border-top: 1px solid #ddd;">1</td>
                                <td style="width:300px;border-top: 1px solid #ddd;">Rs. {{IND_money_format($projectpayment['recieved_payment'])}}</td>
                                <td style="width:300px;border-top: 1px solid #ddd;">Rs. {{IND_money_format($projectpayment['recieved_payment'])}}</td>
                                <td style="width:300px;border-top: 1px solid #ddd;">Paid</td>
                               
                            </tr>
                          

                            </tbody>
                        </table>
                        <table style="margin-top: 30px;">
                            <tr style="border:1px solid grey">
                           <td style="width:800px;"></td>
                            <td style="width:250px;"><b>Sub Total</b></td>
                            <td style="width:250px;">Rs. {{IND_money_format($projectpayment['recieved_payment'])}}</td>
                           </tr>
                            <tr style="border:1px solid grey">
                           <td style="width:800px;"></td>
                            <td style="width:250px;"><b>Total(INR)</b></td>
                            <td style="width:250px;">Rs. {{IND_money_format($projectpayment['recieved_payment'])}}</td>
                           </tr>
                        </table>
                    </div>
                </div>
                <a id="PrintDiv" href="{{url('admin/project/'.___encrypt($projectpayment['project']['id'].'/pdf'))}}" class="btn btn-primary print-window"><i class="fa fa-download"></i> Export PDF</a>
        </div>      
    </div>
</div>

@section('requirejs')
<script type="text/javascript">
    $('#PrintDiv').click(function() {
   
    event.target.display = display.hidden;
});
</script>

@endsection
