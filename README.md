# oc-acte-myip
Plugin for OctoberCMS. Display the client public IP address in JSON and RAW.

Very simple component that returns client public IP address.

- Upload folder to your OctoberCMS plugin directory
- Add component in your page
- Setup page URL like /ip/:format

Formats:
- /ip/raw will return client IP as text
- /ip/json will return JSON format like {"ip":"1.2.3.4"}
