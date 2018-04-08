@extends('layouts.app')
@section('contents')
    @include('message.message')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-warning">Có <span>{{$count_inbox}}</span> tin nhắn của
                            địa chỉ ip
                            này: {{$message->ip}}.</p>
                        <p class="text-danger">Có <span>{{$count_inbox_new}}</span> tin nhắn cchưa đọc.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteAll">Xóa toàn bộ tin
                                nhắn tại địa chỉ IP này</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="5" id="comment" readonly>{{$message->inbox}}</textarea>
                </div>
                <div class="form-group mb-4 text-right">
                    <button class="btn btn-danger" data-toggle="modal" data-target=".delete"><span class="fa fa-trash"></span> Xóa tin nhắn này</button>
                </div>
                @if(isset($messages))
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#STT</th>
                            <th>Địa chỉ IP</th>
                            <th>Lời nhắn</th>
                            <th>Trạng thái</th>
                            <th>Ngày gửi</th>
                            <th>###</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $key=>$val)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$val->ip}}</td>
                                <td>{{str_limit($val->inbox,20 ,'...')}}</td>
                                <td>{!! $val->status == 1 ? '<p class="text-danger">Chưa đọc</p>' : '<p class="text-success">Đã đọc</p>' !!}</td>
                                <td>{!! $val->created_at !!}</td>
                                <td><a href="{{route('view.message', ['id'=>$val->id])}}"><span
                                                class="fa fa-eye"></span></a> <a href="{{route('view.delete', ['id'=>$val->id])}}" onclick="return window.confirm('Are u sure?')"><span
                                                class="fa fa-trash"></span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<div class="mb-3 mt-2 w-50 m-auto">--}}
                    {{--{{Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4")}}--}}
                    {{--{{ $messages->links() }}--}}
                    {{--</div>--}}
                @else
                    <h3>Trống</h3>
                @endif
            </div>
        </div>
    </div>
    <!-- delete all -->
    <div class="modal fade" id="deleteAll">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Xóa tất cả tin nhắn</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Bạn có muốn xóa tất cả tin nhắn không???
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="{{route('view.deleteAll')}}" method="POST">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success">OK</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete a message current -->
    <div class="modal fade delete" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa tin nhắn</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Bạn có muốn xóa tin nhắn này không???
                    <p class="text-warning">{{str_limit($message->inbox,20 ,'...')}}</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="{{route('view.delete', ['id'=>$message->id])}}" method="GET">
                        <button type="submit" class="btn btn-success">OK</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
