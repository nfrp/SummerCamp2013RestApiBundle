# cURL commands

## Base command:

`curl -u "admin:publish" -i -H "Accept: application/json" http://cp2013.9.loc/api/ezp/v2/`

* `-i` to get response HTTP headers
* `-u login:password` for HTTP Basic Auth
* `-H "Http-Header: value"` to add a custom HTTP header
* `-X VERB` to use a specific HTTP verb (GET is the default)
* `-d @file.txt` to use the content of file.txt in the request body


## Exercices

Except for the first two commands, the requested URI is always taken from a
previous response.

* Get the root structure in JSON
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.Root+json" http://cp2013.9.loc/api/ezp/v2/`

* Get the root structure in XML
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.Root+xml" http://cp2013.9.loc/api/ezp/v2/`

* Display locations under the root location
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.Location+xml" http://cp2013.9.loc/api/ezp/v2/content/locations/1/2`
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.LocationList+xml" http://cp2013.9.loc/api/ezp/v2/content/locations/1/2/children`

* Read the content and the content info of one of those location ("Blog")
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.Location+xml" http://cp2013.9.loc/api/ezp/v2/content/locations/1/2/90`
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.Content+xml" http://cp2013.9.loc/api/ezp/v2/content/objects/88`
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.ContentInfo+xml" http://cp2013.9.loc/api/ezp/v2/content/objects/88`

* Delete a content
  Create a new blog post under http://cp2013.9.loc/ezdemo_site_admin/Blog (contents: http://phpconference.com/2013/en/sessions/rest-layer-top-world)
  Retrieve Object ID, then run:

  `curl -u "admin:publish" -X DELETE http://cp2013.9.loc/api/ezp/v2/content/objects/<objectId>`

* Create an image content (draft)
  `curl -u "admin:publish" -i -H "Accept: application/json" -H "Content-Type: application/vnd.ez.api.ContentCreate+json" -X POST -d @createimage.json http://cp2013.9.loc/api/ezp/v2/content/objects`
  The draft is created, but due to the bug [EZP-21522](https://jira.ez.no/browse/EZP-21522), it will be impossible to
  to publish it, to avoid this issue, you can create the draft with the
  `createimage_without_image.json` file instead, which will create an image
  object without any image...
  `curl -u "admin:publish" -i -H "Accept: application/json" -H "Content-Type: application/vnd.ez.api.ContentCreate+json" -X POST -d @createimage_without_image.json http://cp2013.9.loc/api/ezp/v2/content/objects`

* Publish the image content (version list is buggy)
  `curl -u "admin:publish" -H "Accept: application/vnd.ez.api.VersionList+json" http://cp2013.9.loc/api/ezp/v2/content/objects/113/versions`
  `curl -u "admin:publish" -X PUBLISH http://cp2013.9.loc/api/ezp/v2/content/objects/113/versions/1`






--
REST API for more than service-to-service: UX example

API REST as provider for ajax calls - data
Initial page load (JS code, generating an interface) - then REST/Ajax for navigation, data retrieval. 
Total separation of functional UX and data retrieval + back-end business logic
Inspirations:
* Gmail-style
* "Single page app" - mobile dev paradigm

Future projections:
* SaaS UX connecting to a remote eZ Publish back-end
* Web-agnostic interface to access eZ Publish Content + Business Logic

Tools:
* JS lib, REST client: https://github.com/ezsystems/ez-js-rest-client
* Reproduction of the public PHP API: exposing services
* Relying on HATEOS, but simplifying usage of it
* Issue: slight overhead in Ajax calls.
  "View" concept in REST API, to reduce amount of calls.

Examples:
* Install bundle
* Visit /summercamp/rest-test
* Related commit: 
  https://github.com/dpobel/SummerCamp2013RestApiBundle/commit/5bd3cf872c296be387842a848ffe945dfe4d93fb
* Template: https://github.com/dpobel/SummerCamp2013RestApiBundle/blob/master/Resources/views/rest.html.twig
  NOTE: use workshop_solutions branch!!
  WARNING: change password l.49
  --> Display browser console when using the interface. Interesting part: "_showDetails" JS function in https://github.com/dpobel/SummerCamp2013RestApiBundle/blob/workshop_solutions/Resources/public/js/workshop.js

Arguments/Benefits: 
* Easy to discover the REST APi structure from a client
* BC support: no URL hard-coding, but painless client-side, all existing projects relying on the API need not be modified,
* Simplifies cache management (HTTP): easy to know exactly which resource is to be expired after a change in content repository.









