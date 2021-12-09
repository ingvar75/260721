@extends('layouts.main')

@section('content')
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100" id="chat-container">
            <div class="col-md-5 col-xl-4 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search room..." name="" class="form-control search">

                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts">
                            @foreach ($rooms as $room)
                                <li class="chat-room" data-room-id="{{ $room->id }}">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            @if ($room->avatar)
                                                <img src="{{ Config::get('params.rooms.avatarUrl') }}/{{ $room->avatar }}"
                                                     class="rounded-circle user_img">
                                            @else
                                                <img src="{{ Config::get('params.rooms.defaultChannelAvatar') }}"
                                                     class="rounded-circle user_img">
                                            @endif
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>{{ $room->title }}</span>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-7 col-xl-8 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
                                     class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span>{{ Auth::user()->name }}</span>
                                <p>1767 Messages</p>
                            </div>
                        </div>
                        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                <li><a href="{{ route('profile') }}"><i class="fas fa-user-circle"></i> View profile</a></li>
                                <li data-toggle="modal" data-target="#addRoomModal"><i class="fas fa-plus"></i> Add new room</li>
                                <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <textarea name="message"
                                      id="message-field"
                                      class="form-control type_msg"
                                      placeholder="Type your message..."></textarea>
                            <div class="input-group-append" id="send-message-button">
                                <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoomModalLabel">Add new room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open([
                        'url' => route('createRoom'),
                        'method' => 'post',
                        'id' => 'add-new-room-form',
                        'files' => true,
                    ]) }}

                    {{ Form::label('title', 'Room title') }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Password']) }}

                    {{ Form::label('avatar', 'Choose avatar') }}
                    {{ Form::file('avatar', ['class' => 'form-control']) }}

                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="add-new-room-form">Create</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/chat.js"></script>
    <script>
        $(document).ready(function() {
            $('#chat-container').Chat({
                userId: {{ Auth::user()->id }}
            });
        });
    </script>
@stop
