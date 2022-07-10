# Separating dollar sign from PHP variable name in Atom and Visual Studio Code

## Introduction - why to separate?

Look at the picture below. It shows eye movements and fixations while reading identifiers in `under_score` or `camelCase` style. As you see, `camelCase` introduces a lot of visual confusion and additional work. Larger circles indicate increased mental parsing time needed to process the joined word. Picture is taken from [Extended Models on The Impact of Identifier Style on Effort and Comprehension](http://www.cs.loyola.edu/~binkley/papers/tr-loy110720.pdf) (2012) by Binkley, Davis, Lawrie, Maletic, Morell, Shariff.

![Gaze plots for underscore and camel-case naming styles](images/eyetracking.jpg)

Now, think about variables in PHP. They all have dollar sign prefix as their [sigil](https://en.wikipedia.org/wiki/Sigil_(computer_programming)). I do not have a proof and I haven't done any eye-tracking experiments, but I suspect that those dollar signs increase mental parsing times because they do look like a letter `S` and you have to make some additional effort so separate them from proper variable names. *However*, dollar signs help both interpreter and the programmer to quickly find variables in the source code. Do not underestimate this. This single symbol might be better than syntax colouring.

I do propose some alternative syntax styling which helps with visually separating dollars from variable names while keeping them visible to ease finding variables in the code.

Original Atom styling | After changing color and space offset
:-------------------------:|:-------------------------:
![Original Atom styling](images/before.png)  |  ![New Atom styling](images/after.png)

In my opinion, it reduces mental strain and is much more aesthethic and pleasurable to work with.

## What is possible in editors / IDEs

Improvement | Atom | Visual Studio Code
:-------------------------:|:-------------------------:|:-------------------------:
dollar color change | yes | yes
font style change | yes | yes
adding space between dollar and variable name | yes | no

Atom is much more flexible than VSC. You can change almost any CSS property of the dollar sign. You can even use `::before` and `::after` to completely change it to any other character.

## Atom

Add this to your own Atom stylesheet (File -> Settings -> click on the link "your stylesheet" under "Choose a theme" title), save changes and open [examples.php](examples.php):

```less
span.syntax--punctuation.syntax--definition.syntax--variable.syntax--php {
  color: brown;
}

span.syntax--punctuation.syntax--definition.syntax--variable.syntax--php::after,
span.syntax--variable.syntax--other.syntax--php+span.syntax--punctuation.syntax--definition.syntax--variable.syntax--php::before,
span.syntax--punctuation.syntax--section.syntax--array.syntax--end.syntax--php+span.syntax--punctuation.syntax--definition.syntax--variable.syntax--php::before {
  content: '\a0';  //< space
}

span.syntax--variable.syntax--other.syntax--php+span.syntax--punctuation.syntax--definition.syntax--variable.syntax--php::after,
span.syntax--punctuation.syntax--section.syntax--array.syntax--end.syntax--php+span.syntax--punctuation.syntax--definition.syntax--variable.syntax--php::after {
  content: '';
}
```

In actual editing work you might need some time to adapt to "automatic" space after dollar and after closing array bracket. Try to delete closing square bracket in `$var_9` example. I don't know at this time how to make this more intuitive. There is another problem with assingment sign, see `$eq_new_line` example.

## Visual Studio Code

Open Command Palette (CTRL+SHIFT+P) and find "Open Settings (JSON)". Then add this to the JSON config:

```json
"editor.tokenColorCustomizations": {
    "textMateRules": [
        {
            "scope": "punctuation.definition.variable.php",
            "settings": {
                "foreground": "#000000",
                "fontStyle": ""
            }
        }
    ]
}
```

Remember about proper JSON syntax. See example [settings.json](settings.json).

After that, save changes and open [examples.php](examples.php).



## Thanks

* Thank you, [Mark](https://stackoverflow.com/users/836330/mark), for [explaining how to achieve this](https://stackoverflow.com/a/72925504/925196) in VSC!