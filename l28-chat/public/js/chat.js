$.fn.Chat = function (params) {
    const WS_ADDRESS = 'ws://ws.2607-chat.local:8090';
    const TYPE_MESSAGE = 'message';
    const TYPE_SUBSCRIBE = 'subscribe';

    let container = $(this);
    let properties = {
        webSocket: null,
        userId: params.userId
    };

    let methods = {
        wsConnect: function () {
            properties.webSocket = new WebSocket(WS_ADDRESS);
            console.log(properties.webSocket);
        }
    };

    let events = {
        init: function () {
            container.find('#action_menu_btn').on('click', events.clientMenuToggling);
            container.find('#send-message-button').on('click', events.sendMessage);
            container.find('#message-field').on('keydown', (e) => {
                if ((e.keyCode === 10 || e.keyCode === 13) && (e.ctrlKey || e.metaKey)) {
                    events.sendMessage(e);
                }
            });
        },
        clientMenuToggling: function () {
            container.find('.action_menu').toggle();
        },
        sendMessage: function (e) {
            e.stopPropagation();
            e.preventDefault();

            let input = $(e.currentTarget).parent('.input-group').find('textarea');

            let message = JSON.stringify({
                type: TYPE_MESSAGE,
                data: {
                    text: input.val(),
                    userId: properties.userId,
                    roomId: 6,
                    time: Math.floor(new Date().getTime() / 1000)
                }
            });

            properties.webSocket.send(message);
            input.val('');
        }
    };

    methods.wsConnect();
    events.init();
};
