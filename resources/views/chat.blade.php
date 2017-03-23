<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chatroom</title>
        <link rel="stylesheet" href="css/app.css"/>
    </head>
    <body>
        <div id="app">
            <h1>Chatroom</h1>
            <chat-log></chat-log>
            <chat-composer></chat-composer>
        </div>

        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' }; </script>
        <script src="js/app.js"></script>
    </body>
</html>
