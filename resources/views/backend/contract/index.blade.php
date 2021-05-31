@extends('backend.layouts.app')
@section('title','Contract Request  List')
@section('content')



 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Contract Request List</h4>
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
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th width="1%">SL</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Family Name</th>
                                <th class="text-nowrap">Phone</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">City</th>
                                <th class="text-nowrap">Address</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach($contracts as $contract)
                            <tr class="odd gradeX">
                                <td width="1%" class="f-w-600 text-inverse">{{ $loop->iteration }}</td>
                                <td>{{ $contract->name }}</td>
                                <td>{{ $contract->familyname }}</td>
                                <td>{{ $contract->phonenumber }}</td>
                                <td>{{ $contract->email }}</td>
                                <td>{{ $contract->city }}</td>
                                <td>{{ $contract->address }}</td>
                                {{-- <td>
                                	@if($contract->status==1)
                                	<p class="btn btn-primary btn-xs">Active</p>
                                	@elseif($contract->status==0)
                                    <p class="btn btn-danger btn-xs">Deactive</p>
                                    @endif
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$contracts->links()}}
                </div>
            </div>
        </div>
        


@section('customjs')


@endsection
@endsection