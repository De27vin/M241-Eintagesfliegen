<!-- Database inserting -->
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") { 

    include 'dbconnect.php';

    $eintagesfliege_name = $_POST["eintagesfliege_name"];
    $eintagesfliege_birthdate = $_POST["eintagesfliege_birthdate"];

    $sql = "SELECT * FROM eintagesfliegen WHERE eintagesfliege_name='$eintagesfliege_name'";

    $result = mysqli_query($connection, $sql);

    $num = mysqli_num_rows($result);


    if($num == 0) {

        $sql = "INSERT INTO `eintagesfliegen` ( `eintagesfliege_name`, `eintagesfliege_birthdate`) 
            VALUES ('$eintagesfliege_name', '$eintagesfliege_birthdate')";

        $result = mysqli_query($connection, $sql);

    } else {
        die("Error adding new Eintagesfliege: " . mysqli_error($connection));
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eintagesfliegen</title>
    <script src="https://unpkg.com/vue@3"></script> <!-- VueJS integration -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>



<!-- VueJS App Container -->
<div id="app">
    <welcoming></welcoming>

    <form action="index.php" method="post">
        <div class="form">
            <div class="title">Neue Fliege Hinzufügen</div>
                <div class="input-container ic1">
                    <input id="name" name="eintagesfliege_name" class="input" type="text" placeholder="" />
                    <div class="cut"></div>
                    <label for="name" class="placeholder">Name</label>
                </div>
                <div class="input-container ic2">
                    <input id="name" name="eintagesfliege_birthdate" class="input" type="date" placeholder="" />
                    <div class="cut"></div>
                    <label for="date" class="placeholder">Geburtsdatum</label>
                </div>
            <button type="text" class="submit">Hinzufügen</button>
        </div>
    </form>

    
</div>

<!-- PHP -->
<?php

?>

<!-- VueJS Initialisation -->
<script>
    const app = Vue.createApp({});

    // Welcoming with week day
    app.component("welcoming", {
        data() {
            return {
                day: this.getDay()
            }
        },
        methods: {
            getDay() {
                const days = ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"];
                const today = new Date();
                return days[today.getDay()];
            }
        },
        template: `<p>Guten {{ day }}</p>`
    });


    app.mount('#app');
</script>
    
</body>
</html>