document.getElementById('admissionForm').addEventListener('submit', function (e) {
  e.preventDefault(); // stop default form submission

  const fullName = document.getElementById('fullname').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const marks = document.getElementById('marks').value;
  const file = document.getElementById('marksheet').files[0];

  if (fullName === "" || email === "" || phone === "" || !file) {
    alert("Please fill in all required fields.");
    return;
  }

  if (!email.includes("@") || !email.includes(".")) {
    alert("Enter a valid email address.");
    return;
  }

  if (phone.length < 10) {
    alert("Enter a valid 10-digit phone number.");
    return;
  }

  if (file.type !== "application/pdf") {
    alert("Only PDF files are allowed for marksheet.");
    return;
  }

  const confirmSubmit = confirm("Do you want to submit the application?");
if (!confirmSubmit) return;

  // Show success message
  document.getElementById("successMessage").style.display = "block";

  // Reset form after a few seconds
  setTimeout(() => {
    document.getElementById("admissionForm").reset();
  }, 3000);
});
