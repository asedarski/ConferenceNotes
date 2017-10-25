# Making Robots with PHP
## Christopher Pitt - @assertchris
[Slides](https://slides.com/assertchris)
- Tessel
    - Looks really cool
    - JavaScript
- Arduino
    - C++
    - Generic options available
    - Firmata: a way to get around developing in C++
        - A protocol that accepts dynamic instructions
        - `Carica\Firmata` library for interfacing with the Firmata protocol for PHP
    - Hosted IDE
    - `Gorilla PHPMake\SerialPort` running Firmata & PHP on Mac to avoid race conditions
- Resistor
    - Colored bars for the resistance level
- Diode
    - Similar shape to a resistor
    - Current can only flow through it in one direction
- Transistor
    - Control a larger flow of current and voltage
    - Allows us to connect something that requires higher power than what the board supplies
- [Electronic Components](https://medium.com/@assertchris/electronic-components-20bfc59004bd)
