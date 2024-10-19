document.getElementById("signup-form").addEventListener("submit", function(event) {
    let errorMessage = "";
    let name = document.getElementById("sname").value.trim();
    let roll = document.getElementById("roll").value.trim();
    let email = document.getElementById("mail").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let dob = document.getElementById("dob").value.trim();
    let password = document.getElementById("pass").value.trim();

    // Clear previous alert messages
    errorMessage = "";

    if (name === "") {
        errorMessage += "Name is required.\n";
    }

    if (roll === "" || roll.length < 10) {
        errorMessage += "Registration number must be at least 10 characters long.\n";
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        errorMessage += "Please enter a valid email.\n";
    }

    if (phone.length !== 10) {
        errorMessage += "Phone number must be 10 digits long.\n";
    }

    if (dob === "") {
        errorMessage += "Date of Birth is required.\n";
    }

    if (password.length < 6) {
        errorMessage += "Password must be at least 6 characters long.\n";
    }

    // If there's an error, prevent form submission and show the alert
    if (errorMessage !== "") {
        alert(errorMessage);
        event.preventDefault(); // Prevent form submission
    }
});
