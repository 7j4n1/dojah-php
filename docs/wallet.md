Wallet
------------

#### $dojah->wallet->create(dob,phone_number,last_name,first_name,bvn,middle_name)

*Usage*

```php

$dojah = new DojahCore\Dojah();
try{
    $wallet_res =  $dojah->wallet()->create('22-Jan-1998','09069999999','John','Doe');
    echo $wallet_res;
}catch(Exception $e){
    echo $e->getMessage(); 
}

```

*Arguments*

- `dob`: Date of birth (DD-[Jan-Dec]-YYYY)
- `phone_number`: Phone number
- `last_name`: Last name
- `first_name`: First name
- `bvn`(optional): Bank verification number
- `middle_name`(optional):  Middle name


*Returns*

```json
{
   "wallet_id":"d55f1699-d5da-464f-b9ab-6c1dba580db7",
   "wallet_amount":500,
   "account_number":"5877334476",
   "phone_number":"09069999999",
   "bank_name":"VFD MFB"
}
```

#### $dojah->wallet->details(wallet_id):

*Usage*

```php



$dojah = new DojahCore\Dojah();
try{
    $wallet_res =  $dojah->wallet()->details('d55f1699-d5da-464f-b9ab-6c1dba580db7');
    echo $wallet_res;
}catch(Exception $e){
    echo $e->getMessage(); 
}

```

*Arguments*

- `wallet_id`:  The wallet Id


*Returns*

```json
{
   "wallet_id":"d55f1699-d5da-464f-b9ab-6c1dba580db7",
   "wallet_amount":500,
   "account_number":"5877334476",
   "phone_number":"09069999999",
   "bank_name":"VFD MFB"
}
```

#### $dojah->wallet->transfer_funds(amount,recipient_bank_code,recipient_account_number,wallet_id) -  Transfer funds between accounts

*Usage*

```php



$dojah = new DojahCore\Dojah();
try{
    $wallet_res = $dojah->wallet()->transfer_funds('5000','052','0244332222','d55f1699-d5da-464f-b9ab-6c1dba580db7');
    echo $wallet_res;
}catch(Exception $e){
    echo $e->getMessage(); 
}

```

*Arguments*

- `wallet_id`:  The wallet Id
- `recipient_account_number`: Account number to receive the funds
- `recipient_bank_code`: The bank code of the recipient 
- `amount`: The amount to transfer


*Returns*

```json
{
   "wallet_id":"d55f1699-d5da-464f-b9ab-6c1dba580db7",
   "transaction_amount":5000,
   "transaction_type":"",
   "recipient_account_number":"",
   "sender_account_number":"",
   "transaction_remarks": "",
   "transaction_reason": "",
   "transaction_id": "",
   "date_created": ""
}
```


#### $dojah->wallet->transaction(transaction_id) - Get transaction details

*Usage*

```php



$dojah = new DojahCore\Dojah();
try{
    $trans = $dojah->wallet()->transaction('transaction1d');
    echo $trans;
}catch(Exception $e){
    echo $e->getMessage(); 
}

```

*Arguments*

- `transaction_id`:  The transaction Id


*Returns*

```json
{
   "wallet_id":"d55f1699-d5da-464f-b9ab-6c1dba580db7",
   "transaction_amount":5000,
   "transaction_type":"",
   "recipient_account_number":"",
   "sender_account_number":"",
   "transaction_remarks": "",
   "transaction_reason": "",
   "transaction_id": "",
   "date_created": ""
}
```



#### $dojah->wallet->transactions(wallet_id) - Get all transactions

*Usage*

```php



$dojah = new DojahCore\Dojah();
try{
    $trans = $dojah->wallet()->transactions('d55f1699-d5da-464f-b9ab-6c1dba580db7');
    echo $trans;
}catch(Exception $e){
    echo $e->getMessage(); 
}

```

*Arguments*

- `wallet_id`:  Wallet Id


*Returns*

```json
{
   "transactions":[
   ],
   "total":0,
   "previous_page":"",
   "next_page":"",
   "total_pages":1,
   "current_page":1
}
```