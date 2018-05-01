<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
<script type="text/javascript">
var div = $("#style-1");
div.scrollTop(div.prop('scrollHeight'));

var token = $("#message").data('token');

function commentPostEnter() {
  if (event.keyCode == 13) {

    comment_message = $('#message').val();

    csrf = $('meta[name="csrf-param"]').attr('content');

    if (comment_message != '') {

      $.ajax({
        url: "/chat/{{$auction_product_id}}/store",
        type: 'POST',
        data: {
          _method: 'post',
          _token: token,
          message: comment_message,
        },
        dataType: 'json',
      }).done(function(data) {
        // $('#style-1').append(data);
        // div.scrollTop(div.prop('scrollHeight'));// scroll down
        $('#message').val('');
      }).fail(function(error) {
        // alert('error');
        console.log(error)
      });

    }
  }
};

function commentPostEnterWithIcon() {

  comment_message = $('#message').val();

  csrf = $('meta[name="csrf-param"]').attr('content');

  if (comment_message != '') {

    $.ajax({
      url: "/chat/{{ $auction_product_id }}/store",
      type: 'POST',
      data: {
        _method: 'post',
        _token: token,
        message: comment_message,
      },
      dataType: 'json',
    }).done(function(data) {
      // $('#style-1').append(data);
      // div.scrollTop(div.prop('scrollHeight'));// scroll down
      $('#message').val('');
    }).fail(function() {
      alert('error');
    });

  }
};

var pusher = new Pusher('ab9b06c5d191fb9d5156', {
  cluster: 'ap1',
  encrypted: true
});

var channel = pusher.subscribe('eauction');
channel.bind('message', function(data) {
  if(data.auction_product_id == '{{ $auction_product_id }}')
  {
  if(data.user_id == '{{auth()->id()}}'){
    $('#style-1').append(
      '<div class="text-right">'+
      '<p class="techerName">'+data.user_name+'</p>'+
        '<div class="talk-bubble-sender tri-right right-top">'+
          '<div class="talktext">'+
            '<p>'+(data.message)+'</p>'+
          '</div>'+
        '</div>'+
      '</div>'
    );
  }else{
      $('#style-1').append(
        '<div class="text-left">'+
        '<p class="techerName">'+data.user_name+'</p>'+
          '<div class="talk-bubble tri-right left-top">'+
            '<div class="talktext">'+
              '<p>'+(data.message)+'</p>'+
            '</div>'+
          '</div>'+
        '</div>'
      );
    };

    var div = $("#style-1");
    div.scrollTop(div.prop('scrollHeight'));
  }
});
</script>
