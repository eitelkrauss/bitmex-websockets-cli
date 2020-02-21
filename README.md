# BitMEX websockets cli

Asynchronous command line app to interact with the BitMEX websockets API.


## Installation

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

