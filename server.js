var io = require('socket.io')(8888);
let i = 0;

io.of('/chat', function(socket)
{  
  console.log('chat'); 
});

io.on('connection', function(socket)
{
	console.log('connected');
	socket.on('messageToServer', function(message)
	{
		console.log(message);
		io.emit('messageToClient', message);
	});	

	socket.on('disconnect', function()
	{
	   console.log('user disconnected');
	});
});

