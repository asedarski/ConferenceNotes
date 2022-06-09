# Rust Native Module with Node-API
## Jean Burellier

### Why use native code?
- Performance
  - Image and video processing
  - Compression
  - CPU heavy tasks
  - Math computations
- Reuse pre-existing codebase
  - Legacy applications
  - Allow for fast integration
  - Easy way to expose some functionalities
  - Sometimes things "just work" and you don't want to mess with it
- Feature is not available
  - Multiple low level or specific libraries
  - Examples:
    - IA: Tensorflow
    - Image processing: FFmpeg
    - No drivers: GPU or custom processing power
- Access to low level API
- Desktop apps
- Example addons:
  - Stdlib
  - Node-sqlite3
  - Node-sass
  - Node-canvas
  - v8-profiler
### Problems
- Node.js is constantly evolving and the interface tends to break
### Interact with native code from Node.js
- NaN - Native Abstractions for Node.js
  - Third party module
  - Included in the node.js foundation in 2015
  - Provides a layer of abstraction on top of the Node API
  - Creates a common interface on top of all versions
### Node-API
- A stable ABI (Application Binary Interface)
- Define and export C types and functions
- Abstraction of the JavaScript engine
- Work started on it in 2016
