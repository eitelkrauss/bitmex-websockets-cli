<?php

    require __DIR__ . '/vendor/autoload.php';

    $loop = \React\EventLoop\Factory::create();
    $reactConnector = new \React\Socket\Connector($loop);
    $connector = new \Ratchet\Client\Connector($loop, $reactConnector);
    $input = new \React\Stream\ReadableResourceStream(STDIN, $loop);

    $connector('wss://www.bitmex.com/realtime')
    ->then(function(Ratchet\Client\WebSocket $conn) use ($input){
        $conn->on('message', function(\Ratchet\RFC6455\Messaging\MessageInterface $msg) {
            
            $mensaje = json_decode($msg);
           if(property_exists($mensaje, "data")){
                if($mensaje->data > 0){

                    switch($mensaje->table){
                        
                        case "chat":
                            print $mensaje->data[0]->user . ": " . $mensaje->data[0]->message . PHP_EOL;
                            break;
                        
                        case "tradeBin1m":
                            echo "1min vwap: " . $mensaje->data[0]->vwap . PHP_EOL;
                            break;

                        case "trade":
                            echo "last price: " . $mensaje->data[0]->price . PHP_EOL;
                            break;
                    }    
                }
            }    
            else{
            echo "Received: {$msg}" . PHP_EOL;
	    }
       });


        
        $input->on('data', function($data) use ($conn){

            $data_array = explode(" ", trim($data, "\n"));
			$input_array = array(
					        "op" => $data_array[0],
					        "args" => $data_array[1]
                        );
            $conn->send(json_encode($input_array));
        });








        $conn->on('close', function($code = null, $reason = null) {
            echo "Connection closed ({$code} - {$reason})\n";
        });

    }, function(\Exception $e) use ($loop) {
        echo "Could not connect: {$e->getMessage()}\n";
        $loop->stop();
    });

    $loop->run();
