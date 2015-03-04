<html>
    <head>
        <title>Tamagotchi! ^_^</title>
    </head>
    <body>
        <h1>^_^</h1>
        <form action="/creature" method="post">
            <button name="food" type="submit">Feed Me!</button>
            <p>
                Hunger: {{ creature[0].getFood }}
            </p>
            <button name="rest" type="submit">I'm Tired!</button>
            <p>
                Sleep: {{ creature[0].getRest }}
            </p>
            <button name="play" type="submit">Play with me!</button>
            <p>
                Happiness: {{ creature[0].getMood }}
            </p>
        </form>
    </body>
</html>
