
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="portlet-body form">
                <input type="hidden" value="PUT" name="_method">
                <div class="form-body">
                    <h3 class="form-section">Contact-Us View</h3>
                    <div class="row">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Name:</strong></td>
                                <td>{{$enquiry['name']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>E-mail:</strong></td>
                                <td>{{$enquiry['email']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Phone:</strong></td>
                                <td>{{$enquiry['phone']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Course:</strong></td>
                                <td>{{$enquiry['courses']['course_name']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Location:</strong></td>
                                <td>{{$enquiry['location']}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Comments:</strong></td>
                                <td>{{$enquiry['comments']}}</td>
                            </tr>
                            <tr>
                                <td width="30%"></td>
                                <td><a href="{{url ('admin/contact-us')}}" class="btn btn-primary">Back</a>
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
<!-- <script type="text/javascript">
    $('.print-window').click(function() {
    window.print();
});
</script> -->
@endsection
