# PingResponse

'Ping' response object


## Fields

| Field                                                          | Type                                                           | Required                                                       | Description                                                    | Example                                                        |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| `status`                                                       | *?string*                                                      | :heavy_minus_sign:                                             | API service status: OK - API available, ERR - API unavailable  | OK                                                             |
| `version`                                                      | *?string*                                                      | :heavy_minus_sign:                                             | Current API Version                                            | 1.0                                                            |
| `sandbox`                                                      | *?bool*                                                        | :heavy_minus_sign:                                             | Was the connection established with the test system (SANDBOX)? | false                                                          |