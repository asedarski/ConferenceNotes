# The Road to Intl.MessageFormat
## Eemeli Aro - Mozilla
- eemeli.org/talks/road-to-intl-message-format

### Where are we now?
- Localization is often an afterthought
- Multiple solutions that *kindof* work until they don't
- Localization is focused on translating strings from one locale to another
- Localization is done for "them" and not "us"

### What would be better?
- Content on the web should be easily localizable
- There should be commonly used message & resource syntax
- We should have tools and tech for localizing complex structures, not just strings
  - Ex. `<a href="https://en.wikipedia.org/wiki/Helsinki">Helsinki</a>is the capital of Finland.`
  - The URL root should also be translated (fi.wikipedia)
  - The city name should be translated (Helsingfors)
- Localization needs to be identified as part of inclusion and accessibility

### How can it be done?
- Adding some meta tags can describe the locale and a link to a localization file
  - `<meta name="l10n-base" content="./l10n/{en,fi,sv}/" />`
  - `<link rel="localization" src="messages.mf" />`
  - File with translations at `l10n/fi/messages.mf` that contain localizations for various ids on the page
- `l10n` = shorthand for localization
- What's the format of this .mf file?

### Standardizing
- Message & resource format: `MessageFormat 2`
- Browsers/HTML: `DOM Localization`
- JavaScript: `Intl.MessageFormat`

### But what about my old app?
- We'll make it faster
- Building the path to get us from here to there
- Universal syntax + universal data model for messages
- Any existing message syntax can be parsed into the "MF2" data model, allowing for a shared runtime and conversion between all formats

### Adding an MF2 parser to browser DOM & JavaScript
- Removing the need to include a message parser in your JS bundle
- First such addition to JavaScript since JSON.parse()
- Internally, cross-browser support is provided by ICU (unicode consortium)

### Localizing elements, not strings
- Localizable content isn't just strings, it often has structure
- Ability to represent the structures in MF2 allows for DOM localization; localization that doesn't depend on any JavaScript
- Allows us to appropriately represent a complex message to translators, who are **not** developers

### Make it easy to make the right choices
- Do the same for web content that CSS did for styling 30 years ago
- Localization is an issue everywhere, it makes your content more accessible to a greater portion of your audience
- Solving localization "later" will have you incur more tech debt than you think (+1)

### Is this really happening?
- Yes. This is already how Firefox is localized internally, using Fluent
- Tech preview of MF2 is planned for inclusion in ICU 72
- Intl.MessageFormat proposal is progressing in TC39
