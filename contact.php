<?php
// contact.php — GreenBarangay Volunteer Sign-Up Handler
// Receives form data via POST, sanitizes inputs, and returns a dynamic response.

// Server-side empty checks
$name    = isset($_POST['name'])    ? trim($_POST['name'])    : '';
$email   = isset($_POST['email'])   ? trim($_POST['email'])   : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

$errors = [];

if (empty($name)) {
    $errors[] = 'Full Name is required.';
}
if (empty($email)) {
    $errors[] = 'Email Address is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if (empty($subject)) {
    $errors[] = 'Subject is required.';
}
if (empty($message)) {
    $errors[] = 'Message is required.';
} elseif (strlen($message) < 20) {
    $errors[] = 'Message must be at least 20 characters.';
}

// Sanitize inputs using htmlspecialchars() to prevent XSS Attacks
$safeName    = htmlspecialchars($name,    ENT_QUOTES, 'UTF-8');
$safeEmail   = htmlspecialchars($email,   ENT_QUOTES, 'UTF-8');
$safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Status — GreenBarangay</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'DM Sans', sans-serif;
      background-color: #f4f7f5;
      color: #2c3e50;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
    }
    .response-card {
      background: #ffffff;
      max-width: 500px;
      width: 100%;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.05);
      padding: 2.5rem;
      border: 1px solid #e2ebd9;
    }
    .error-box {
      background-color: #fdf2f2;
      border-left: 4px solid #f87171;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1.5rem;
    }
    .error-list {
      margin: 0;
      padding-left: 1.2rem;
      color: #b91c1c;
      font-size: 0.9rem;
    }
    .field-row {
      margin-bottom: 0.8rem;
      font-size: 0.95rem;
      border-bottom: 1px dashed #edf2f7;
      padding-bottom: 0.5rem;
    }
    .field-label {
      font-weight: 600;
      color: #2e7d32;
      display: inline-block;
      width: 80px;
    }
    .message-content {
      background: #f8fafc;
      padding: 1rem;
      border-radius: 8px;
      font-size: 0.9rem;
      color: #4a5568;
      border: 1px solid #e2e8f0;
      margin-top: 0.4rem;
      white-space: pre-wrap;
    }
  </style>
</head>
<body>

<div class="response-card">
<?php if (!empty($errors)): ?>
  <div style="text-align:center;margin-bottom:1.5rem;">
    <span style="font-size:3rem;">❌</span>
    <h2 style="margin-top:.8rem;color:#b91c1c;">Submission Failed</h2>
    <p style="color:#64748b;font-size:.95rem;">Please fix the following validation errors:</p>
  </div>
  <div class="error-box">
    <ul class="error-list">
      <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <a href="index.html" style="display:inline-block;margin-top:1rem;color:#2e7d32;font-weight:600;text-decoration:none;">
    ← Go back and try again
  </a>

<?php else: ?>
  <div style="text-align:center;margin-bottom:1.5rem;">
    <span style="font-size:3rem;">✅</span>
    <h2 style="margin-top:.8rem;color:#2e7d32;">Thank you, <?php echo $safeName; ?>!</h2>
    <p style="color:#64748b;font-size:.95rem;">Your message has been received. We'll get back to you within 2–3 business days.</p>
  </div>
  <hr style="border: 0; border-top: 1px solid #e8f5e9; margin-bottom:1.2rem;" />
  <p style="font-size:.85rem;color:#64748b;margin-bottom:.8rem;letter-spacing:1px;text-transform:uppercase;font-weight:600;">Submission Summary</p>
  <div class="field-row"><span class="field-label">Name:</span> <?php echo $safeName; ?></div>
  <div class="field-row"><span class="field-label">Email:</span> <?php echo $safeEmail; ?></div>
  <div class="field-row"><span class="field-label">Subject:</span> <?php echo $safeSubject; ?></div>
  <div class="field-row" style="border:none;"><span class="field-label">Message:</span>
    <div class="message-content"><?php echo $safeMessage; ?></div>
  </div>
  <a href="index.html" style="display:inline-block;margin-top:1.5rem;color:#2e7d32;font-weight:600;text-decoration:none;">
    ← Go back to home
  </a>
<?php endif; ?>
</div>

</body>
</html>