Compressor as a Service

Compressor Page

* user should be able to enter string with next chars (a,b,c,d,e,f)

* user should have button to starting compressor process

* user should be able to see result of compressing

* user should be able to recover input string from compressed string


Compressor Flow

Ex1: in string: "aaaabbbbcccc", out string: "a4b4c4".

Ex2: in string: "a4b4a4", out string: "aaaabbbbaaaa".

remarks:

if string contains one symbol "a" it will be "a", not "a1"

if string contains substring "aa" it will be "aa", not "a2"

if substring contains more than two letters it should be compressed

Decompressor Flow

Ex1: in string: " a11", out string: "aaaaaaaaaaa".
Ex2: in string: "aab3c4", out string: "aabbbcccc".

Architecture:

Frontend(FE) should send valid data to backend for compression and decompression
Backend(BE) should provide two methods for compress and decompress string.
Communication over HTTP protocol. Data should be on JSON. Data passed from frontend should
be also validated by backend.


Requirements:

FE: Angular

BE: Laravel

Code should be well structured. Using tests will be appreciated. 
