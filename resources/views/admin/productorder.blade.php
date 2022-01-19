@extends('admin.base')
@section('base')
{{-- top head  --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">product order list</h4>
                {{-- three dot for option --}}
                <div class="btn-group btn-group-page-header ml-auto">
                    <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="arrow"></div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
            {{-- then last 3 /div --}}


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Feed Activity</div>
                        </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" style="text-align:center" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>address</th>
                                <th>totall item</th>
                                <th>price</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)


                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{$order->address1}}</td>
                                <td>{{$order->productlist->count()}}</td>
                                <td>{{$order->totall}}</td>
                                <td>@if ($order->status==0)
                                    <span class="badge badge-warning">pending</span>
                                    @elseif ($order->status==1)
                                    <span class="badge badge-secondary">approved</span>
                                    @elseif ($order->status==2)
                                    <span class="badge badge-success">delivered</span>
                                    @elseif ($order->status==3)
                                    <span class="badge badge-danger">cancled</span>
                                @endif</td>
                                <td>
                                    <a href="{{Route('showorderdetails',$order->id)}}" class="btn btn-info">show details</a>
                                    @if ($order->status==0)
                                    <form action="{{Route('productapprove',$order->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" value='1' name='status'>
                                        <button type="submit" class="btn btn-success" >approve</button>
                                    </form>
                                    @endif
                                </td>
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

</div>
@endsection
@section('extra_js')
<script >

    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });

</script>

@endsection
