<?php
    include_once 'DB-Changes/Functions/fct_sqlconnect.php';
?>
<!Doctype html>
<html>
    <head>
        <title>Registrieren</title>
        <meta charset="utf-8">
        <style>
            .errorDescr{
                color: red;
                display: none;
            }
        </style>
        <script src="http://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
        //jquery einbinden
        </script>
    </head>
    <body>
        <form action="newUserSubmit.php" method="POST" id="newUserForm">
            <label for="username">Benutzername:</label><input type="text" name="username" id="username" placeholder="Username" title="Benutzername"><div class="errorDescr" id="usernameError">Bitte kein ' eingeben.</div><div class="errorDescr" id="missingUsername">Bitte geben Sie einen Namen an.</div><div class="errorDescr" id="usernameExisting">Dieser Benutzername ist bereits vergeben.</div><br>
            <label for="email">E-Mail:</label><input type="text" name="email" id="email" placeholder="email@example.com" title="E-Mail"><div class="errorDescr" id="emailError">Bitte kein ' eingeben.</div><div class="errorDescr" id="missingEmail">Bitte geben Sie eine E-Mail an.</div><br>
            <label for="password">Passwort:</label><input type="password" name="password" id="password" placeholder="Passwort eingeben" title="Passwort"><div class="errorDescr" id="passwordError">Bitte kein ' eingeben.</div><div class="errorDescr" id="missingPassword">Bitte geben Sie ein Passwort ein.</div><br>
            <label for="valpassword">Bestätigen:</label><input type="password" name="valpassword" id="valpassword" placeholder="Passwort bestätigen"><div class="errorDescr" id="passwordSame">Passwörter stimmen nicht überein</div><br>
            <input type="button" value="Jetzt Registrieren" onclick="validate()">
        </form> 

        <script>
            function submitForm()
            {
                document.getElementById("newUserForm").submit();
            }

            function resetUI()
            {
                var errorDescrs = document.getElementsByClassName("errorDescr");
                for(var i = 0;i<errorDescrs.length;i++)
                {
                    errorDescrs[i].style.display = "none";
                }
            }

            function checkPW()
            {
                const password = document.getElementById("password").value;
                const valpassword = document.getElementById("valpassword").value;

                if(password!=valpassword)
                {
                    document.getElementById("password").value = "";
                    document.getElementById("valpassword").value = "";
                    document.getElementById("passwordSame").style.display = "block";
                    return true;
                }
                return false;
            }

            function checkallinput()
            {
                const REGEX = /^[^']*$/;
                var error = false;

                const username = document.getElementById("username").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;

                if(username=="")
                {
                    document.getElementById("missingUsername").style.display = "block";
                    error = true;
                }
                else if(!REGEX.test(username))
                {
                    document.getElementById("usernameError").style.display = "block";
                    error = true;
                }
                
                if(email=="")
                {
                    document.getElementById("missingEmail").style.display = "block";
                    error = true;
                }
                else if(!REGEX.test(email))
                {
                    document.getElementById("emailError").style.display = "block";
                    error = true;
                }
                
                if(password=="")
                {
                    document.getElementById("missingPassword").style.display = "block";
                    error = true;
                }
                if(!REGEX.test(password))
                {
                    document.getElementById("passwordError").style.display = "block";
                    error = true;
                }
                
                return error;
            }

            const validate = () => {
                const username = document.getElementById("username").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;
                const valpassword = document.getElementById("valpassword").value;

                resetUI();

                var error_existing = false;
                pw_false = checkPW();
                
                type_error = checkallinput();
                
                error_existing = pw_false || type_error;

                if(error_existing)
                {
                    return;
                }
                var a = $.ajax({
                    type: "POST",
                    url: "validateUser.php",
                    data: {
                        username: username
                    },
                    async: true
                }).done(function(data){
                    if(data==0)
                    {
                        submitForm();
                    }
                    else if(data == 1)
                    {
                        document.getElementById("usernameExisting").style.display = "block";
                    }
                    else
                    {
                        alert("Die Kommunikation zwischen validateUser.php und hier stimmt nicht.");
                    }
                })
                
            }
        </script>
    </body>
</html>