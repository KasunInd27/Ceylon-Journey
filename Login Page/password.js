function togglePw()
    {
        var passwordField = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("showPW");

        if (showPasswordCheckbox.checked)
        {
            passwordField.type = "text";
        }
        else
        {
            passwordField.type = "password";
        }
    }