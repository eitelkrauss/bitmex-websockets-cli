# BitMEX websockets cli

Asynchronous command line app to interact with the BitMEX websockets API.


## Installation
Clone the repository, cd into the folder and run composer install
```bash
composer install
```


## Usage

Run bitmex_websockets_cli.php and then type in terminal:

```bash
subscribe ...
	chat # subscribe to all chats
	chat:1 # subscribe to chat channel 1 (English chat)

	trade # subscribe to all trades (from all instruments)
	trade:XBTUSD # subscribe to XBTUSD trades
```


You can subscribe to as many topics as you wish.
To unsubscribe simply type:

```bash
unsubscribe ...
	chat:1 # will unsubscribe from chat channel 1
```

