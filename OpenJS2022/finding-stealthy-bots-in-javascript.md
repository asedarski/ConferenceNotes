# Finding Stealthy Bots in JavaScript Hide and Seek
## Adam Abramov - Reverse Engineer @ DoubleVerify

- The internet wasn't designed with bot detection in mind
1. Simple Detections
  - User agent
    - Can be overwritten but the `getOwnPropertyDescriptor` can give clues that it's been messed with
  - No javascript engine
  - Simple DOM tests
  - Creep.js
    - Tests DOM and fingerprints beneath the surface and attempts to verify
  - Data
    - Check expected data and see if it matches the format you expect it to. If not it might signal that a bot is tring to mock your behavior
  - Behavior tests
    - Ex. click tracking and measuring normal behavior. Outliers may be bots
1. Bots Got Better
  - Bots are constantly evolving and patching to keep up with the mitigations put in place by applications
  - Control attributes like user agent through the browser
  - Disguise the browser
  - Fake user behavior
1. The King Bot
  - `puppeteer-extra-plugin-stealth`
  - Runs headless by default
  - Canvas fingerprinting
    - Plugin - Canvas Fingerprint Defender
  - Have solutions for captchas
1. Detections to Win King Bots
  - For easy bots, easy stuff
  - JS engine artifacts
  - Behavior tests
    - Advanced ones on performance
    - Context discrepancies
  - Data
    - Zooming out and looking at the big picture
    - Ex. looking at unique user agent distribution. At first you'll have a lot of unique ones, then it tapers off over time. But a bot might show a constant variance because they are constantly creating "unique" user agent

Questions:
- If you protect yourself well from bots, can UI automation still be possible since they're simulating the user?
