
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="portlet-body form">
                <input type="hidden" value="PUT" name="_method">
                <div class="form-body">
                    <h3 class="form-section">View Project</h3>
                    <div class="row">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>User Name:</strong></td>
                                <td>{{$project['user']['name']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Name:</strong></td>
                                <td>{{$project['project_name']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Type:</strong></td>
                                <td>{{$project['project_type']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Price:</strong></td>
                                <td><i class="fa fa-inr" style="font-size:14px;"></i>{{' '.$project['project_price']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Duration:</strong></td>
                                <td>{{$project['project_duration']. ' ' .'days'}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Start Date:</strong></td>
                                <td>{{$project['project_start_from']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Initial Payment:</strong></td>
                                <td>{{$project['payment']['recieved_payment']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Agent Name:</strong></td>
                                <td>{{$project['agent']['name']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Agent Commission:</strong></td>
                                <td><i class="fa fa-inr" style="font-size:14px;"></i>{{' '.$project['agent_commission']}}</td>
                            </tr>
                            <tr>
                                <td width="30%"></td>
                                <td><a href="#" class="btn btn-primary print-window"><i class="fa fa-print"></i> Print</a>
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
<script type="text/javascript">
    $('.print-window').click(function() {
    window.print();
});
</script>
@endsection
