# BitMEX websockets cli

Asynchronous command line app to interact with the BitMEX websockets API.


## Installation

```bash
composer install
```


## Usage

```bash
subscribe ...
	chat # subscribe to all chats
	chat:1 # subscribe to chat channel 1 (English chat)

	trade # subscribe to all trades (from all instruments)
	trade:XBTUSD # subscribe to XBTUSD trades
```

