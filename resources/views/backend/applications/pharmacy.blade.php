
@extends('backend.layouts.app')
@section('title','Pharmacy List')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Pharmacy List</h4>
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
                        <th class="text-nowrap">mobile No</th>
                        <th class="text-nowrap">address</th>
                        <th class="text-nowrap">status</th>
                        <th class="text-nowrap">varify</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pharmacy as  $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->name_ar }}</td>
                            <td>{{ $data->mobile }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->status ==1?'active':'inactive' }}</td>
                            <td>{{ $data->is_verified==1?'panding': 'approved' }}</td>
                            <td>
                                <a href="#"  class="btn btn-xs btn-aqua" data-toggle="modal" data-target="#exampleModal_{{$data->id}}">
                                    <i class="fa fa-eye"></i> change status
                                </a>


                                <a href="{{route('application.pharmacy.show',$data->id)}}"  class="btn btn-xs btn-aqua">
                                    <i class="fa fa-eye"></i> Show
                                </a>
                                <a href="#" class="btn btn-xs btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('pharmacy.change.update',$data->id)}}" method="post">
                                                @csrf
                                                <div>
                                                    <label for="verify"><b>verify</b></label>
                                                    <select name="is_verified" id="" class="form-control">
                                                        <option value="1" selected>Panding</option>
                                                        <option value="2" selected>Approved</option>
                                                    </select>
                                                </div>
                                                <div class="pt-2 text-right">
                                                    <button type="submit" class="btn btn-aqua">save change</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
