const { defaultsDeep } = require("lodash");

var notifications = [];

const NOTIFICATION_TYPES = {
    follow: 'App\\Notifications\\UserFollowed',
    newPost: 'App\\Notifications\\NewPost',
    newMessage: 'App\\Notifications\\NewMessage'
};


$(document).ready(function() {
    // check if there's a logged in user
    if(Laravel.userId) {
        $.get(`/notifications`, function (data) {
            addNotifications(data, "#notifications");
        });

        // listen to notifications from pusher
        window.Echo.private(`App.User.${Laravel.userId}`)
            .notification((notification) => {
                addNotifications([notification], '#notifications');
            });
    }
});

function addNotifications(newNotifications, target) {
    notifications = _.concat(notifications, newNotifications);
    // show only last 5 notifications
    notifications.slice(0, 10);

    showNotifications(notifications, target);
}

function showNotifications(notifications, target) {
    if(notifications.length) {
        var htmlElements = notifications.map(function (notification) {
            return makeNotification(notification);
        });

        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('text-red-500 text-sm font-thin');
    } else {
        $(target + 'Menu').html('ไม่มีข้อความแจ้งเตือน');
        $(target).removeClass('text-red-500');
    }
}
// Make a single notification string
function makeNotification(notification) {
    var to = routeNotification(notification);
    var notificationText = makeNotificationText(notification);
    return '<a class="mt-1 block text-gray-700 px-2 py-2 border-b border-gray-100  hover:text-red-500" href="' + to + '">' + notificationText + '</a>';
}

// get the notification route based on it's type
function routeNotification(notification) {
    var to = '?read=' + notification.id;
    if(notification.type === NOTIFICATION_TYPES.follow) {
        to = 'home' + to;
    }else if(notification.type === NOTIFICATION_TYPES.newPost) {
        const postId = notification.data.post_id;
        to = 'post/'+ postId + to;
    }else if(notification.type == NOTIFICATION_TYPES.newMessage) {
        const threadId = notification.data.thread_id;
        to = 'messages/'+ threadId + to;
    }
    return '/' + to;
}

// get the notification text based on it's type
function makeNotificationText(notification) {
    var text = '';
    if(notification.type === NOTIFICATION_TYPES.follow) {
        const name = notification.data.follower_name;
        text += '<svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute"  width="20" height="20" viewBox="0 0 20 20"><path d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z"/></svg>'+
        '<p class="ml-6"><strong>'+ name +'</strong> ได้กดติดตามคุณ </p>';
    }else if(notification.type === NOTIFICATION_TYPES.newPost) {
        const name = notification.data.following_name;
        text += '<svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute"  width="24" height="24" viewBox="0 0 24 24"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>'+
        '<p class="ml-6"><strong>'+ name +'</strong> ได้เพิ่มโพสใหม่</p>';
    }else if(notification.type === NOTIFICATION_TYPES.newMessage) {
        const name = notification.data.sender_name;
        text += '<svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute"  width="24" height="24" viewBox="0 0 24 24"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>'+
        '<p class="ml-6"><strong>'+ name +'</strong> ส่งข้อความถึงคุณ</p>';
    }
    return text;
}
