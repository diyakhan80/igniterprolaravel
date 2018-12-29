
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form role="view-project" action="{{url('admin/project/'.___encrypt($project['id']))}}" method="POST" class="horizontal-form">
                {{csrf_field()}}
                <input type="hidden" value="PUT" name="_method">
                <div class="form-body">
                    <h3 class="form-section">View Project</h3>
                    <div class="row">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>User Name:</strong></td>
                                <td></td>
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
                                <td>{{$project['project_price']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Duration:</strong></td>
                                <td>{{$project['project_duration']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Start Date:</strong></td>
                                <td>{{$project['project_start_from']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Project Agent Name:</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Agent Commission:</strong></td>
                                <td>{{$project['agent_commission']}}</td>
                            </tr>
                            <tr>
                                <td width="30%"></td>
                                <td><a href="#" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                
            </form>
            <!-- END FORM-->
        </div>      
    </div>
</div>
@section('requirejs')
@endsection
