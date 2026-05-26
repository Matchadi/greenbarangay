# 🌿 GreenBarangay — Environmental Awareness Portfolio Site

A community-driven environmental awareness website built as a final integrative project for **Web Development Fundamentals (AY 2025–2026)**.

## 🔗 Live Site

> [GitHub Pages URL — update this after deployment](https://your-username.github.io/greenbarangay/)

---

## 📋 Project Overview

GreenBarangay is a multi-section portfolio/landing page for a fictional barangay environmental initiative. It showcases three core community programs — Tree Planting, Waste Segregation, and Clean Drive — and allows residents to sign up as volunteers through a validated contact form.

**Built with:**
- Bootstrap 5.3 (CDN)
- Bootstrap Icons 1.11
- Google Fonts (DM Serif Display, DM Sans)
- Vanilla JavaScript (form validation)
- PHP (server-side form handling)

---

## 📁 Project Structure

```
greenbarangay/
├── index.html        # Main HTML file
├── contact.php       # PHP form handler (run locally)
├── css/
│   └── custom.css    # Custom Bootstrap overrides & site styles
├── js/
│   └── main.js       # Scroll animations & form validation JS
├── images/           # (Local images, if any)
├── .gitignore
└── README.md
```

---

## 🚀 Running the PHP Back-End Locally

The static site (index.html) works directly in a browser. To test the PHP contact form handler, you need a local server.

### Option A — PHP Built-in Server (Recommended)

Make sure PHP is installed on your machine, then:

```bash
# Navigate to the project folder
cd greenbarangay/

# Start the built-in PHP server
php -S localhost:8000
```

Then open your browser and go to: `http://localhost:8000`

### Option B — XAMPP

1. Copy the entire `greenbarangay/` folder into your XAMPP `htdocs/` directory.
2. Start Apache in the XAMPP Control Panel.
3. Open your browser and go to: `http://localhost/greenbarangay/`

### Testing the PHP Form

The contact form in the modal posts to `contact.php`. To test it end-to-end locally:

1. Start your local server (see above).
2. Open the site and click **"Sign Up Now"** or **"Join Us"** to open the modal.
3. Fill in the form fields and submit.
4. You should be redirected to `contact.php` with a success confirmation page showing your sanitized inputs.
5. Try submitting with empty fields — `contact.php` will display server-side error messages.

> ⚠️ **Note:** GitHub Pages only hosts static files. The PHP handler will **not** run on the live GitHub Pages URL — it must be tested locally.

---

## 👥 Group Members & Contributions

| Member | Contribution |
|---|---|
| [Member 1 Name] | Navbar, Hero Section, Git setup |
| [Member 2 Name] | Programs Card Grid, CSS Theming |
| [Member 3 Name] | Modal, Bootstrap Form Validation |
| [Member 4 Name] | PHP contact.php handler (feature/php-form branch) |
| [Member 5 Name] | Volunteers Section, Footer, README & Deployment |

---

## 📌 Course Details

- **Course:** Web Development Fundamentals
- **Instructor:** Edward James V. Grageda
- **Academic Year:** 2025–2026
- **Submission Deadline:** May 26, 2026
