# view-api-pattern
An architectural pattern that uses a router, view, and API, but does not have a controller component

The client sends a request to the router (a dedicated routing component). The router then forwards the request to the appropriate view, which generates a response. The view may also retrieve data from an API as part of generating the response. The response is then sent back to the router, which sends it back to the client.

This approach offers many (NOT ALL) of the same benefits as a the general MVC pattern (the separation of concerns and the ability to more easily develop and maintain the application over time... etc) but most importantly allows the client and server to be more easily separated and scaled independently.