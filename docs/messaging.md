Messaging
------------


#### $dojah->messaging()->register_sender_id(sender_id):

*Usage*

```php



$dojah = new DojahCore\Dojah();
try {
    $sender_id  = $dojah->messaging()->register_sender_id('Test');
    echo $sender_id;
} catch(Exception $e) {
    echo $e->getMessage(); 
}

```

*Arguements*

- `sender_id`: The sender id to register

*Returns*

```json

{
   "message":""
}
```

#### $dojah->messaging()->fetch_sender_ids()

*Usage*

```php



$dojah = new DojahCore\Dojah();
try {
    $sender_ids  = $dojah->messaging()->fetch_sender_ids();
    echo $sender_ids;
} catch(Exception $e) {
    echo $e->getMessage(); 
}

```

*Arguements*


*Returns*

```json

[
    {
        "sender_id":"",
        "activated": True,
        "createdAt": ""
    
    }
]
```

#### $dojah->messaging()->send_message(sender_id, channel, destination,message, priority=False) - Deliver Transaction message to customer

*Usage*

```php



$dojah = new DojahCore\Dojah();
try {
    $msg  = $dojah->messaging()->send_message("Test", "sms", "09099909878","message",true);
    echo $msg;
} catch(Exception $e) {
    echo $e->getMessage(); 
}

```

*Arguements*
- `sender_id:`   Registered sender Id
- `channel`:     sms or whatsapp
- `destination`: Phone number of recipient
- `message`: Body of message
- `priority`:(optional) Indicates if you want to send in priority mode

*Returns*

```json
{
   "status":"Sent",
   "mobile":"2349099909878",
   "message_id":"dj_e59ceeb2-a880-4f14-8385-c4275a08b552",
   "reference_id":"5490f226-0bf6-4e4c-892a-b06c4d77b6a1"
}
```

#### $dojah->messaging()->get_status(message_id) - Get status of message

*Usage*

```php



$dojah = new DojahCore\Dojah();
try {
    $msg  = $dojah->messaging()->get_status("dj_e59ceeb2-a880-4f14-8385-c4275a08b552");
    echo $msg;
} catch(Exception $e) {
    echo $e->getMessage(); 
}

```

*Arguements*
- `message_id:`   Message Id

*Returns*

```json
{
   "status":"Sent"
}
```

#### $dojah->messaging()->send_$otp(sender_id,destination,channel,expiry=10,length=6, priority=False, $otp=null) - Deliver $otps to your users

*Usage*

```php



$dojah = new DojahCore\Dojah();
try {
    $otp  = $dojah->messaging()->send_otp("sender_id","destination","whatsapp",$expiry=10,$length=6, $priority=false, $otp=null);
    echo $otp;
} catch(Exception $e) {
    echo $e->getMessage(); 
}

```

*Arguements*
- `sender_id:`   The sender Id to associate the message with
- `destination:` The receiver's phone number
- `channel`:  whatsapp, voice or sms
- `expiry` (optional ): Number of minutes before token expires
- `length` (optional): length of token, 4-6 characters, default is 6
- `priority` (optional): Indicate whether to send in priority mode
- `$otp` (optional): The $otp

*Returns*

```json
[
   {
      "reference_id":"40a31bb4-20e8-45ad-b645-294b11dde250",
      "destination":"09069983293",
      "status_id":"dj_88cdabb2-98b8-4f6b-b3bf-2c9f84a0d7c6",
      "status":"voice $otp sent successfully "
   }
]
```

#### $dojah->messaging()->validate_$otp(code, reference_id) - Validaes the token received by the user

*Usage*

```php



$dojah = new DojahCore\Dojah();
try {
    $otp  = $dojah->messaging()->validate_otp('2345','40a31bb4-20e8-45ad-b645-294b11dde250');
    echo $otp;
} catch(Exception $e) {
    echo $e->getMessage(); 
}

```

*Arguements*
- `code:`   The otp code from the user
- `reference_id`: Refrerence Id
*Returns*

```json
{
   "valid":"True"
}
```