# How to Node.js

### Setting Up
#### Installing Node.js
- Never follow the Node.js documentation's steps for installing Node. Always use a package manager.

### Service Mocking
#### Quick File Server
- npm package `serve` can serve a file with node via HTTP
- Example: `serve -p 5050 static` serves the `static` directory via HTTP at http://localhost:5050

#### Zero-Dependency Service Mock
- `createServer`
  - When we call the `createServer` function it returns a server instance.
  - We call `server.listen(3000)` to tell the HTTP server to listen on port 3000.
  - The createServer function accepts a function which is known as the request listener.
  - The request listener function is passed two arguments, which we name `req` and `res`.
- Cross-Origin Resource Sharing (CORS)
  - `res.setHeader('Access-Control-Allow-Origin', '*')` Allows requests from all origins
  - Origin = protocol + host + port

#### Mocking GET Routes
- [Fastify](https://www.fastify.io/)
  - Fastify is a Node.js web framework that's built for rapid implementation and high performance.
  - `npm init fastify`
    - Creates the following directories and files:
      - app.js
      - package.json
      - plugins
      - routes
      - test
  - `fastify-cors`
    - CORS functionality
    - `fastify.register(cors)` registered in the app.js will allow all origins
  - Routing
    - Directories created under `routes` will serve as the route
      - Ex: A `routes/foo` directory will hold all routes for http://localhost:3000/foo endpoints
    - Under `foo` routes can be defined in the directories files
      - Ex: `fastify.get('/', async function (request, reply) {}`
      - Ex: `fastify.get('/bar', async function (request, reply) {}`
    - Template for new routes
      ```
      'use strict'
      module.exports = async function (fastify, opts) {
        fastify.get('/', async function (request, reply) {
          return {DATA HERE}
        })
      }
      ```
  - Running
    - `npm run dev`
    - You can also create a `server.js` file via Fastify
      - `./node-modules/fastify --eject` will create the `server.js` file

#### Mocking POST Routes
- It's highly recommended that production Node.js services are stateless. That is, they don't store their own state, but retrieve it from an upstream service or database.
- When we're creating mock services, however, storing state in-process is fine. We're just trying to carve out a happy path for the application or service that we're actually implementing.
- The `fastify-plugin` module is used to de-encapsulate a plugin
  - We pass the exported plugin function into fp to achieve this. What this means is, any modifications we make to the fastify instance will apply across our service. If we did not pass the exported function to fastify-plugin any modifications to the fastify instance that is passed to it would only apply to itself and any descendent plugins that it could register. Since the plugin is loaded as a sibling to our routes we need to indicate we want our plugin to apply laterally. For more information on the Fastify plugin system see [Fastify's Documentation](https://www.fastify.io/docs/v3.9.x/Plugins/).
  - `fastify.decorateRequest`
    - We use the `fastify.decorateRequest` method to decorate the request object that is passed to route handler functions with a method we name mockDataInsert. For more information on Fastify decorators see [Fastify's Documentation](https://www.fastify.io/docs/v3.9.x/Decorators/).
- `fluent-json-schema`
  - Fastify has embedded support for JSON Schema
  - https://www.fastify.io/docs/latest/Guides/Fluent-Schema/

### Going Real-Time
#### Enhancing an HTTP Server with WebSockets
- WebSockets allow for two-way communication between browsers and servers. Just like the HTTP protocol is built on top of the TCP protocol the WebSocket protocol is built on top of HTTP. It allows for long lived connections that start as normal HTTP connections and upgrade to a socket-like connection.
  - [Writing WebSocket Client Applications](https://developer.mozilla.org/en-US/docs/Web/API/WebSockets_API/Writing_WebSocket_client_applications)
  - [Writing WebSocket Servers](https://developer.mozilla.org/en-US/docs/Web/API/WebSockets_API/Writing_WebSocket_servers)
- `fastify-websocket`
  - Plugin to support websockets in the Fastify framework
  - Enhances `fastify.get`
  - Pass an `options` object to the 2nd parameter of `fastify.get` with `websocket: true`
- Async functions produce a promise
- Generator functions produce an interable
  - Iterable = object with a `next` function that can be called to make the function progress to the next `yield` keyword and returns the value of the `yield`
    - Can be looped over with `for of`
- Async generator function
  - Combination of both async functions and generator functions
  - Returns an async iterable
    - Object with a `next` function that returns a promise which resolves to the value of the `yield` from the async function generator
    - Can be looped over with `for await of`
- Streams
  - Represent continuous data
  - Vast API
  - Different types:
    - Readable streams
      - They are async iterables
    - Writable streams
    - Hybrid streams
      - Duplex
      - Transform
      - Passthrough
        - Sends any writes straight to it's readable side with no modifications
  - By default streams work with binary data
  - Object-mode streams can have objects written to them
- [Fastify validation and serialization documentation](https://www.fastify.io/docs/v3.10.x/Validation-and-Serialization/)


### Building CLI Tools
#### Creating a Command Line Tool
- TODO
#### Parsing Command Line Flags
- TODO
#### Implementing Sub Commands
- TODO
#### Implementing a Terminal User Interface
- TODO

### Navigating the Ecosystem
- Most of the functional packages are poor on performance
- Over 2 million npm packages => lots of crap
- It's hard to know from npm packages what is good and what is not
  - Even with lots of downloads, active maintainers, etc. libraries can still be bad in various ways
  - Examples:
    - Ramda
      - Functional library that has terrible performance
    - Mongoose
      - Part of the MEAN stack, but will cause problems in production
    - Bluebird
      - Promise library that pre-dates native promises
  - General guidelines:
    - Look at dependencies
    - How many collaborators are on the project?
    - https://socket.dev/
    - https://snyk.io/advisor/
  - [undici](https://www.npmjs.com/package/undici)
    - HTTP client to use instead of axios
- Substack is a good library developer - one of the node hacker community members

### Contributing to Open Source
- Find a community that is good to newbies and start contributing
- [goodfirstissue.dev](https://goodfirstissue.dev/)
- Getting Certified
  - Two current certifications
    1. Node Application Developer
      - https://training.linuxfoundation.org/training/nodejs-application-development-lfw211/
    2. Node Services Developer (more for servers)
      - https://training.linuxfoundation.org/training/node-js-services-development-lfw212/
    - https://openjsf.org/certification/


### Random Notes
- In order to support all of the locales, including just `application/json` we have to suppy a `charset`
  - Ex. `Content-Type = application/json; charset=utf8`
  - Japanese cannot parse JSON if only `application/json` is used
- Always use `use strict` unless you use ESM
- Node 16 vs Node 18
  - Historically Node has always had a DNS hack (switching the order of DNS resolution putting IPV4 first in the list)
- Why Fastify vs Express?
  - It protects against data prototype pollution by default
    - https://www.fastify.io/docs/latest/Guides/Prototype-Poisoning/
  - It can handle data validation
- Matteo's preferred testing framework https://node-tap.org/