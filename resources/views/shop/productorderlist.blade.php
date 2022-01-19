@extends('shop.base')
@section('base')
<div class="container py-2 shadow p-3 mb-5 bg-white rounded"><h1>Order list</h1></div>
<div class="container py-2 shadow p-3 mb-5 bg-white rounded">
    <table class="table  " style="border-collapse: separate; border-spacing:0 20px;">
        <thead >
          <tr class="shadow p-3 mb-5 bg-white rounded">
            <th>SL NO</th>
            <th>Tracking id</th>
            <th>item</th>
            <th>total</th>
            <th>order date</th>
            <th>status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($orders as $item)
            <tr class="shadow p-3 mb-5 bg-white rounded ">
                <td>{{$i}}</td>
                <td>{{$item->tracking_id}}</td>
                <td>{{$item->productlist->count()}}</td>
                <td>{{$item->totall}}</td>
                <td>{{$item->created_at->format('d/m/Y')}}</td>
                <td>@if ($item->status==0)
                    <span class="badge badge-warning">pending</span>
                    @elseif ($item->status==1)
                    <span class="badge badge-secondary">approved</span>
                    @elseif ($item->status==2)
                    <span class="badge badge-success">delivered</span>
                    @elseif ($item->status==3)
                    <span class="badge badge-danger">cancled</span>
                @endif</td>
                <td>
                    <a href="{{Route('orderdetails',$item->id)}}" class="btn btn-info">show details</a>
                    @if ($item->status<2)
                    <form class="form-inline" action="{{Route('cancleorder',$item->id)}}" method="POST">
                        @csrf
                        <input type="hidden" value='3' name='status'>
                        <button type="submit" class="btn btn-danger" >cancle order</button>
                    </form>
                    @endif
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
      </table>
</div>
@endsection
