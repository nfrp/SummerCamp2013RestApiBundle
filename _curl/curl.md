# cURL commands

## Base command:

`curl -u "admin:ezsc" -i -H "Accept: application/json" http://ezpublish.ezsc/api/ezp/v2/`

* `-i` to get response HTTP headers
* `-u login:password` for HTTP Basic Auth
* `-H "Http-Header: value"` to add a custom HTTP header
* `-X VERB` to use a specific HTTP verb (GET is the default)
* `-d @file.txt` to use the content of file.txt in the request body


## Exercices

* Get the root structure in JSON
  `curl -u "admin:ezsc" -H "application/vnd.ez.api.Root+json" http://ezpublish.ezsc/api/ezp/v2/`
* Get the root structure in XML
  `curl -u "admin:ezsc" -H "application/vnd.ez.api.Root+xml" http://ezpublish.ezsc/api/ezp/v2/`
* Display locations under the root location
  `curl -u "admin:ezsc" -H "application/vnd.ez.api.Location+xml" http://ezpublish.ezsc/api/ezp/v2/content/locations//1/2`
  `curl -u "admin:ezsc" -H "application/vnd.ez.api.LocationList+xml" http://ezpublish.ezsc/api/ezp/v2/content/locations//1/2/children`
* Read the content and the content info of one of those location
  `curl -u "admin:ezsc" -H "application/vnd.ez.api.Location+xml" http://ezpublish.ezsc/api/ezp/v2/content/locations//1/2/60`
  `curl -u "admin:ezsc" -H "application/vnd.ez.api.Content+xml" http://ezpublish.ezsc/api/ezp/v2/content/objects/58`
  `curl -u "admin:ezsc" -H "application/vnd.ez.api.ContentInfo+xml" http://ezpublish.ezsc/api/ezp/v2/content/objects/58`
* Delete a content
  `curl -u "admin:ezsc" -X DELETE http://ezpublish.ezsc/api/ezp/v2/content/objects/XXX`
* Create an image content (draft)
  `curl -u "admin:ezsc" -i -H "Accept: application/json" -H "Content-Type: application/vnd.ez.api.ContentCreate+json" -X POST -d @createimage.json http://ezpublish.ezsc/api/ezp/v2/content/objects`
* Publish the image content (version list is buggy)
  `curl -u "admin:ezsc" -H "Accept: application\/vnd.ez.api.VersionList+json" http://ezpublish.ezsc/api/ezp/v2/content/objects/109/versions`
  `curl -u "admin:ezsc" -X PUBLISH http://ezpublish.ezsc/api/ezp/v2/content/objects/109/versions/1`
