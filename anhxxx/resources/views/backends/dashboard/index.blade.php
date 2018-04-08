@extends('layouts.app')
@section('contents')
    @include('message.message')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                <p class="text-danger">Có <span>{{$count_messesage}}</span> tin nhắn chưa đọc.</p>
                <p class="text-info">Có <span>{{isset($ips)?count($ips):0}}</span> địa chỉ ip gửi.</p>
                @if (count($messages))
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
                        @foreach($messages as $key=>$message)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$message->ip}}</td>
                                <td>{{str_limit($message->inbox,20 ,'...')}}</td>
                                <td>{!! $message->status == 1 ? '<p class="text-danger">Chưa đọc</p>' : '<p class="text-success">Đã đọc</p>' !!}</td>
                                <td>{!! $message->created_at !!}</td>
                                <td><a href="{{route('view.message', ['id'=>$message->id])}}"><span
                                                class="fa fa-eye"></span></a> <a
                                            href="{{route('view.delete', ['id'=>$message->id])}}"
                                            onclick="return window.confirm('Are u sure?')"><span
                                                class="fa fa-trash"></span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mb-3 mt-2 w-50 m-auto">
                        {{Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4")}}
                        {{ $messages->links() }}
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <div class="text-center">
                    <h2>Biểu đò trạng thái</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <canvas id="myChart1"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Script jquery -->
    <script src="{{asset('jquery/jquery.js')}}" type="text/javascript"></script>
    <!-- HTML -->
    <script src="{{asset('chart//Chart.min.js')}}"></script>
    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["{{$days[0]}}", "{{$days[1]}}", "{{$days[2]}}", "{{$days[3]}}", "{{$days[4]}}", "{{$days[5]}}", "{{$days[6]}}", "{{$days[7]}}"],
                datasets: [{
                    label: "Số lượt xem trong tuần",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [{{$views[0]}}, {{$views[1]}}, {{$views[2]}}, {{$views[3]}}, {{$views[4]}}, {{$views[5]}}, {{$views[6]}}, {{$views[7]}}],
                }]
            },

            // Configuration options go here
            options: {}
        });
        var ctx = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ["{{$days[0]}}", "{{$days[1]}}", "{{$days[2]}}", "{{$days[3]}}", "{{$days[4]}}", "{{$days[5]}}", "{{$days[6]}}", "{{$days[7]}}"],
                datasets: [{
                    label: "Số lượng ảnh đăng trong tuần qua",
                    backgroundColor: ['rgb(140, 20, 120)',
                        'rgb(255, 99, 0)',
                        'rgb(0, 99, 132)',
                        'rgb(200, 99, 132)',
                        'rgb(200, 0, 132)',
                        'rgb(200, 99, 0)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 200, 200)'],
                    borderColor: 'rgb(255, 99, 132)',
                    data: [{{$pictures[$days[0]]}}, {{$pictures[$days[1]]}}, {{$pictures[$days[2]]}}, {{$pictures[$days[3]]}}, {{$pictures[$days[4]]}}, {{$pictures[$days[5]]}}, {{$pictures[$days[6]]}}, {{$pictures[$days[7]]}}],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
@endsection
