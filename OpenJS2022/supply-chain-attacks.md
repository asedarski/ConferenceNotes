# The State of JavaScript Supply Chain Security in 2022
## Feross Aboukhadijeh

- Most common type of attack is preinstall scripts in a package that runs when the package is installed
- Attacks often don't want to target their home countries or allies so they typically check what country the IP address is
- "Protestware" - contributor sabotages their own package for reasons of protest
- Why is this happening now?
  - Open source has won - 90% of application code comes from Open Source
  - Open Source communities are trusting by default
  - Lots of transitive dependencies
  - No one reads the code
  - Attackers often push different code to NPM and to Github
- Attacker TTPs (Tactics, Techniques and Practices?)
  1. Contributing
  2. Typosquatting
    - Naming packages similarly to induce confusion
  3. Dependency Confusion
    - Public packages written to look like internal private packages
  4. Install scripts
  5. Data exfiltration
    - Pulling data off of machines
  6. Data destruction or ransom
- How can you protect your app?
  - Vulnerability scanning is a red herring
    - This doesn't really get the vulnerability before it's been reported and published
  - Vulnerability vs Supply Chain Attack
    - Vulnerability = accidentally introduced generally safe
    - Supply chain attack = intentionally introduced by a hacker
  1. Support Open Source maintainers more
    - Maintainers are generally overwhelmed and will accept help wherever offered
  2. Change how you think about dependencies
    - If you ship code to prodcution you are responsible for it (including your dependencies)
  3. Update dependencies at the right cadence
    - Always staying on the latest verison isn't always the best approach
    - Too slow = known vulnerabilities
    - Too fast = exposed to supply chain attacks
  4. Dig deeper before choosing a dependency
    - Full audit = lots of work, slow and expensive
    - Do nothing = vulnerable to supply chain attack, risky, potentially expensive
    - Standard dependency checklist
      - Gets the job done
      - Does it have OS license
      - Good docs
      - Lots of downloads
      - Recently maintained
      - Types
      - Tests
    - 2022 checklist
      - Does it have an install script
      - Native code
      - Talk to the network
      - Shell commands
      - Read env vars
      - Gathers telemetry
      - Obfuscated code
      - socket.dev attempts to solve these questions
  5. Monitor dependency changes with automation
    - Monitor PRs for bad dependencies
    - socket.dev can do automation on package updates
  6. Improve JavaScript, Node.js and npm
