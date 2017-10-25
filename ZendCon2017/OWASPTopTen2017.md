# OWASP Top Ten 2017: The Ten Most Critical Web Application Security Risks
## Christian Wenz - @chwenz
1. Injection
    - Different kinds on injection
        - SQL
        - LDAP
        - XPath
        - Regex
    - We're actually talking about SQL Injection
    - Most coming from legacy applications - that's why it's still a problem, and number 1 at that
    - How to fix it:
        - OR Mappers
        - Parameterized queries/prepared statements
        - Extension-specific escaping functions
2. Broken Authentication
    - HTTP is a stateless protocol
    - Session management is, essentially, a hack
    - Different attack vectors
        - Session hijacking
        - Session fixation
        - Insufficient timeout
        - Unencrypted passwords
    - How to fix it:
        - PHP crypt function
        - Password Hashing API
            - password_hash
            - password_verify
3. Sensitive Data Exposure
    - How to fix it:
        - Use encryption throughout
        - HTTPS only (if possible, enforce it)
            - HTTP Strict Transport Security
            - "secure" cookie flag
4. XML External Entity (XEE)
    - XML processors evaluating an external entity
    - Is XML still a thing?
    - How to fix it:
        - PHP: `libxml_disable_entity_loader(true)`
5. Broken Access Control
    - Insecure Direct Object References & Missing Function Level Access Control
    - Access control to data
    - Mass Assignment
        - The curse of Active Record / Model Binding
        - Ex. Github issue opened 1001 years in the future
6. Security Misconfiguration
    - I'm not an admin!
    - In the days of DevOps, maybe I am
    - How to fix it:
        - Harden server/OS
        - Do not send detailed error messages to the client
        - Use browser security headers
7. Cross-Site Scripting (XSS)
    - One of the oldest attacks around
    - Injecting content (usually javascript) into server output
    - Might bring friends: if there is XSS, it's very hard to defend against CSRF
    - Same-Origin Policy
        - Protocol
        - Domain
        - Port
        - It's the origin of where the script was loaded
    - How to fix it:
        - Escape output -> `htmlspecialchars()`
        - Use browser protection (X-XSS-Protection)
        - Use Content Security Policy (WC3 standard)
            - Externalize all CSS and Javascript
            - Lots of features
8. Insecure Deserialization
    - Calls to `unserialize()` re-create classes used in the payload
    - Magic methods might be executed
        - `__construct()`
        - `__wakeup()`
        - `__destruct()`
        - ... and some more
    - How to fix it:
        - Validate input
9. Using Components with Known Vulnerabilities
    - How to fix it:
        - Update systems and dependencies
10. Insufficient Logging and Monitoring
    - How to fix it:
        - Log!
        - Look at the logs!
