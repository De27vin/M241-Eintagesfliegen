<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eintagesfliegen</title>
    <script src="https://unpkg.com/vue@3"></script> <!-- VueJS integration -->
</head>
<body>

<!-- VueJS App Container -->
<div id="app">
    <test></test>
</div>

<!-- PHP -->
<?php

    for($i=1; $i<10; $i++) {
        echo "$i ";
    }



?>

<!-- VueJS Initialisation -->
<script>
    const app = Vue.createApp({});

    app.component("test", {
        template: `<p>Willkommen</p>`
    });

    app.mount('#app');
</script>
    
</body>
</html>