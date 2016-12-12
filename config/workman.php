<?php
    return [
        'default'   => [
            'connect' => 'websocket'
        ],
        'connect' => [
            'websocket' => [
                'ip' => '127.0.0.1',
                'port' => '31',
                'workNum' => 4,
            ],
            'tcp' => [
                'ip' => '127.0.0.1',
                'port' => '32',
                'workNum' => 4,
            ],
            'udp'  => [
                'ip' => '127.0.0.1',
                'port' => '33',
                'workNum' => 4,
            ],
            'http'  => [
                'ip' => '127.0.0.1',
                'port' => '34',
                'workNum' => 4,
            ]
        ]
    ];