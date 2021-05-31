@extends('backend.layouts.app')
@section('title','Product List')
@section('content')



 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Product List</h4>
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
                                <th class="text-nowrap">Product Title</th>
                                <th class="text-nowrap">Product Arabic Title</th>
                                <th class="text-nowrap">Category</th>
                                <th class="text-nowrap">Unit</th>
                                <th class="text-nowrap">Price</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach($products as $product)
                            <tr class="odd gradeX">
                                <td width="1%" class="f-w-600 text-inverse">{{ $loop->iteration }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->ar_title }}</td>
                                 
                                <td>{{ $product->category?$product->category->name:'' }}</td>
                                <td>{{ $product->unit?$product->unit->name:'' }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                	@if($product->status==1)
                                	<p class="btn btn-primary btn-xs">Active</p>
                                	@elseif($product->status==0)
                                    <p class="btn btn-danger btn-xs">Deactive</p>
                                    @endif
                                </td>
                                <td>
                                	
                               	<a href="{{ route('product.edit',$product->id) }}" class="btn btn-xs btn-success">
                            		<i class="fa fa-edit"></i> Edit
                            	</a> 
                            	 
                            	</a> 
                            	<a href="{{ route('product.destroy',$product->id) }}" id="delete" class="btn btn-xs btn-danger">
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