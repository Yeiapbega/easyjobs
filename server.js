// const path = require('path')
const http = require('http')
const express = require('express')
const socketIO = require('socket.io')

// const publicPath = path.join(__dirname, './resources/')
const port = process.env.PORT || 8888;
var app = express()
var server = http.createServer(app)
var io = socketIO(server);

// app.use(express.static(publicPath));

let {generateMessage, generateLocationMessage} = require('./serverUtils/message');

server.listen(port, function()
{
	console.log('listen on PORT '+port)
})

io.of('/chat', function(socket)
{  
	console.log('chat'); 
	socket.emit('wMessage', generateMessage('Admin', 'Welcome to Chat'))
	// socket.broadcast.emit('wMessage', generateMessage('Admin', 'new user joined'))
	socket.on('newMessage', (message) =>
	{
		console.log('Message: ', message)
		io.of('chat').emit('newMessage', generateMessage(message.from, message.text))
		// socket.broadcast.emit('newMessage', 
		// {
		// 	from: message.from,
		// 	text: message.text,
		// 	createdAt: new Date().getTime()
		// })
	})

	socket.on('createLocationMessage', (coords) =>
	{
		io.of('chat').emit('createLocationMessage', generateLocationMessage(coords.from, coords.latitude, coords.longitude))
	})
});

io.on('connection', function(socket)
{
	// console.log('new user connected');	
  	socket.on('disconnect', function()
	{
	   console.log('user disconnected');
	});	
	// socket.on('messageToServer', function(message)
	// {
	// 	console.log(message);
	// 	io.emit('messageToClient', message);
	// });	
});

