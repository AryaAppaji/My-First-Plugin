<?php
function displayForm(){
?>
    <style>
        form{
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
    <div>
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="Name" placeholder="Enter Name" required autocomplete="off"><br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="Email" placeholder="Enter Email" required autocomplete="off"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
<?php
    }
?>