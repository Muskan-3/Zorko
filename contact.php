<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "youremail@example.com"; // 🔹 यहां अपना ईमेल लिखें
    $subject = "New Franchise Inquiry - ZORKO";

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $state = htmlspecialchars($_POST['state']);

    $message = "
    <h2 style='color:#ff6600;'>Zorko New Franchise Application</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Address:</strong> $address</p>
    <p><strong>State:</strong> $state</p>
    ";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: <$email>\r\n";

    if (mail($to, $subject, $message, $headers)) {
        $success = true;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ZORKO Franchise | Apply Now</title>

<style>
body {
  background: #000;
  color: #fff;
  font-family: 'Poppins', sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 700px;
  margin: 50px auto;
  background: linear-gradient(145deg, #0a0a0a, #111);
  padding: 35px 40px;
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(255, 102, 0, 0.3);
  border: 1px solid rgba(255,255,255,0.05);
}

h2 {
  text-align: center;
  color: #ff6600;
  margin-bottom: 25px;
  text-shadow: 0 0 10px rgba(255, 102, 0, 0.5);
  letter-spacing: 1px;
}

form .form-group {
  margin-bottom: 18px;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #ffa366;
}

input, textarea, select {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 10px;
  background: #1a1a1a;
  color: #fff;
  font-size: 15px;
  box-shadow: inset 0 0 5px rgba(255,255,255,0.1);
}

textarea {
  height: 100px;
  resize: none;
}

button {
  width: 100%;
  background: linear-gradient(90deg, #ff4500, #ff6600);
  border: none;
  padding: 14px;
  border-radius: 10px;
  font-size: 17px;
  color: #fff;
  font-weight: bold;
  letter-spacing: 0.5px;
  cursor: pointer;
  transition: 0.3s ease;
  box-shadow: 0 0 15px rgba(255, 102, 0, 0.4);
}

button:hover {
  box-shadow: 0 0 25px rgba(255, 102, 0, 0.7);
  transform: translateY(-2px);
}

.footer-note {
  text-align: center;
  font-size: 14px;
  margin-top: 15px;
  color: #aaa;
}

/* Popup Styling */
.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  background: #111;
  border: 2px solid #ff6600;
  border-radius: 20px;
  padding: 30px 40px;
  text-align: center;
  box-shadow: 0 0 25px rgba(255,102,0,0.5);
  transition: all 0.4s ease;
  z-index: 999;
  opacity: 0;
}
.popup.active {
  transform: translate(-50%, -50%) scale(1);
  opacity: 1;
}
.popup h3 {
  color: #ff6600;
  margin-bottom: 10px;
}
.popup p {
  color: #fff;
  margin-bottom: 0;
}
.popup button {
  margin-top: 15px;
  background: #ff6600;
  border: none;
  color: #fff;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  transition: 0.3s;
}
.popup button:hover {
  background: #ff3300;
}
</style>
</head>
<body>

<div class="container">
  <h2>📩 Apply for ZORKO Franchise</h2>

  <form method="POST" action="">
    <div class="form-group">
      <label>Full Name</label>
      <input type="text" name="name" placeholder="Enter your name" required>
    </div>

    <div class="form-group">
      <label>Email ID</label>
      <input type="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
      <label>Mobile Number</label>
      <input type="tel" name="phone" placeholder="Enter your mobile number" required>
    </div>

    <div class="form-group">
      <label>Address</label>
      <textarea name="address" placeholder="Enter your complete address" required></textarea>
    </div>

    <div class="form-group">
      <label>Select State</label>
      <select name="state" required>
        <option value="">-- Select State --</option>
        <option>Andhra Pradesh</option>
        <option>Assam</option>
        <option>Bihar</option>
        <option>Gujarat</option>
        <option>Maharashtra</option>
        <option>Uttar Pradesh</option>
        <option>Delhi</option>
        <option>Rajasthan</option>
        <option>Madhya Pradesh</option>
        <option>West Bengal</option>
      </select>
    </div>

    <button type="submit">🚀 Submit Application</button>
  </form>

  <p class="footer-note">ZORKO © 2025 | All rights reserved.</p>
</div>

<?php if (!empty($success)): ?>
<div class="popup active" id="popupBox">
  <h3>✅ Thank You!</h3>
  <p>Your application has been sent successfully.<br>Our team will contact you within 24 hours.</p>
  <button onclick="closePopup()">OK</button>
</div>
<script>
function closePopup() {
  document.getElementById("popupBox").classList.remove("active");
}
setTimeout(closePopup, 3000);
</script>
<?php elseif (!empty($error)): ?>
<div class="popup active" id="popupBox">
  <h3>⚠️ Error!</h3>
  <p>Something went wrong. Please try again later.</p>
  <button onclick="closePopup()">OK</button>
</div>
<script>
function closePopup() {
  document.getElementById("popupBox").classList.remove("active");
}
</script>
<?php endif; ?>

</body>
</html>
