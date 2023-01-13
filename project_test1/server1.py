#simple websockets brocaster
import asyncio
import websockets
clients = [] #to store all connected cleints
member = []
count = []
end = []
lockSign=1
owner=None
lockmember=0
#handler for socket message activities
async def handler(websocket, path):
	global lockSign, owner
	userName='unknown'
	data='unknown'
	answer='unknown'
	if websocket not in clients:
		clients.append(websocket) #append new cleint to the array
	async for message in websocket:
		print(message,'received from client') #print to console
		if message=='遊戲結束':
			for i in range(len(member)-1):
				data=member[i+1]+":"+str(count[i+1])+"分"
				end.append(data)
				end.append(' ')
			await brocast("遊戲結束")
			await brocast(end)
			#await websocket.close()
		else:
			msg = message.split(":")
			if msg[0]=='start':
				if msg[1] not in member:
					member.append(msg[1])
					count.append(0)
				else:
					await brocast("error:"+msg[1]+"/此玩家已登入")
			elif msg[0]=='解答':
				answer=msg[1] 
				lockSign=0
				await brocast(message)
			elif msg[0]=='ans':
				data=msg[1]
				msgdata=data.split("#")
				await brocast("state:"+msgdata[0]+msgdata[1])
				if lockSign > 0:
					await brocast(msg[0]+":"+msgdata[0]+"#沒有搶到答題權")
				else:
					lockSign = 1
					owner=websocket
					await brocast(msg[0]+":"+msgdata[0]+"#搶到答題權")
			elif msg[0]=="結果":
				cnt=msg[1].split("@")
				if cnt[0]=='no':
					lockSign=0
					await websocket.send('end:重新開放搶答')
				else:
					site=member.index(cnt[1])
					count[site]+=1
					await websocket.send('end:出下一題') 
					lockSign=0                
			else:
				await brocast(message)
	
async def brocast(msg):
	print(msg,' brocasting') #print to console

	#iterate the clients
	for websock in clients:
		try:
			await websock.send(msg) #send message to each client
		except websockets.exceptions.ConnectionClosed:
			#remove the client when it disconnects
			print("Client disconnected.  Do cleanup")
			clients.remove(websock)
			#pass

#starts the service and run forever
loop = asyncio.new_event_loop() #get an event loop
asyncio.set_event_loop(loop) #set the event loop to asyncio

loop.run_until_complete(
	websockets.serve(handler, '', 4545) #setup the websocket service and handler
    #websockets.serve(handler, localhost, 4545) #setup the websocket service and handler
	
	) #hook to localhost:4545
  
loop.run_forever() #keep it running
