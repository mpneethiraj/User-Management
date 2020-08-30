<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Customer Form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.9/datepicker.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" ></script>
        
       <style type="text/css">
           .error{
            color: red;
           }
           
       </style>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-color panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">@if($isAdd) Add @else Update @endif Customer </h2>
                </div>
                <div class="panel-body">
					<ol class="breadcrumb"> 
					   <li class="breadcrumb-item"><a href="{{url('customer-list')}}">Customers</a></li>
					   <li class="breadcrumb-item active"> @if($isAdd) Add @else Update @endif Customer</li>
				    </ol>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{ url('save-customer') }}" method="post" enctype="multipart/form-data" id="customerForm" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="{{$id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label class="control-label m-b-5"> Name </label>
                                            <input type="text" class="form-control m-b-5" placeholder="Enter the Name" name="Name" value="{{ old('name', $customerList['name']) }}">
                                        </div>
                                        <div class="col-md-6 col-sm-6" >
                                            <label class="control-label m-b-5">username</label>
                                            <input type="text" class="form-control m-b-5" placeholder="Enter the username" name="username" value="{{ old('name', $customerList['username']) }}">
                                       
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label class="control-label m-b-5">Email ID</label>
                                            <input id="confirmation_email" type="email" class="form-control valid" placeholder="Enter valid Email ID" value="{{ old('email_address', $customerList['email_address']) }}" name="email">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label class="control-label m-b-5">Mobile Number </label>
                                            <input type="text" class="form-control" placeholder="Enter valid Email ID" value="{{ old('telephone', $customerList['telephone']) }}" name="mobile_number" id="mobile_number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">New Password </label>
                                            <input type="password" autocomplete="off" class="form-control" placeholder="Enter the new password" name="password" id="password">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Confirm Password </label>
                                            <input type="password" autocomplete="off" class="form-control" placeholder="Confirm Password" name="password_confirm" id="password_confirm">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Date of Birth </label>
                                            <input type="date" class="form-control datepicker-autoclose-profile" placeholder="dd-mon-yyyy" name="date_of_birth" value="{{ old('date_of_birth', $customerList['date_of_birth']) }}" id="date_of_birth">
                                         
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">City</label>
                                            <input type="text" class="form-control datepicker-autoclose-profile" placeholder="Enter the city name" name="city" value="{{ old('city', $customerList['city']) }}">
                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">State </label>
                                            <input type="text" class="form-control datepicker-autoclose-profile" placeholder="Enter the state" name="state" value="{{ old('state', $customerList['state']) }}">
                                         
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Country</label>
                                            <input type="text" class="form-control" placeholder="Enter the Country name" name="Country" value="{{ old('country', $customerList['country']) }}">
                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Address</label>
                                            <textarea class="form-control m-b-5" placeholder="Enter the Address" rows="5" name="address" spellcheck="false">{{ old('address', $customerList['address']) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="" style="float: right;">
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="formSubmit">@if($isAdd) @if($isAdd) Add @else Update @endif Customer @else Update @endif 
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
$(document).ready(function () {

    
        $("#customerForm").validate({
            rules: {
                Name: { required: true },
                username: { required: true},
                email: { required: true, email: true },
                mobile_number:{required: true,phonenumber:["required"]},
                password:{required:true, minlength : 5},
                password_confirm: {required: true, minlength : 5,equalTo : "#password"},
                date_of_birth: {required: true, validDate: true},
                city: { required: true},
                state: { required: true},
                Country: { required: true},
                address: { required: true },
            },
            messages:
            {
                Name:{
                    required: "Please enter the name",
                    ruleforname: "Please enter valid name"
                },
                username:
                {
                    required: "Please enter the username",
                    ruleforname: "Please enter valid username"
                },
                email:
                {
                    required: "Please enter valid email id",
                    email: "Please enter valid email id", 
                },
                mobile_number:{
                    required: "Please enter the mobile number",
                    ruleforname: "Please enter valid mobile number", 
                },
                city:{
                    required: "Please enter the city",
                    ruleforname: "Please enter valid city"
                },
                state:{
                    required: "Please enter the state",
                    ruleforname: "Please enter valid state"
                },
                Country:{
                    required: "Please enter the country",
                    ruleforname: "Please enter valid country"
                },
                address:{
                    required: "Please enter the name",
                    ruleforname: "Please enter valid name"
                },
            },
            submitHandler:function(form){
                form.submit();
                $('#customerForm').attr('disabled','disabled');
            }
        });

    $.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) || moment(value,"DD/MMM/YYYY").isValid();
    }, "Please enter a valid date in the format ");

   

    
});
</script>
</body>
</html>
