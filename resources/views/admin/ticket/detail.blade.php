@extends("layouts.admin.master")

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جزییات تیکت   </h3>

                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="well-l chatroom">
                    <div class="card card-chat rounded m-auto">
                        <form action="{{URL::action('Admin\TicketController@postReply')}}" method="post" class="m-0"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row w-100 m-0" style="padding:1vh 0 2vh">

                                <div class="col-sm-12 p-1">
                                    <div class="bg-light max-cuntent right-chat shadow-sm" style="background:#eee">
                                        <h5 class="font-weight-bold" style="margin:0">
                                            {{ @$ticket->user->name . ' ' . @$ticket->user->family }}
                                        </h5>
                                        <div class="text-dark text-justify">
                                            <p class="m-0" style="white-space: pre-wrap;">{{$ticket->content}}</p>

                                        </div>
                                        <small class="text-secondary smal">
                                            {{jdate('Y/m/d H:i',$ticket->created_at->timestamp)}}
                                        </small>
                                    </div>
                                </div>



                                @foreach($ticket->replies as $row)

                                    <div class="col-sm-12 p-1">
                                        <div class="bg-light max-cuntent right-chat shadow-sm" style="background:#eee">
                                            <h5 class="font-weight-bold" style="margin:0">

                                                @if($row->user_id == null)
                                                    پشتیبانی لندیپر
                                                @else
                                                    {{ @$row->user->name . ' ' . @$row->user->family }}

                                                @endif
                                            </h5>
                                            <div class="text-dark text-justify">
                                                <p class="m-0" style="white-space: pre-wrap;">{{$row->content}}</p>
                                            </div>
                                            <small class="text-secondary smal">
                                                {{jdate('Y/m/d H:i',$row->created_at->timestamp)}}
                                            </small>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                            <div class="position-absolute input-box" style="width: 100% !important;margin-top: 23px;">
                                <div class="bg-white m-0 rounded-0 border" style="position: relative;">
                                    <input type="hidden" name="reply_id" value="{{$ticket->id}}" />
                                    <textarea class="form-control border-0" name="content" id=""
                                              placeholder="نوشتن پیام"></textarea>
                                    <input type="submit" value="ارسال"
                                           class="btn btn-custom btn-success rounded-0" style="position: absolute;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .chatroom {
            background: #FFF
        }

        .chatroom .card-chat {
            padding: 1vh 1vh 7vh 1vh;
        }

        .chatroom .input-box {
            bottom: 0;
            left: 0;
            right: 0;
            background: #ddd;
            height: 6vh;
        }

        .chatroom .input-box textarea {
            height: 6vh;
        }

        .chatroom .right-chat {
            margin-left: auto;
            border-radius: 2vh 0 2vh 2vh;
        }

        .chatroom .left-chat {
            margin-right: auto;
            border-radius: 0 2vh 2vh 2vh;
            text-align: left
        }

        .chatroom .max-cuntent {
            width: 50%;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, .15);
            padding: 1.5vh;
        }

        .chatroom .max-cuntent .smal {
            padding: 1.5vh 0 0 0;
            display: flex;
            font-size: 1.5vh;
        }

        .chatroom .btn-custom {
            left: 0;
            top: 0;
            bottom: 0;
            margin: 0
        }
    </style>


@endsection
