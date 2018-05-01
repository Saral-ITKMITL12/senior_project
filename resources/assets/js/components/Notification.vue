<template>
<li class="nav-item dropdown" >
    <a class="nav-link mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Notification <span class="badge">{{unreads.length}}</span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li>
        <!-- <notification-item v-for="unread in unread"></notification-item> -->

      </li>
    </ul>
</li>
</template>

<script>
    export default {
      props:['unreads', 'userid'],
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.' + this.userid)
              .notification((notification) => {
                  console.log(notification);
              });
        }
    }
</script>
