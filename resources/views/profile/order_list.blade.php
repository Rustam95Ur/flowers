<table class="table table-bordered">
    <thead class="thead-light">
    <tr>
        <th>#</th>
        <th>{{trans('profile.order.date')}}</th>
        <th>{{trans('profile.order.status')}}</th>
        <th>{{trans('profile.order.total')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                @foreach(trans('profile.payment_status') as $key => $status)
                    @if($order->status == $key)
                       {{$status}}
                    @endif
                @endforeach
            </td>
            <td>{{$order->total}}</td>
            <td>
                <a onclick="order_detail({{$order->id}})"
                   class="btn flosun-button secondary-btn theme-color rounded-0">
                    {{trans('button.view_order')}}
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@if(count($orders) > 0 and $orders->hasPages())
    <div class="row">
        <div class="col-sm-12 col-custom">
            <div class="toolbar-bottom">
                {{$orders->appends(request()->input())->links('vendor.pagination.custom')}}
            </div>
        </div>
    </div>
@endif
