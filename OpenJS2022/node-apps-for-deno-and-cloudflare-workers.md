# Dinos and Clouds: Node apps for Deno and Cloudflare Workers
## Paul Asjes - Stripe

### Background
- Deno = clone/adaptation of node
- Github issue
  - stripe-node use outside of Node.js (ie. Deno or Cloudflare)

### Problems
- Node didn't support Fetch
- Node uses node crypto while Cloudflare/Deno use Web crypto API
- Node supports path/events - Cloudflare doesn't
- Node supports common JS - Deno doesn't
  - Deno exclusively uses ES Modules
  - Stripe-node uses CommonJS

### The fix
- Environment detection
- HTTP clients
  - Fetch not supported in Node
    - Node-fetch has a minimum requirement of 12 while they supported a minimum of 8
  - http/https not supported in Cloudflare or Deno
  - Built a flexible HTTP client that allows you to specifiy what flavor of HTTP client to use (fetch/http/etc)
  - Bugs
    - Content-Length header indicates the length of the body in the request
    - Content-Length isn't expected for verbs that don't anticipate bodies (GET/DELETE)
    - Node doesn't complain, but Cloudflare is restrictive and specific
- Cryptographic clients
  - Built a flexible Crypto client that can accept the crypto type
- Path & Events
  - Provided templates and stubbing required
- ES Modules vs CommonJS
  - esm.sh
    - Wraps commonJS modules in ES Modules
    - Ex: `import Stripe from 'https://esm.sh/stripe'`

### Big Takeaways
1. That wasn't easy
  - But it was worth it. `stripe-node` works in any environment that supports fetch
1. HTTP testing is not easy
  - People don't like it when you break things
1. Wouldn't it be great if all this was standardized?
  - WinterCG aims to provide a space for JS runtimes to collaborate on API interoperability
- Simplicity means versatility

### Tools We Could Use
1. http/https to fetch conversion
1. CommonJS to ES Modules
1. HTTP testing made easy
