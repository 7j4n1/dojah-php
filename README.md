#dojahcore-php


php plugin for [Dojah](https://dojah.io/) 


## Installation

```shell
composer require 7j4n1/dojahphp
```
The dojah library reads the configuration keys from your .env file, ensure to add the following in your .env file


```shell
DOJAH_API_KEY = YOUR API KEY
DOJAH_APP_ID = YOUR APP ID
```
The app uses default test credentials if the following keys are not found

> Get your credentials from [dojah](https://dojah.io)

## Instantiate Dojah


```php


$dojah_api = new DojahCore\Dojah();

# to use the general class
$dojah_api->general()->data_plans();

# to use the financial class

$dojah_api->financial()->account_information(account_id);

# to use the identification class

$dojah_api->identification()->validate_bvn(bvn);

```
> The docs folder contains more detailed examples of the services offered.

## Other services supported Includes.

### General Services

- Resolve Nuban
- Get Banks
- Resolve Card Bin
- Airtime Purchase
- Data Purchase 
- Get Data plans
- Get Dojah Balance

### Financial Services
- Account Information
- Account Transactions
- Account Subscriptions
- Earning Structure
- Spending Pattern
- Categorize Transactions
- Send Transactions
- Update Transactions


### Identification Services

- Validate BVN
- Lookup BVN Basic
- Lookup BVN Advance
- Lookup Nuban
- Lookup NIN
- Lookup PhoneNumber 
- Lookup VIN
- Lookup Driver Licence
- Lookup CAC
- Lookup TIN

### Verification Services 

- Verify Age
- Verify BVN with Selfie
- Verify NIN with Selfie
- Verify PhotoId with Selfie


### Messaging Services
- Register Sender ID
- Send Message
- Fetch Sender ID
- Get Message Status
- Send OTP
- Validate OTP


### Wallet Services

- Create Wallet
- Get Wallet Transactions
- Get Wallet Details
- Transfer funds 
- Get Transaction Details
