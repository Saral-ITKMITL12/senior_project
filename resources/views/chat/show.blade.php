@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/chat.css')}}">

<section class="forumbox">




    <div class="messenger">
      <div class="messengerHeaderBox text-center">
        <p class="messengerHeaderText">topic</p>
      </div>
      <div class="messengerList" id="style-1">
        @if(!empty($message))
          @foreach($message as $key => $value)
            @if($value->user_id == auth()->id())
            <div class="text-left">
              <p class="techerName">{{ $value->user_name }}</p>
              <div class="talk-bubble tri-right left-top">
                <div class="talktext">
                  <p>{{ $value->message }}</p>
                </div>
              </div>
            </div>
            @else
            <div class="text-right">
              <p class="techerName">{{ $value->user_name }}</p>
              <div class="talk-bubble-sender tri-right right-top">
                <div class="talktext">
                  @if($value->image != null)
                  <img class="sendImage" src="{{ $value->image }}" alt="">
                  @endif
                  <p>{{ $value->message }}</p>
                </div>
              </div>
            </div>

            @endif
          @endforeach
        @endif

      </div>

      <div class="senderBox">
        <div class="box80">
          <input id="message" class="senderMessage" type="text" name="" value="" data-token="{{ csrf_token() }}" placeholder="พิมพ์ข้อความ..." onkeydown="commentPostEnter()">
        </div>
        <div class="box20">
          <a href="#" class="senderItem">
            <!-- <i class="fa fa-picture-o" aria-hidden="true"></i> -->
          </a>
        </div>
        <div class="box20">
          <a href="#" class="senderItem" onclick="commentPostEnterWithIcon()">
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
          </a>
        </div>
      </div>

    </div>


</section>

@include('chat.chatJS')


@endsection
