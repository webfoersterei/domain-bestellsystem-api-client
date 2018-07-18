[![Build Status](https://travis-ci.org/webfoersterei/domain-bestellsystem-api-client.svg?branch=master)](https://travis-ci.org/webfoersterei/domain-bestellsystem-api-client)

# domain-bestellsystem-api-client
A client to use the XML-SOAP-API of domain-bestellsystem.de (usable for domain-offensive)

## Installation

You can include this library in your project by adding it to your composer dependencies:
```
composer require webfoersterei/domain-bestellsystem-api-client
```

## Usage

Just use the factory to create your needed API-client and use it:
```
$domainClient = ClientFactory::createDomainClient(API_URL, API_USER, API_PASSWORD);
$domainClient->check('webfoersterei.de')->isAvailable(); # false
```

### Logging

You can inject your Monolog logger into all clients by telling the factory about it before using the factory:
```
$logger = new \Monolog\Logger('testlogger');
$logger->pushHandler(new \Monolog\Handler\StreamHandler('domain-bestellsystem_info.log', \Psr\Log\LogLevel::INFO)); # will log INFO-messages to a file
ClientFactory::setLogger($logger);
// ... create clients
```

### Debugging

There's a `DebugClientFactory` that sets the SOAP trace-flag and provides a default logger to STDOUT.
You can use it alternatively to the `ClientFactory` to see the low level request and response bodies:

```
$domainClient = DebugClientFactory::createDomainClient(API_URL, API_USER, API_PASSWORD);
$domainClient->check('webfoersterei.de')->isAvailable(); # will produce debug output on stdout
```

## Contribute
Feel free to contribute to this project by reporting bugs and issues or by creating pull requests: https://github.com/webfoersterei/domain-bestellsystem-api-client

Please notice that this is an open source project and you have to agree with the given LICENSE