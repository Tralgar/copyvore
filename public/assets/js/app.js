if (document.getElementById('login')) {
  var usernameInput = document.getElementById('username');
  if (usernameInput.value) {
    usernameInput.focus();
    setTimeout(function () {
      document.getElementById('password').focus();
    }, 20); // hack for double focus triggered
  }
}