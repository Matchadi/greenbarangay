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

// Sanitize inputs using htmlspecialchars()
$safeName    = htmlspecialchars($name,    ENT_QUOTES, 'UTF-8');
$safeEmail   = htmlspecialchars($email,   ENT_QUOTES, 'UTF-8');
$safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GreenBarangay — Form Response</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" />
  <style>
    body { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
    .response-card { max-width: 520px; width: 100%; background: #fff; border-radius: 20px; padding: 2.5rem; box-shadow: 0 4px 24px rgba(0,0,0,.08); }
    .response-card h2 { font-family: 'DM Serif Display', serif; color: var(--green-deep); }
    .field-row { margin-bottom: .6rem; font-size: .95rem; }
    .field-label { font-weight: 600; color: var(--text-mid); min-width: 90px; display: inline-block; }
    .error-list { background: #fff3f3; border-left: 4px solid #e74c3c; border-radius: 8px; padding: 1rem 1.2rem; }
    .error-list li { color: #c0392b; font-size: .92rem; }
  </style>
</head>
<body>
<div class="response-card">

<?php if (!empty($errors)): ?>
  <!-- ── ERROR RESPONSE ── -->
  <h2 style="color:#c0392b;">⚠️ Submission Error</h2>
  <p style="color:var(--text-mid);margin-bottom:1rem;">Please fix the following issues and try again:</p>
  <ul class="error-list">
    <?php foreach ($errors as $error): ?>
      <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
    <?php endforeach; ?>
  </ul>
  <a href="index.html" style="display:inline-block;margin-top:1.5rem;color:var(--green-mid);font-weight:600;text-decoration:none;">
    ← Go back to the form
  </a>

<?php else: ?>
  <!-- ── SUCCESS RESPONSE ── -->
  <div style="text-align:center;margin-bottom:1.5rem;">
    <span style="font-size:3rem;">✅</span>
    <h2 style="margin-top:.8rem;">Thank you, <?php echo $safeName; ?>!</h2>
    <p style="color:var(--text-mid);font-size:.95rem;">Your message has been received. We'll get back to you within 2–3 business days.</p>
  </div>
  <hr style="border-color:#e8f5e9;margin-bottom:1.2rem;" />
  <p style="font-size:.85rem;color:var(--text-mid);margin-bottom:.8rem;letter-spacing:1px;text-transform:uppercase;font-weight:600;">Submission Summary</p>
  <div class="field-row"><span class="field-label">Name:</span> <?php echo $safeName; ?></div>
  <div class="field-row"><span class="field-label">Email:</span> <?php echo $safeEmail; ?></div>
  <div class="field-row"><span class="field-label">Subject:</span> <?php echo $safeSubject; ?></div>
  <div class="field-row"><span class="field-label">Message:</span><br /><span style="color:var(--text-dark);"><?php echo nl2br($safeMessage); ?></span></div>
  <a href="index.html" style="display:inline-block;margin-top:1.5rem;background:var(--green-mid);color:#fff;padding:.7rem 1.8rem;border-radius:100px;text-decoration:none;font-weight:600;font-size:.95rem;">
    ← Back to GreenBarangay
  </a>

<?php endif; ?>

</div>
</body>
</html>
