function togglePassword() {
  let psw = document.getElementById("password");

  if (psw.type === "password") psw.type = "text";
  else psw.type = "password";
}

function toggleAppearance() {
  let checkbox = document.getElementById("hide-psw");

  if (checkbox.parentNode.className === "lowkey") checkbox.parentNode.className = "lowkey unchecked";
  else checkbox.parentNode.className = "lowkey";
}