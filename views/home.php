<html>
    <head>
        <title>Create your BEAST!</title>

    </head>
    <body>
        <h2>Enter the weight of your creature.</h2>

        <form action="/creature" method="post">
            <label for="weight">Enter the Weight:</label>
            <input type="range" onchange="updateTextInput(this.value);" min="1" max="9" id="weight" name="weight">
            <span id="textInput">STuff</span>
            <button type="submit">Create! MUHAHA</button>
        </form>
    </body>
    <script type="text/javascript">
        function updateTextInput(val) {
          document.getElementById('textInput').innerHTML= val;
        }
        updateTextInput(5);
    </script>
</html>
