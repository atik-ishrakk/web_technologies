function validateForm() {
  let isValid = true;
  document.querySelectorAll(".error").forEach(e => e.style.display = "none");
  document.getElementById("success-message").style.display = "none";

  let fname = document.getElementById("fname").value.trim();
  if (!/^[A-Za-z]+$/.test(fname)) {
      document.getElementById("fname-error").style.display = "block";
      isValid = false;
  }

  let phone = document.getElementById("phone").value.trim();
  if (!/^\+88[0-9]{11}$/.test(phone)) {
      document.getElementById("phone-error").style.display = "block";
      isValid = false;
  }

  let email = document.getElementById("email").value.trim();
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      document.getElementById("email-error").style.display = "block";
      isValid = false;
  }

  let dob = document.getElementById("dob").value;
  if (!dob || new Date(dob) > new Date()) {
      document.getElementById("dob-error").style.display = "block";
      isValid = false;
  }

  let year = document.getElementById("year").value;
  if (!year || year < 1900 || year > 2025) {
      document.getElementById("year-error").style.display = "block";
      isValid = false;
  }

  if (isValid) {
      document.getElementById("success-message").style.display = "block";
  }

  return isValid;
}