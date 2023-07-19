window.onload = function() {
    let fields = ['firstName', 'lastName', 'username', 'password', 'confirmPassword'];
    fields.forEach((field) => {
        let inputField = document.getElementById(field);
        inputField.addEventListener('keyup', function() {
            validateInput(field, inputField.value);
        });
    });
};

function validateInput(field, value) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById(field + 'Error').innerText = this.responseText;
        }
    };
    xmlhttp.open("POST", "validate.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("field=" + field + "&value=" + value);
}
function checkUsername() {
    let username = document.getElementById('username').value;
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'checkUsername.php', true);
  
    // Définir le contenu de l'en-tête de requête HTTP comme 'application/x-www-form-urlencoded'
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
    // Passer le paramètre 'username' dans le corps de la requête HTTP
    xhr.send('username=' + username);
  
    xhr.onload = function() {
      if (this.status == 200) {
        let response = JSON.parse(this.responseText);
        if (response.status == 'error') {
          document.getElementById('usernameError').innerText = response.message;
        } else {
          document.getElementById('usernameError').innerText = '';
        }
      }
    };
  }
  function checkPasswordMatch() {
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;
  
    if (password != confirmPassword) {
      document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
    } else {
      document.getElementById('confirmPasswordError').innerText = '';
    }
  }
document.getElementById('username').addEventListener('input', checkUsername);
document.getElementById('password').addEventListener('input', checkPasswordMatch);
document.getElementById('confirmPassword').addEventListener('input', checkPasswordMatch);
