#### $dojah->verification->verify_age(mode, mode_value,first_name,last_name) - Performs age verification

*Age Identity and Verification allows you to confirm and ascertain information summitted by your end users.
With this endpoint, Dojah can help you verify first name, middle name by simply adding it to the request body.
Information Required; Phone Number OR Account Number OR BVN*

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $$v_result  =  $dojah->verification->verify_age('phone_number','09069983293','ADEOLA','SEMIU');
    echo $$v_result;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguements*

- `mode`: phone_number, account_number or bvn
- `mode_value`: Value of the selected mode
- `first_name`: First name
-`last_name`: Last name
-`strict (optional)`: Boolean - Defaults to false

*Returns*

```json
{
   "first_name":"ADEOLA",
   "last_name":"SEMIU",
   "date_of_birth":"1993-06-10",
   "verification":true
}
```

#### $dojah->verification->verify_bvn_selfie(cls, bvn, selfie_image) - Verifies customer's selfie with BVN

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $v_result  =  $dojah->verification->verify_bvn_selfie('2222222222','BASE 64 image');
    echo $v_result;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguements*

- `bvn*`: A valid BVN number
- `selfie_image`: Base64 value of the selfie image

*Returns*

```json
{
   "bvn":"2245***7919",
   "date_of_birth":"28-Jun-2000",
   "email":"ISAACTHOMPSONBROWN@YAHOO.COM",
   "enrollment_bank":"058",
   "enrollment_branch":"UNILORIN",
   "first_name":"JOSHUA",
   "gender":"Male",
   "image":"Base 64 replace",
   "last_name":"ISAAC",
   "level_of_account":"Level 2 - Medium Level Accounts",
   "lga_of_origin":"Odo Otin",
   "lga_of_residence":"Ilorin South",
   "marital_status":"Single",
   "middle_name":"THOMPSONBROWN",
   "name_on_card":"ISAAC, THOMPSON O",
   "nationality":"Nigeria",
   "nin":"",
   "phone_number1":"0708***0116",
   "phone_number2":"",
   "registration_date":"21-Mar-2018",
   "residential_address":"24, OSHODI SURULERE, ILORIN",
   "state_of_origin":"Osun State",
   "state_of_residence":"Kwara State",
   "title":"Mr",
   "watch_listed":"NO",
   "selfie_verification":{
      "confidence_value":99.81217956542969,
      "match":true
   }
}
```

#### $dojah->verification->verify_nin_selfie(nin, selfie_image): - Verify selfie with NIN

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $v_result = $dojah->verification->verify_nin_selfie('2222222222','BASE 64 image');
    echo $v_result;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguements*

- `nin`: The bank verification number to lookup
- `selfie_image` : Base64 string of the image to verify

*Returns*

```json
{
   "birth_country":"nigeria",
   "birth_date":"10-06-1993",
   "birth_lga":"Idanre",
   "birth_state":"Ondo",
   "central_id":"6331271",
   "educational_level":"secondary",
   "email":"None",
   "employment_status":"unemployed",
   "first_name":"John",
   "gender":"m",
   "height":"****",
   "maiden_name":"None",
   "marital_status":"single",
   "middle_name":"Chinwe",
   "nationality":"nigeria",
   "nok_address_1":"NO 212 BROAD STREET ISALU QUARTERS II ODODE IDANRE",
   "nok_address_2":[],
   "nok_first_name":"John Mrs",
   "nok_lga":"Idanre",
   "nok_state":"Ondo",
   "nok_surname":"SALIU",
   "nok_town":"IDANRE",
   "origin_lga":"Idanre",
   "origin_place":"IDANRE",
   "origin_state":"Ondo",
   "picture":"Base 64 replace",
   "profession":"STUDENT",
   "reference":"925e9d82-d1b7-4750-8fd4-2ccae34fc174",
   "religion":"islam",
   "residence_address":"NO 212 BROAD STREET ISALU QUARTERS II ODODE IDANRE",
   "residence_lga":"Idanre",
   "residence_state":"Ondo",
   "residence_status":"birth",
   "residence_town":"IDANRE",
   "signature":"/9j/4AAQSkZJRgABAQEAlgCWAAD/2wBDAAgGBgcGBQgHBwcJCQgKD........",
   "spoken_language":"YORUBA",
   "surname":"Doe",
   "telephone":"0812345678",
   "title":"mr",
   "selfie_verification":{
      "confidence_value":99.90354919433594,
      "match":true
   }
}
```

#### $dojah->verification->verify_photoid_selfie(photo_id, selfie_image, last_name, first_name) - Verifies an individual's identity using their photo id and a selfie image

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $v_result  =  $dojah->verification->verify_photoid_selfie('base 64','BASE 64 image');
    echo $v_result;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguements*

- `photo_id*`: Base 64 value of the photoId image
- `selfie_image`: Base 64 value of the selfie image

*Returns*

```json
{
   "selfie":{
      "age_range":"22-34 Years",
      "card_type":"Driver's License",
      "confidence_value":99.30563354492188,
      "match":true,
      "photoId_glare":true,
      "photoId_image_blurry":false,
      "selfie_glare":true,
      "selfie_image_blurry":false,
      "sunglasses":false
   },
   "last_name":{
      "match":false,
      "last_name":"John",
      "confidence_value":80
   },
   "first_name":{
      "match":true,
      "first_name":"Doe",
      "confidence_value":100
   }
}
```