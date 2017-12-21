[![Build Status](https://travis-ci.org/webfoersterei/domain-bestellsystem-api-client.svg?branch=master)](https://travis-ci.org/webfoersterei/domain-bestellsystem-api-client)

# domain-bestellsystem-api-client
A client to use the XML-SOAP-API of domain-bestellsystem.de (usable for domain-offensive)

## Installation

You can include this library in your project by adding it to your composer dependencies:
```
composer require webfoersterei/domain-bestellsystem-api-client
```

## Usage
```
$domainClient = ClientFactory::createDomainClient(API_URL, API_USER, API_PASSWORD);
$domainClient->check('webfoersterei.de')->isAvailable(); # false
```

## Contribute
Feel free to contribute to this project by reporting bugs and issues or by creating pull requests: https://github.com/webfoersterei/domain-bestellsystem-api-client

Please notice that this is an open source project and you have to agree with the given LICENSE