@extends('backend.layouts.app')
@section('title','Medicial Tourism Request List')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Medicial Tourism Request List</h4>
                    <div class="panel-heading-btn"> 
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
                            		<i class="fa fa-expand"></i>
                            	</a>
                            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
                            		<i class="fa fa-redo"></i>
                            	</a> 
                            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
                            		<i class="fa fa-minus"></i>
                            	</a> 
                            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
                            		<i class="fa fa-times"></i>
                            	</a> 

                    </div>
                </div>
                <div class="panel-body">
                   <table class="table table-bordered table-hovered">
                            <thead>
                                <tr>
                                  <th>Serial</th>
                                  <th>Customer</th>
                                  <th>Category</th>
                                  <th>Name</th>
                                  <th>Family Name</th>
                                  <th>Phone Number</th>
                                  <th>Email</th>
                                  <th>Country</th>
                                  <th>Service</th>
                                  <th>Status</th>
                                </tr>
                              </thead>  
                              <body>
                                @foreach($medicialtourismrequestes as $service)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $service->user?$service->user->name:'' }}</td>
                                  <td>{{ $service->category?$service->category->name:'' }}</td>
                                  <td>{{ $service->name }}</td>
                                  <td>{{ $service->familyname }}</td>
                                  <td>{{ $service->phonenumber }}</td>
                                  <td>{{ $service->email }}</td>
                                  <td>{{ $service->country?$service->country->name:'' }}</td>
                                  <td>{{ $service->service }}</td>
                                  <td>
                                        @if($service->status==1)
                                        <p class="btn btn-warning btn-sm">Request</p>
                                        @elseif($service->status==2)
                                        <p class="btn btn-success btn-sm"> Accepted </p>
                                        @endif
                                  </td>
                                </tr>
                                @endforeach
                              </body>
                    </table>
                   
                </div>
            </div>
        </div>
        

@section('customjs')


@endsection
@endsection