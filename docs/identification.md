Identification
---------------



#### $dojah->identification()->validate_bvn(bvn, first_name, last_name,dob) - Validates a bvn

*Usage*

```php



$dojah = new DojahCore\Dojah();

try {
    $bvn_result  =  $dojah->identification()->validate_bvn(bvn, first_name, last_name,dob);

    echo $bvn_result;
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `bvn*`: The bank verification number to validate
-  `first_name` : The first_name to validate against the bvn
- `last_name`: The last_name to validate against the bvn
-  `dob` : The date of birth to validate against the bvn yyyy-mm-dd

*Returns*

```json
{
   "bvn":"22468537919",
   "last_name":{
      "confidence_value":100,
      "status":true
   },
   "first_name":{
      "confidence_value":100,
      "status":true
   },
   "date_of_birth":{
      "status":true
   },
   "phone_number":{
      "status":true
   },
   "status":200
}
```
#### $dojah->identification()->lookup_bvn_basic(bvn) - Return details of a particular bvn

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $bvn_details = $dojah->identification()->lookup_bvn_basic('22275036375');
    echo $bvn_details;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `bvn*`: The bank verification number to lookup

*Returns*

```json
{
   "bvn":"22171234567",
   "first_name":"JOHN",
   "last_name":"DOE",
   "middle_name":"AHMED",
   "gender":"Male",
   "date_of_birth":"25-May-1901",
   "phone_number1":"08012345678",
   "image":"BASE 64 IMAGE"
}
```


#### $dojah->identification()->lookup_bvn_advance(bvn) - Validates a bvn

*Usage*

```php



$dojah = new DojahCore\Dojah();

