function getHeaderNotifications()
{
    function getHeaderActivities()
    {
        $.cookie.json = true;
        $('.dropdown-toggle').on('click', function () {
            var type = $(this).attr('data-type');
            if (type) {
                var cookie = $.cookie(type);
                if (cookie) {
                    var items = [];
                    // mark all items as 'read'
                    for (var i = 0; i < cookie.length; i++) {
                        items.push({'id': cookie[i]['id'], 'read': true});
                    }
                    $.cookie(type, items, {expires: 2, path: '/dashboard'});
                    $('#js-' + type + '-badge').hide();
                }
            }
        });

        doAjax('/api/notifications/actions/latest', null, function (response) {
            renderActivities(response, 'activities');
        });

        function renderActivities(response, type)
        {
            if (!(response.success || response.data)) {
                return false;
            }

            var items = response['data'];
            if (items.length > 0) {
                $('#js-' + type + '-badge').show();
                $('#js-' + type + '-badge').html(items.length);
                $('#js-'+ type +'-show-heart').css('display','block');

            } else {
                $('#js-' + type + '-badge').hide();
                $('#js-' + type + '-list').html('<li><a><p style="margin-left: 0px; text-align: center">There are no ' + type + '</p></a></li>');
                return false;
            }

            // get the items from cookie
            var cookie = $.cookie(type);

            var total = items.length;
            var cookieItems = [];
            $('#js-' + type + '-list').html('');
            for (var i = 0; i < items.length; i++) {
                var item = items[i];

                var html = '<a href="#">';
                html += '<div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>';
                html += '<div class="mail-contnet m-r-9">' +
                    '<h5>' + item["title"] + '</h5>' +
                    '<span class="mail-desc">' + item["message"] + '</span>' +
                    '<span class="time text-left"> <i class="fa fa-clock-o"></i> ' + item["created_at"] + '</span>' +
                    '</div>';
                html += '</a>';

                // if cookie
                if (cookie) {
                    // find item in cookie
                    for (var j = 0; j < cookie.length; j++) {
                        if (cookie[j]['id'] == item['id'] && cookie[j]['read']) {
                            total--; // decrement total
                            items[i]['read'] = true;
                        }
                    }
                }

                cookieItems.push({'id': items[i]['id'], 'read': items[i]['read']});

                $('#js-' + type + '-list').append(html);
            }

            // update counter
            if (total > 0) {
                $('#js-' + type + '-badge').html(total);
                $('#js-'+ type +'-show-heart').css('display','block');

            } else { // hide if all is read
                // $('#js-' + type + '-badge').hide();
                $('#js-'+ type +'-show-heart').css('display','none');
            }

            $.cookie(type, cookieItems, {expires: 2, path: '/dashboard'});
        }
    }

    function getUnreadNotifications(userId)
    {
        doAjax('/api/notifications/' + userId + '/unread', null, function (response) {
            renderNotificationsTable(response);
        });
    }

    function renderNotificationsTable(response)
    {
        // no need to 'update credit or hide spinner)
        // if it failed - just ignore as it will call again
        if (!(response.success || response.data)) {
            return false;
        }

        var items = response['data'];
        if (items.length > 0) {
            // $('#js-notifications-badge').show();
            $('#js-notifications-badge').html(items.length);
            $('#js-notifications-show-heart').css('display','block');

        } else {
            $('#js-notifications-badge').hide();
            $('#tbl-notifications').find('tbody').html('<tr><td colspan="3" class="text-center">There are currently no notices</td></tr>');
            return false;
        }

        $('#tbl-notifications').find('tbody').html('');
        for (var i = 0; i < items.length; i++) {
            var item = items[i];

            var html = '<tr><td>' + item['created_at'] + '</td>';
            html += '<td>' + item['message'] + '</td>';
            html += '<td><a data-user="' + item['user_id'] + '" data-id="' + item['id'] + '" class="btn btn-xs btn-primary btn-notification-read">Read</a></td></tr>';

            $('#tbl-notifications').find('tbody').append(html);
        }

        registerNotificationRead();
    }

    function registerNotificationRead()
    {
        $('.btn-notification-read').off('click');
        $('.btn-notification-read').on('click', function (e) {
            e.preventDefault();
            BUTTON.loading($(this));

            var userId = $(this).attr('data-user');
            var id = $(this).attr('data-id');
            doAjax('/api/notifications/' + userId + '/read/' + id, null, function (response) {
                renderNotificationsTable(response);
            });
        });
    }

    if ($('#js-notifications') && $('#js-notifications').length > 0) {
        getHeaderActivities();
        getUnreadNotifications($('#js-notifications-badge').attr('data-user'));
    }
}
