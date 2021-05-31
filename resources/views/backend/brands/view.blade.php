@extends('backend.layouts.app')
@section('title','Product Brands list')
@section('content')



 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Product Brands List</h4>
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
                                <th class="text-nowrap">Slug</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach($brands as $brand)
                            <tr class="odd gradeX">
                                <td width="1%" class="f-w-600 text-inverse">{{ $loop->iteration }}</td>
                                <td>{{ $brand->en_name }}</td>
                                <td>{{ $brand->ar_name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>
                                	@if($brand->status==1)
                                	<p class="btn btn-primary btn-xs">Active</p>
                                	@elseif($brand->status==0)
                                    <p class="btn btn-danger btn-xs">Deactive</p>
                                    @endif
                                </td>
                                <td>
                                	
                               	<a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-xs btn-success">
                            		<i class="fa fa-edit"></i> Edit
                            	</a> 
                            	 
                            	</a> 
                            	<a href="{{ route('brand.destroy',$brand->id) }}" id="delete" class="btn btn-xs btn-danger">
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