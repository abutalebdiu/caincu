@extends('backend.layouts.app')
@section('title','Doctors Typies List')
@section('content')



 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Doctors Type List</h4>
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
                                <th class="text-nowrap">Arabic Name</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach($typies as $type)
                            <tr class="odd gradeX">
                                <td width="1%" class="f-w-600 text-inverse">{{ $loop->iteration }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->ar_name }}</td>
                                
                                <td>
                                	
                               	<a href="{{ route('type.edit',$type->id) }}" class="btn btn-xs btn-success">
                            		<i class="fa fa-edit"></i> Edit
                            	</a> 
                            	 
                            	</a> 
                            	<a href="{{ route('type.destroy',$type->id) }}" id="delete" class="btn btn-xs btn-danger">
                            		<i class="fa fa-times"></i> Delete
                            	</a> 


                                </td>
                            </tr>
                            @endforeach
                           
                             
                             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        


@section('customjs')


@endsection
@endsection