<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate"])) {
            $length = $_POST["length"];
            $count = $_POST["count"];
            $uppercase = isset($_POST["uppercase"]);
            $lowercase = isset($_POST["lowercase"]);
            $numbers = isset($_POST["numbers"]);
            $symbols = isset($_POST["symbols"]);
            
            $characters = "";
            if ($uppercase) {
                $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            }
            if ($lowercase) {
                $characters .= "abcdefghijklmnopqrstuvwxyz";
            }
            if ($numbers) {
                $characters .= "0123456789";
            }
            if ($symbols) {
                $characters .= "!@#$%^&*()_+";
            }
            
            for ($i = 0; $i < $count; $i++) {
                echo "<div id='password'>" . substr(str_shuffle($characters), 0, $length) . "</div>";
            }
        }
        ?>