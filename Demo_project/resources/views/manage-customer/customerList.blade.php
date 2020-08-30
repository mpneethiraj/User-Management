<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Customer List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
        <style type="text/css">
            #inActive{
                font-size: 10px;
                background-color: #c0c2c5;
                color: #ffffff;
                padding: 2px;
                /* border-radius: 6px; */
                margin: 1px 0px;
                display: inline-block;
                border-top-left-radius: 6px !important;
                border-bottom-right-radius: 6px !important;
           }
            #active{
                font-size: 10px;
                background-color: #34A853;
                color: #ffffff;
                padding: 2px;
                /* border-radius: 6px; */
                margin: 2px 0px;
                display: inline-block;
                border-top-left-radius: 6px !important;
                border-bottom-right-radius: 6px !important;
            }
        </style>
    </head>
    <body>
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="panel panel-color panel-info">
                            <br/>
                                <a href="{{ url('customer-form') }}" class="btn btn-success">Add Customer</a>
                            <br/><br/>
                            <div class="panel-heading" >
                                <h3 class="panel-title form-inline">  My Customer - Total :<span class="badge"> {{ count($customerList) }}</span>
                                </h3> 
                            </div>
                            <div class="panel-body">
                                <div class="card-box">
                                    <table id="customer-list" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email Id</th>
                                                <th>Mobile Number</th>
                                                <th>Status</th>
                                                <th style="width: 300px;">Action</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            @foreach($customerList as $key=>$value)
                                            <tr>
                                                <td>{{$value['name']}}</td>
                                                <td>{{$value['email_address']}}</td>
                                                <td>{{$value['telephone']}}</td>
                                                <td>
                                                    @if($value['status'] == 1)
                                                    <span id="inActive">In-Active</span>
                                                    @elseif($value['status'] == 2)
                                                    <span id="active">Active</span>
                                                    @elseif($value['status'] == 3)
                                                    <span class="deleted">Deleted</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{url('customer-delete')}}/{{$value['id']}}" class="btn-sm btn-danger" >Delete</a>
                                                <a href="{{url('customer-edit')}}/{{$value['id']}}" class="btn-sm btn-warning">View</a>
                                                <a href="{{url('customer-edit')}}/{{$value['id']}}" class="btn-sm btn-info">Edit</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>     
                            </div>
                        </div>
                    </div>                  
                </div>                     
            </div>
        </div>
    </body>
    <script>
        $('#customer-list').DataTable({responsive: !0});
    </script>
</html>