try {
    $bvn_result  =  $dojah->identification()->lookup_bvn_advance(bvn);

    echo $bvn_result;
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `bvn*`: The bank verification number to validate

*Returns*

```json
{
   "bvn":"22171234567",
   "first_name":"JOHN",
   "last_name":"DOE",
   "middle_name":"AHMED",
   "gender":"Male",
   "date_of_birth":"25-May-1901",
   "phone_number1":"08012345678",
   "image":"BASE 64 IMAGE",
   "email":"johndoe@gmail.com",
   "enrollment_bank":"GTB",
   "enrollment_branch":"IKEJA",
   "level_of_account":"LEVEL 2",
   "lga_of_origin":"OSOGBO",
   "lga_of_residence":"IKEJA",
   "marital_status":"SINGLE",
   "name_on_card":"",
   "nationality":"NIGERIAN",
   "nin":"70123456789",
   "phone_number2":"08012345678",
   "registration_date":"",
   "residential_address":"",
   "state_of_origin":"OSUN",
   "state_of_residence":"LAGOS",
   "title":"MISS",
   "watch_listed":"NO"
}
```
#### $dojah->identification()->lookup_nuban(account_number, bank_code) - Return details of a particular bvn

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $bvn_details = $dojah->identification()->lookup_nuban('0222222222','051');
    echo $bvn_details;
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `account_number*`: The account number to lookup
- `bank_code*`: The bank code

*Returns*

```json
{
   "account_currency":"566",
   "account_name":"ADAMU GARBA",
   "account_number":"0012345678",
   "account_type":"10",
   "address_1":"788,Abuja Nigeria,",
   "address_2":"Abuja.",
   "city":"Abuja",
   "country_code":"NG",
   "country_of_birth":"NIGE
RIA",
   "country_of_issue":"Nigeria",
   "dob":"01/01/1980",
   "expiry_date":"",
   "first_name":"Adamu",
   "identity_number":"22200123456",
   "identity_type":"BVN",
   "last_name":"Garba",
   "nationality":"NIGERIA",
   "other_names":"",
   "phone":"
08061234567",
   "postal_code":"",
   "state_code":"Abuja",
   "status":200
}
```

#### $dojah->identification()->lookup_nin(nin) - fetch customers details using the National Identification Number (NIN) of the customer

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $nin_details = $dojah->identification()->lookup_nin('0244338487');

    echo $nin_details; 
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `nin`: The national identification number to lookup

*Returns*

```json
{
   "nin":"70123456789",
   "firstname":"John",
   "middlename":"Doe",
   "surname":"Adamu",
   "maidenname":"",
   "telephoneno":"08011111111",
   "state":"Ekiti",
   "place":"ADO ",
   "profession":"STUDENT",
   "title":"mr",
   "height":"****",
   "email":"",
   "birthdate":"18-05-1901",
   "birthstate":"Ekiti",
   "birthcountry":"nigeria",
   "centralID":"5227000",
   "documentno":"",
   "educationallevel":"",
   "employmentstatus":"",
   "nok_firstname":"Musa",
   "nok_lastname":"Adamu",
   "nok_middlenam
e":"Garba",
   "nok_address1":"FEDERAL UNIVERSITY TECHN",
   "nok_address2":"",
   "nok_lga":"Bosso",
   "nok_state":"Niger",
   "nok_town":"MINNA",
   "nok_postalcode":"",
   "othername":"",
   "pfirstname":"",
   "photo":"/9j/4AAQSkZJRgABAgAAAQABAAD/
2wBDAAgGBgcGBQgHBwcJCQgKDB...",
   "pmiddlename":"",
   "psurname":"",
   "nspokenlang":"YORUBA",
   "ospokenlang":"ENGLISH",
   "religion":"christianity",
   "residence_Town":"IKOTUN EGBE",
   "residence_lga":"Alimosho",
   "residence_state":"Lagos",
   "residencestatus":"birth",
   "residence_AddressLine1":"26 London Street",
   "residence_AddressLine2":"",
   "self_origin_lga":"Alimosho",
   "self_origin_place":"",
   "self_origin_state":"Lagos",
   "signature":"/9j/4AAQSkZJRgABAQEAlgCWAAD/2w
BDAAgGBgcGBQgHBwcJCQg...",
   "nationality":"",
   "gender":"m",
   "trackingId":"S4Y0ABFD50007WS",
   "status":200
}
```

#### $dojah->identification()->lookup_phone_number_basic(phone_number) - Return details of a particular phone number

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $phone_details = $dojah->identification()->lookup_phone_number_basic(phone_number);
    echo $phone_details;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `phone_number`: The phone number to lookup

*Returns*

```json
{
   "msisdn":"2348103100000",
   "firstName":"John",
   "lastName":"Doe",
   "email":"test@test.com",
   "encryptedPan":"1235246646GVDG",
   "dateOfBirth":"18/08/1997",
   "bvn":"2222222222",
   "address":" 25 Okota",
   "address_city":"Shomolu",
   "address_state":"Lagos",
   "account_number":"1234567897",
   "bank_code":"054",
   "gender":"Male",
   "status":200
}
```

#### $dojah->identification()->lookup_phone_number(phone_number) - Return details of a particular phone number

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    phone_details = $dojah->identification()->lookup_phone_number(phone_number);
    echo $phone_details;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `phone`: The phone number to lookup

*Returns*

```json
{
   "msisdn":"09011111111",
   "firstName":"John",
   "middleName":"Doe",
   "lastName":"Doe",
   "maritalStatus":"Married",
   "gender":"Male",
   "birthDate":"11-11-1972",
   "birthLga":"Ikeja",
   "birthState":"Lagos",
   "educationalLevel":"Higher",
   "emplymentStatus":"25 ikeja",
   "nspokenLang":"English",
   "ospokenlang":"Yoruba",
   "profession":"Tailor",
   "religion":"Muslim",
   "residenceAddressLine1":"25 Agege motor ways",
   "residenceTown":"Oshogbo",
   "residenceLga":"Ikeja",
   "residenceState":"Lagos",
   "residenceStatus":"Occupant",
   "selfOriginLga":"Lagos Island",
   "selfOriginPlace":"Yaba",
   "selfOriginState":"Muslim",
   "state":"Lagos",
   "lga":"Ikeja",
   "nin":"111111111111111",
   "title":"Mr",
   "height":"5 9",
   "pi
cture":"BASE 4 encrypted",
   "status":200
}
```

#### $dojah->identification()->lookup_vin_dob(state, first_name, last_name,dob) - Lookup VIN via date of birth

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $vin_details = $dojah->identification()->lookup_vin_dob('Lagos','John','Doe','1993-09-22');
    echo $vin_details;
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `state`: A state in Nigeria
- `first_name`: First name of VIN holder
- `last_name` : Last name of VIN holder
- `dob`: Date of birth in yyy-mm-dd format

*Returns*

```json
{
   "full_name":"JOHN DOE S",
   "voter_identification_number:":"90F5B1C5B1234567890",
   "gender:":"Male",
   "occupation:":"STUDENT",
   "time_of_registration:":"2011-01-18 13:59:46",
   "state:":"ONDO",
   "local_government:":"IDANRE",
   "registrat
ion_area_ward:":"ISALU JIGBOKIN",
   "polling_unit:":"OJAJIGBOKIN, O/S IN FRONT OF ABANA I & II",
   "polling_unit_code":"28/08/08/005",
   "status":200
}
```

#### $dojah->identification()->lookup_vin(cls,vin, state, last_name) - Return details of a particular VIN

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $vin_details = $dojah->identification()->lookup_vin('90F5B1C5B1234567890', 'Lagos', 'Doe');
    echo $vin_details;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `vin`: The VIN to lookup
- `state`: A state in Nigeria
- `last_name`: The last name of the holder

*Returns*

```json
{
   "full_name":"JOHN DOE S",
   "voter_identification_number:":"90F5B1C5B1234567890",
   "gender:":"Male",
   "occupation:":"STUDENT",
   "time_of_registration:":"2011-01-18 13:59:46",
   "state:":"ONDO",
   "local_government:":"IDANRE",
   "registration_area_ward:":"ISALU JIGBOKIN",
   "polling_unit:":"OJAJIGBOKIN, O/S IN FRONT OF ABANA I & II",
   "polling_unit_code":"28/08/08/005",
   "status":200
}
```

#### $dojah->identification()->lookup_driver_licence(license_number, dob) - Return details of a license

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $driver_licence = $dojah->identification()->lookup_driver_licence('90F5B1C5B1234567890','1998-09-22');
    echo $driver_licence;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `license_number`: A driver's license number
- `dob`:  Date of birth in yyy-mm-dd format

*Returns*

```json
{
   "uuid":"1625583696",
   "licenseNo":"FKJ494A2133",
   "firstName":"JOHN",
   "lastName":"DOE",
   "middleName":"",
   "gender":"Male",
   "issuedDate":"2019-01-25",
   "expiryDate":"2024-08-17",
   "stateOfIssue":"LAGOS",
   "birthDate":"28-09-1998",
   "photo":"BASE 64 IMAGE"
}
```

#### $dojah->identification()->lookup_cac(rc_number,company_name) - Return details of a particular company

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $coy_details = $dojah->identification()->lookup_cac('1237654','ABC Company LIMITED');
    echo $coy_details;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `rc_number`: The company's RC number
- `company_name`: The name of the company

*Returns*

```json
{
   "rc_number":"1237654",
   "company_name":"ABC Company LIMITED",
   "address":"NO 37 Lagos Road, Nigeria",
   "date_of_registration":"2015-05-15",
   "status":200
}
```

#### $dojah->identification()->lookup_tin(tin) - Return details of a particular tin

*Usage*

```php



try {
    $dojah = new DojahCore\Dojah();
    $tin_details = $dojah->identification()->lookup_tin('1234444');
    echo $tin_details;
    
} catch(Exception $e) {
    echo $e->getMessage(); 
}
```

*Arguments*

- `tin`: A valid tax identification number

*Returns*

```json
{
   "search":"07012345678",
   "taxpayer_name":"JOHN DOE NIG LTD",
   "cac_reg_number":"RC123456",
   "firstin":"12345678-0001",
   "jittin":"N/A",
   "tax_office":"MSTO ALIMOSHO",
   "phone_number":"07012345678",
   "email":"",
   "status":200
}
```