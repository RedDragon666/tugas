// scripts.js

function validateForm() {
  const name = document.forms["registerForm"]["name"].value;
  const email = document.forms["registerForm"]["email"].value;
  const password = document.forms["registerForm"]["password"].value;

  if (name === "" || email === "" || password === "") {
    alert("All fields must be filled out");
    return false;
  }

  if (password.length < 6) {
    alert("Password must be at least 6 characters long");
    return false;
  }

  return true;
}

function validateLoginForm() {
  const email = document.forms["loginForm"]["email"].value;
  const password = document.forms["loginForm"]["password"].value;

  if (email === "" || password === "") {
    alert("Email and Password must be filled out");
    return false;
  }

  return true;
}
