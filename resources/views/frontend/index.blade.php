<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN Satu Atap 1 Bangodua</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
}

.hero-section {
    position: relative;
    height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
url('https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1920&h=1080&fit=crop');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    animation: index-zoomIn 1.5s ease-out forwards;
}

@keyframes index-zoomIn {
    0% {
transform: scale(1.2);
filter: blur(10px);
    }
    100% {
transform: scale(1);
filter: blur(0);
    }
}

.photo-grid {
    position: absolute;
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    padding: 20px;
    pointer-events: none;
}

.photo-item {
    background: white;
    padding: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    transform: rotate(var(--rotation));
    animation: index-photoEntry 1s ease-out forwards, index-float 6s ease-in-out infinite;
    animation-delay: var(--delay), calc(var(--delay) + 1s);
    opacity: 0;
}

@keyframes index-photoEntry {
    0% {
opacity: 0;
transform: scale(0) rotate(var(--rotation));
    }
    60% {
transform: scale(1.1) rotate(var(--rotation));
    }
    100% {
opacity: 1;
transform: scale(1) rotate(var(--rotation));
    }
}

.photo-item.top {
    grid-row: 1;
}

.photo-item.bottom {
    grid-row: 2;
    margin-top: 50px;
}

.photo-inner {
    width: 100%;
    height: 200px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.photo-portrait {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(30%) contrast(1.1);
}

@keyframes index-float {
    0%, 100% {
transform: translateY(0) rotate(var(--rotation));
    }
    50% {
transform: translateY(-20px) rotate(var(--rotation));
    }
}

.hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    color: white;
    max-width: 900px;
    padding: 40px;
    background: rgba(0,0,0,0.5);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    animation: index-fadeInUp 1.2s ease-out 0.5s forwards;
    opacity: 0;
}

@keyframes index-fadeInUp {
    0% {
opacity: 0;
transform: translateY(50px);
    }
    100% {
opacity: 1;
transform: translateY(0);
    }
}

.hero-badge {
    display: inline-block;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    animation: index-fadeIn 0.8s ease-out 0.8s forwards;
    opacity: 0;
}

@keyframes index-fadeIn {
    to {
opacity: 1;
    }
}

h1 {
    font-size: 3.5em;
    font-weight: bold;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-shadow: 3px 3px 6px rgba(0,0,0,0.5);
    animation: index-fadeIn 0.8s ease-out 1s forwards;
    opacity: 0;
}

.hero-subtitle {
    font-size: 1.3em;
    margin-bottom: 30px;
    font-weight: 300;
    line-height: 1.6;
    animation: index-fadeIn 0.8s ease-out 1.2s forwards;
    opacity: 0;
}

.cta-button {
    display: inline-block;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    color: white;
    padding: 15px 40px;
    text-decoration: none;
    border-radius: 30px;
    font-weight: bold;
    font-size: 1.1em;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    text-transform: uppercase;
    letter-spacing: 1px;
    animation: index-fadeInScale 0.8s ease-out 1.4s forwards;
    opacity: 0;
}

@keyframes index-fadeInScale {
    0% {
opacity: 0;
transform: scale(0.8);
    }
    100% {
opacity: 1;
transform: scale(1);
    }
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
}

.wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    display: none;
}

@keyframes slideDown {
    from {
transform: translateY(-100%);
opacity: 0;
    }
    to {
transform: translateY(0);
opacity: 1;
    }
}

@keyframes fadeInUp {
    from {
opacity: 0;
transform: translateY(30px);
    }
    to {
opacity: 1;
transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
opacity: 0;
    }
    to {
opacity: 1;
    }
}

/* Navbar Styles */
.navbar {
    background: transparent;
    padding: 1rem 2rem;
    box-shadow: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    animation: slideDown 0.6s ease-out;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1), 
box-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1),
padding 0.3s ease;
}

.navbar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    opacity: 0;
    transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: -1;
}

.navbar.scrolled::before {
    opacity: 1;
}

.navbar.scrolled {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo-section {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-shrink: 0;
    margin-right: auto;
}

.logo {
    width: 45px;
    height: 45px;
    object-fit: contain;
    border-radius: 50%;
    background: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeIn 0.8s ease-out 0.3s both;
    flex-shrink: 0;
}

.navbar.scrolled .logo {
    background: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.logo:hover {
    transform: scale(1.1);
}

.school-name {
    color: #FFD700;
    font-size: 1.1rem;
    font-weight: 600;
    animation: fadeIn 0.8s ease-out 0.4s both;
    transition: color 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                text-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    white-space: nowrap;
    line-height: 1.2;
    text-decoration: none;
}

.navbar.scrolled .school-name {
    color: white;
    text-shadow: none;
}

.nav-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
}

/* Hamburger Menu */
.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
    padding: 5px;
    z-index: 1001;
}

.hamburger span {
    width: 25px;
    height: 3px;
    background: #FFD700;
    border-radius: 3px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.navbar.scrolled .hamburger span {
    background: white;
}

.hamburger.active span:nth-child(1) {
    transform: rotate(45deg) translate(8px, 8px);
}

.hamburger.active span:nth-child(2) {
    opacity: 0;
}

.hamburger.active span:nth-child(3) {
    transform: rotate(-45deg) translate(8px, -8px);
}

.nav-menu {
    display: flex;
    gap: 1.5rem;
    list-style: none;
    align-items: center;
    margin-left: auto;
}

.nav-menu li {
    animation: fadeInUp 0.6s ease-out both;
    position: relative;
}

.nav-menu li:nth-child(1) { animation-delay: 0.5s; }
.nav-menu li:nth-child(2) { animation-delay: 0.6s; }
.nav-menu li:nth-child(3) { animation-delay: 0.7s; }
.nav-menu li:nth-child(4) { animation-delay: 0.8s; }
.nav-menu li:nth-child(5) { animation-delay: 0.9s; }
.nav-menu li:nth-child(6) { animation-delay: 1.1s; }
.nav-menu li:nth-child(7) { animation-delay: 1.3s; }
.nav-menu li:nth-child(8) { animation-delay: 1.5s; }

.menu-gw {
    color: #FFD700;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    padding: 0.5rem 0.8rem;
    border-radius: 5px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.9rem;
}

.navbar.scrolled .menu-gw {
    color: white;
    text-shadow: none;
}

.navbar.scrolled .menu-gw:hover {
    color: #FFD700;
    text-shadow: none;
}

.menu-gw:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

/* Dropdown Styles */
.dropdown {
    position: relative;
}

.dropdown .arrow {
    font-size: 0.7rem;
    transition: transform 0.3s ease;
}

.dropdown:hover .arrow {
    transform: rotate(180deg);
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: black;
    min-width: 200px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    list-style: none;
    padding: 0.5rem 0;
    margin-top: 0.5rem;
}

.dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-menu li {
    animation: none;
}

.dropdown-menu a {
    color: white;
    padding: 0.75rem 1.5rem;
    display: block;
    transition: all 0.3s ease;
    border-radius: 0;
    text-decoration: none;
}

.dropdown-menu a:hover {
    transform: translateX(5px);
    padding-left: 2rem;
    color: #FFD700;
}

.login-btn {
    background: #FFD700;
    color: white;
    padding: 0.7rem 1.5rem;
    border-radius: 25px;
    font-weight: bold;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 2px 8px rgba(255, 215, 0, 0.3);
    text-shadow: none;
    text-decoration: none;
}

.navbar.scrolled .login-btn {
    background: white;
    color: #667eea;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.login-btn:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 4px 12px rgba(255, 215, 0, 0.5);
}

.navbar.scrolled .login-btn:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
}

/* Content Area */
.content {
    flex: 1;
    padding: 3rem 2rem;
    background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
    margin-top: 80px;
}

.content-container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}

.content h1 {
    color: #667eea;
    margin-bottom: 1rem;
    font-size: 2.5rem;
    animation: fadeInUp 0.8s ease-out 1s both;
}

.content p {
    color: #666;
    font-size: 1.1rem;
    line-height: 1.6;
    animation: fadeInUp 0.8s ease-out 1.2s both;
}

/* ========== MODERN FOOTER STYLES ========== */
.modern-footer {
    background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
    color: #fff;
    position: relative;
    margin-top: auto;
}

.footer-wave {
    position: absolute;
    top: -1px;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.footer-wave svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 80px;
    fill: #0f2027;
}

.footer-content {
    padding: 4rem 2rem 2rem;
    max-width: 1400px;
    margin: 0 auto;
}

.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 3rem;
    margin-bottom: 2rem;
}

/* Footer Column */
.footer-col {
    animation: fadeInUp 0.8s ease-out both;
}

.footer-col:nth-child(1) { animation-delay: 0.2s; }
.footer-col:nth-child(2) { animation-delay: 0.3s; }
.footer-col:nth-child(3) { animation-delay: 0.4s; }
.footer-col:nth-child(4) { animation-delay: 0.5s; }

/* Logo Section */
.footer-logo-section {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.footer-logo {
    width: 50px;
    height: 50px;
    object-fit: contain;
    background: white;
    padding: 5px;
    border-radius: 8px;
}

.footer-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #fff;
    line-height: 1.3;
    margin: 0;
}

.footer-desc {
    color: #b8c6db;
    line-height: 1.8;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    text-decoration: none;
}

.social-link svg {
    width: 20px;
    height: 20px;
}

.social-link:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
}

/* Footer Heading */
.footer-heading {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: #fff;
    position: relative;
    padding-bottom: 0.5rem;
}

.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    border-radius: 2px;
}

/* Footer Links */
.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.8rem;
}

.footer-links a {
    color: #b8c6db;
    text-decoration: none;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    display: inline-block;
    position: relative;
}

.footer-links a::before {
    content: '→';
    position: absolute;
    left: -20px;
    opacity: 0;
    transition: all 0.3s ease;
}

.footer-links a:hover {
    color: #fff;
    padding-left: 20px;
}

.footer-links a:hover::before {
    opacity: 1;
    left: 0;
}

/* Contact Info */
.contact-info {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    color: #b8c6db;
    font-size: 0.95rem;
    line-height: 1.6;
}

.contact-item svg {
    width: 20px;
    height: 20px;
    flex-shrink: 0;
    margin-top: 2px;
    fill: #667eea;
}

.contact-item span {
    flex: 1;
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding: 1.5rem 2rem;
    background: rgba(0, 0, 0, 0.2);
}

.footer-bottom-content {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-bottom-content p {
    margin: 0;
    color: #b8c6db;
    font-size: 0.9rem;
}

/* sambutan-styles.css */

.sambutan-section {
    padding: 100px 20px;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    position: relative;
    overflow: hidden;
}

.sambutan-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: sambutan-float 8s ease-in-out infinite;
}

.sambutan-section::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -10%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(81, 137, 200, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: sambutan-float 10s ease-in-out infinite reverse;
}

@keyframes sambutan-float {
    0%, 100% {
transform: translate(0, 0) scale(1);
    }
    50% {
transform: translate(30px, -30px) scale(1.1);
    }
}

.sambutan-container {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* Header Styles */
.sambutan-header {
    text-align: center;
    margin-bottom: 60px;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.sambutan-header.sambutan-animate {
    opacity: 1;
    transform: translateY(0);
}

.sambutan-badge {
    display: inline-block;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    color: white;
    padding: 10px 25px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.sambutan-title {
    font-size: 2.8em;
    color: #2c3e50;
    margin-bottom: 20px;
    font-weight: 700;
}

.sambutan-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    margin: 0 auto;
    border-radius: 2px;
}

/* Content Styles */
.sambutan-content {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 60px;
    align-items: start;
}

/* Image Wrapper */
.sambutan-image-wrapper {
    opacity: 0;
    transform: translateX(-50px) scale(0.9);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1) 0.2s;
}

.sambutan-image-wrapper.sambutan-animate {
    opacity: 1;
    transform: translateX(0) scale(1);
}

.sambutan-image-card {
    position: relative;
    background: white;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    transition: all 0.4s ease;
}

.sambutan-image-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
}

.sambutan-image-border {
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    border-radius: 25px;
    z-index: -1;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.sambutan-image-card:hover .sambutan-image-border {
    opacity: 1;
}

.sambutan-image {
    width: 100%;
    height: auto;
    border-radius: 15px;
    display: block;
    transition: all 0.4s ease;
}

.sambutan-image-card:hover .sambutan-image {
    transform: scale(0.98);
}

.sambutan-name-card {
    margin-top: 20px;
    text-align: center;
    padding: 20px;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    border-radius: 15px;
    color: white;
    transform: translateY(10px);
    opacity: 0;
    animation: sambutan-slideUp 0.6s ease-out 0.8s forwards;
}

@keyframes sambutan-slideUp {
    to {
transform: translateY(0);
opacity: 1;
    }
}

.sambutan-name-card h3 {
    font-size: 1.5em;
    margin-bottom: 5px;
    font-weight: 700;
}

.sambutan-name-card p {
    font-size: 1em;
    opacity: 0.9;
}

/* Text Wrapper */
.sambutan-text-wrapper {
    opacity: 0;
    transform: translateX(50px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1) 0.4s;
}

.sambutan-text-wrapper.sambutan-animate {
    opacity: 1;
    transform: translateX(0);
}

.sambutan-greeting {
    margin-bottom: 30px;
}

.sambutan-arabic {
    font-size: 1.3em;
    color: #667eea;
    font-weight: 600;
    margin-bottom: 10px;
    font-style: italic;
}

.sambutan-intro {
    font-size: 1.2em;
    color: #2c3e50;
    font-weight: 500;
}

.sambutan-message {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.sambutan-message::before {
    content: '"';
    position: absolute;
    top: 10px;
    left: 20px;
    font-size: 80px;
    color: rgba(102, 126, 234, 0.1);
    font-family: Georgia, serif;
    line-height: 1;
}

.sambutan-message p {
    font-size: 1.1em;
    line-height: 1.8;
    color: #555;
    margin-bottom: 20px;
    position: relative;
    z-index: 1;
}

.sambutan-message p:last-child {
    margin-bottom: 0;
}

.sambutan-closing {
    font-weight: 600;
    color: #2c3e50;
}

.sambutan-arabic-closing {
    font-style: italic;
    color: #667eea;
    font-weight: 600;
}

.sambutan-signature {
    text-align: right;
    padding: 20px 0;
}

.sambutan-signature-line {
    width: 200px;
    height: 2px;
    background: linear-gradient(90deg, transparent 0%, #667eea 100%);
    margin-left: auto;
    margin-bottom: 15px;
}

.sambutan-signature-name {
    font-size: 1.3em;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 5px;
}

.sambutan-signature-title {
    font-size: 1em;
    color: #666;
    font-style: italic;
}

.berita-index-section {
    padding: 100px 20px;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    position: relative;
    overflow: hidden;
}

.berita-index-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: berita-index-float 10s ease-in-out infinite;
}

.berita-index-section::after {
    content: '';
    position: absolute;
    bottom: -30%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    animation: berita-index-float 12s ease-in-out infinite reverse;
}

@keyframes berita-index-float {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    50% {
        transform: translate(40px, -40px) scale(1.1);
    }
}

.berita-index-container {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* Header Styles */
.berita-index-header {
    text-align: center;
    margin-bottom: 60px;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.berita-index-header.berita-index-animate {
    opacity: 1;
    transform: translateY(0);
}

.berita-index-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    color: white;
    padding: 10px 25px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.berita-index-title {
    font-size: 2.8em;
    color: white;
    margin-bottom: 20px;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.berita-index-divider {
    width: 80px;
    height: 4px;
    background: white;
    margin: 0 auto;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

/* Slider Wrapper */
.berita-index-slider-wrapper {
    position: relative;
    padding: 0 60px;
    margin-bottom: 40px;
}

.berita-index-slider {
    overflow: hidden;
    border-radius: 20px;
}

.berita-index-track {
    display: flex;
    gap: 30px;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Card Styles */
.berita-index-card {
    min-width: calc((100% - 60px) / 3);
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    transform: scale(0.9) translateY(30px);
    cursor: pointer;
}

.berita-index-card.berita-index-animate {
    opacity: 1;
    transform: scale(1) translateY(0);
}

.berita-index-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.berita-index-image {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
}

.berita-index-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.berita-index-card:hover .berita-index-image img {
    transform: scale(1.15);
}

.berita-index-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.berita-index-card:hover .berita-index-overlay {
    opacity: 1;
}

.berita-index-content {
    padding: 25px;
}

.berita-index-time {
    display: inline-block;
    color: #667eea;
    font-size: 0.85em;
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.berita-index-card-title {
    font-size: 1.3em;
    color: #2c3e50;
    margin-bottom: 12px;
    font-weight: 700;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.berita-index-card:hover .berita-index-card-title {
    color: #667eea;
}

.berita-index-description {
    font-size: 0.95em;
    color: #666;
    line-height: 1.6;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Navigation Buttons */
.berita-index-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: white;
    border: none;
    border-radius: 50%;
    font-size: 2em;
    color: #667eea;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    animation: berita-index-fadeIn 0.6s ease-out 1s forwards;
}

@keyframes berita-index-fadeIn {
    to {
        opacity: 1;
    }
}

.berita-index-nav-btn:hover {
    background: #667eea;
    color: white;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.berita-index-nav-btn:active {
    transform: translateY(-50%) scale(0.95);
}

.berita-index-prev {
    left: 0;
}

.berita-index-next {
    right: 0;
}

.berita-index-nav-btn span {
    line-height: 1;
    display: block;
    margin-top: -5px;
}

/* Dots Navigation */
.berita-index-dots {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 40px;
    opacity: 0;
    animation: berita-index-fadeIn 0.6s ease-out 1.2s forwards;
}

.berita-index-dot {
    width: 12px;
    height: 12px;
    background: rgba(255, 255, 255, 0.3);
    border: 2px solid white;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.berita-index-dot:hover {
    background: rgba(255, 255, 255, 0.6);
    transform: scale(1.2);
}

.berita-index-dot.berita-index-active {
    background: white;
    width: 40px;
    border-radius: 6px;
}

/* CTA Button */
.berita-index-button-wrapper {
    text-align: center;
    opacity: 0;
    animation: berita-index-fadeIn 0.6s ease-out 1.4s forwards;
}

.berita-index-cta-button {
    display: inline-block;
    background: white;
    color: #667eea;
    padding: 15px 40px;
    text-decoration: none;
    border-radius: 30px;
    font-weight: bold;
    font-size: 1.1em;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.berita-index-cta-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    background: #2c3e50;
    color: white;
}

/* ============================================
   MENGAPA SECTION - CSS STYLES
   ============================================ */

.mengapa-section {
    padding: 100px 20px;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    position: relative;
    overflow: hidden;
}

.mengapa-section::before {
    content: '';
    position: absolute;
    top: -30%;
    right: -15%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: mengapa-float 12s ease-in-out infinite;
}

.mengapa-section::after {
    content: '';
    position: absolute;
    bottom: -20%;
    left: -10%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(81, 137, 200, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    animation: mengapa-float 15s ease-in-out infinite reverse;
}

@keyframes mengapa-float {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    50% {
        transform: translate(30px, -30px) scale(1.1);
    }
}

.mengapa-container {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* Header Styles */
.mengapa-header {
    text-align: center;
    margin-bottom: 70px;
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.mengapa-header.mengapa-animate {
    opacity: 1;
    transform: translateY(0);
}

.mengapa-badge {
    display: inline-block;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    color: white;
    padding: 10px 25px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.mengapa-title {
    font-size: 2.8em;
    color: #2c3e50;
    margin-bottom: 20px;
    font-weight: 700;
}

.mengapa-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    margin: 0 auto 25px;
    border-radius: 2px;
}

.mengapa-subtitle {
    font-size: 1.15em;
    color: #666;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
}

/* Cards Wrapper */
.mengapa-cards-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 40px;
    margin-bottom: 60px;
}

/* Card Styles */
.mengapa-card {
    background: white;
    border-radius: 25px;
    padding: 45px 35px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    opacity: 0;
    transform: translateY(50px) scale(0.95);
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.mengapa-card.mengapa-animate {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.mengapa-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.mengapa-card:hover::before {
    transform: scaleX(1);
}

.mengapa-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
}

/* Icon Wrapper */
.mengapa-icon-wrapper {
    margin-bottom: 25px;
    position: relative;
}

.mengapa-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    position: relative;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.mengapa-icon svg {
    width: 40px;
    height: 40px;
    transition: all 0.4s ease;
}

.mengapa-card:hover .mengapa-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
}

.mengapa-card:hover .mengapa-icon svg {
    transform: scale(1.1);
}

/* Card Content */
.mengapa-card-title {
    font-size: 1.5em;
    color: #2c3e50;
    margin-bottom: 15px;
    font-weight: 700;
    transition: color 0.3s ease;
}

.mengapa-card:hover .mengapa-card-title {
    color: #667eea;
}

.mengapa-card-description {
    font-size: 1em;
    color: #666;
    line-height: 1.7;
    margin-bottom: 25px;
}

/* Feature Tags */
.mengapa-card-features {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.mengapa-feature-tag {
    display: inline-block;
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.85em;
    font-weight: 600;
    transition: all 0.3s ease;
}

.mengapa-card:hover .mengapa-feature-tag {
    background: rgba(102, 126, 234, 0.2);
    transform: translateY(-2px);
}

.capaian-section {
    padding: 100px 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
    overflow: hidden;
}

.capaian-section::before {
    content: '';
    position: absolute;
    top: -40%;
    right: -15%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    animation: capaian-float 15s ease-in-out infinite;
}

.capaian-section::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(81, 137, 200, 0.06) 0%, transparent 70%);
    border-radius: 50%;
    animation: capaian-float 18s ease-in-out infinite reverse;
}

@keyframes capaian-float {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    50% {
        transform: translate(40px, -40px) scale(1.1);
    }
}

.capaian-container {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* Header Styles */
.capaian-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 60px;
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.capaian-header.capaian-animate {
    opacity: 1;
    transform: translateY(0);
}

.capaian-badge {
    display: inline-block;
    background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.capaian-title {
    font-size: 2.8em;
    color: #2c3e50;
    font-weight: 700;
    letter-spacing: 2px;
}

.capaian-view-all {
    display: flex;
    align-items: center;
}

.capaian-view-link {
    color: #e63946;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.capaian-view-link:hover {
    color: #d62828;
    gap: 12px;
}

.capaian-arrow {
    font-size: 18px;
    transition: transform 0.3s ease;
}

.capaian-view-link:hover .capaian-arrow {
    transform: translateX(5px);
}

/* Grid Layout */
.capaian-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto;
    gap: 30px;
}

/* Card Base Styles */
.capaian-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    transform: translateY(50px) scale(0.95);
    position: relative;
    will-change: transform, box-shadow;
}

.capaian-card.capaian-animate {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.capaian-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Large Featured Card */
.capaian-large {
    grid-row: span 2;
}

.capaian-large .capaian-image-wrapper {
    height: 450px;
}

/* Small Cards Grid */
.capaian-small-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.capaian-small .capaian-image-wrapper {
    height: 200px;
}

/* Image Wrapper */
.capaian-image-wrapper {
    position: relative;
    overflow: hidden;
    background: #f0f0f0;
}

.capaian-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

.capaian-card:hover {
    transform: scale(1.1);
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Overlay */
.capaian-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%);
    opacity: 0;
    transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px;
}

.capaian-card:hover .capaian-overlay {
    opacity: 1;
    transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.capaian-badge-small {
    display: inline-block;
    background: rgba(255, 255, 255, 0.9);
    color: #667eea;
    padding: 6px 15px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    align-self: flex-start;
    transform: translateY(-10px);
    opacity: 0;
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.capaian-card:hover .capaian-badge-small {
    transform: translateY(0);
    opacity: 1;
    transition-delay: 0.1s;
}

/* Content */
.capaian-content {
    padding: 25px;
}

.capaian-date {
    display: inline-block;
    color: #667eea;
    font-size: 0.85em;
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.capaian-card-title {
    font-size: 1.2em;
    color: #2c3e50;
    margin-bottom: 15px;
    font-weight: 700;
    line-height: 1.4;
    transition: color 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.capaian-card:hover .capaian-card-title {
    color: #667eea;
    transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.capaian-description {
    font-size: 0.95em;
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}

.capaian-read-more {
    display: inline-flex;
    align-items: center;
    color: #667eea;
    font-size: 0.9em;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    gap: 5px;
}

.capaian-read-more:hover {
    color: #764ba2;
    gap: 10px;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Large Card Specific Styles */
.capaian-large .capaian-content {
    padding: 30px;
}

.capaian-large .capaian-card-title {
    font-size: 1.6em;
    -webkit-line-clamp: 3;
}

/* Ripple Animation */
@keyframes capaian-ripple-animation {
    to {
        width: 300px;
        height: 300px;
        opacity: 0;
    }
}
        @media (max-width: 768px) {
            h1 {
                font-size: 2em;
            }
            
            .hero-subtitle {
                font-size: 1em;
            }

            .photo-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .photo-item {
                height: 150px;
            }

            .navbar {
                padding: 1rem;
            }

            .hamburger {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 57px;
                flex-direction: column;
                background: linear-gradient(135deg, #08239c 0%, #5189c8 100%);
                backdrop-filter: blur(10px);
                width: 100%;
                text-align: center;
                transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                padding: 2rem 1rem;
                gap: 0;
            }

            .navbar:not(.scrolled) .nav-menu {
                background: transparent;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu li {
                width: 100%;
                animation: none;
                margin-bottom: 10px;
            }

            .menu-gw {
                display: block;
                padding: 1rem;
                margin: 0.5rem 0;
                color: white;
                text-shadow: none;
                border-radius: 10px;
            }

            .menu-gw:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: none;
            }

            .login-btn {
                background: white;
                color: #667eea;
                margin-top: 1rem;
                width: 100%;
                margin-top: 5px;
            }

            .logo-section {
                gap: 0.5rem;
            }

            .logo {
                width: 35px;
                height: 35px;
            }

            .school-name {
                font-size: 0.75rem;
                white-space: normal;
                line-height: 1.2;
                max-width: 180px;
            }

            /* Dropdown Menu Mobile */
            .dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                background: rgba(255, 255, 255, 0.1);
                display: none;
                margin-top: 0;
            }

            .dropdown.active .dropdown-menu {
                display: block;
            }

            .dropdown-menu a {
                color: #ffffff;
                padding: 0.75rem 2rem;
            }

            .dropdown-menu a:hover {
                background: rgba(255, 255, 255, 0.2);
            }

            .content {
                padding: 2rem 1rem;
                margin-top: 70px;
            }

            .content h1 {
                font-size: 1.8rem;
            }

            .content p {
                font-size: 1rem;
            }

            /* Footer */
    .footer-content {
        padding: 3rem 1.5rem 1.5rem;
    }

    .footer-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .footer-col {
        animation: none;
    }

    .footer-logo-section {
        flex-direction: column;
        align-items: flex-start;
    }

    .footer-title {
        font-size: 1rem;
    }

    .footer-desc {
        font-size: 0.9rem;
    }

    .footer-heading {
        font-size: 1.1rem;
    }

    .footer-wave svg {
        height: 40px;
    }

    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }

    .social-links {
        justify-content: flex-start;
    }

    .contact-item {
        font-size: 0.9rem;
    }

            .sambutan-section {
                padding: 60px 20px;
            }

            .sambutan-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .sambutan-title {
                font-size: 2em;
            }

            .sambutan-badge {
                font-size: 12px;
                padding: 8px 20px;
            }

            .sambutan-header {
                margin-bottom: 40px;
            }

            .sambutan-image-wrapper {
                max-width: 400px;
                margin: 0 auto;
            }

            .sambutan-message {
                padding: 30px 25px;
            }

            .sambutan-message::before {
                font-size: 60px;
                top: 5px;
                left: 10px;
            }

            .sambutan-message p {
                font-size: 1em;
                line-height: 1.7;
            }

            .sambutan-arabic {
                font-size: 1.15em;
            }

            .sambutan-intro {
                font-size: 1.05em;
            }

            .sambutan-signature {
                text-align: center;
            }

            .sambutan-signature-line {
                margin: 0 auto 15px;
            }

            .sambutan-signature-name {
                font-size: 1.2em;
            }

            .sambutan-signature-title {
                font-size: 0.9em;
            }

            .sambutan-name-card h3 {
                font-size: 1.3em;
            }

            .sambutan-name-card p {
                font-size: 0.9em;
            }

            .sambutan-image-card:hover {
                transform: translateY(-5px);
            }

            .sambutan-message:hover {
                transform: translateY(-3px);
            }
            
            .berita-index-section {
        padding: 60px 20px;
    }

    .berita-index-title {
        font-size: 2em;
    }

    .berita-index-badge {
        font-size: 12px;
        padding: 8px 20px;
    }

    .berita-index-slider-wrapper {
        padding: 0 50px;
    }

    .berita-index-card {
        min-width: 100%;
    }

    .berita-index-track {
        gap: 20px;
    }

    .berita-index-nav-btn {
        width: 40px;
        height: 40px;
        font-size: 1.5em;
    }

    .berita-index-image {
        height: 200px;
    }

    .berita-index-card-title {
        font-size: 1.15em;
    }

    .berita-index-description {
        font-size: 0.9em;
    }

    .berita-index-cta-button {
        padding: 12px 30px;
        font-size: 1em;
    }

    .mengapa-section {
        padding: 60px 20px;
    }

    .mengapa-title {
        font-size: 2em;
    }

    .mengapa-subtitle {
        font-size: 1em;
    }

    .mengapa-badge {
        font-size: 12px;
        padding: 8px 20px;
    }

    .mengapa-header {
        margin-bottom: 50px;
    }

    .mengapa-cards-wrapper {
        grid-template-columns: 1fr;
        gap: 30px;
        margin-bottom: 40px;
    }

    .mengapa-card {
        padding: 35px 25px;
    }

    .mengapa-icon {
        width: 70px;
        height: 70px;
    }

    .mengapa-icon svg {
        width: 35px;
        height: 35px;
    }

    .mengapa-card-title {
        font-size: 1.3em;
    }

    .mengapa-card-description {
        font-size: 0.95em;
    }

    .mengapa-feature-tag {
        font-size: 0.8em;
        padding: 6px 12px;
    }

    .mengapa-card:hover {
        transform: translateY(-10px) scale(1.01);
    }

    .capaian-section {
        padding: 60px 15px;
    }

    .capaian-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 30px;
    }

    .capaian-badge {
        font-size: 11px;
        padding: 6px 15px;
    }

    .capaian-title {
        font-size: 1.8em;
    }

    .capaian-view-link {
        font-size: 12px;
    }

    .capaian-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .capaian-large {
        grid-row: span 1;
    }

    .capaian-small-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .capaian-large .capaian-image-wrapper,
    .capaian-small .capaian-image-wrapper {
        height: 220px;
    }

    .capaian-content {
        padding: 20px;
    }

    .capaian-large .capaian-content {
        padding: 20px;
    }

    .capaian-card-title {
        font-size: 1.1em;
    }

    .capaian-large .capaian-card-title {
        font-size: 1.3em;
    }

    .capaian-card:hover {
        transform: translateY(-10px) scale(1.01);
    }

    .capaian-date {
        font-size: 0.8em;
    }

    .capaian-description {
        font-size: 0.9em;
    }

    .capaian-read-more {
        font-size: 0.85em;
    }
        }

        /* Tablet Responsive */
        @media (max-width: 1024px) and (min-width: 769px) {
            .nav-menu {
                gap: 1rem;
            }

            .school-name {
                font-size: 1.1rem;
            }

            .menu-gw {
                font-size: 0.95rem;
                padding: 0.5rem 0.8rem;
            }

            .login-btn {
                padding: 0.6rem 1.2rem;
            }

            /* Footer */
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
            }

            .footer-wave svg {
                height: 60px;
            }

            .sambutan-section {
                padding: 80px 30px;
            }

            .sambutan-content {
                grid-template-columns: 1fr 1.5fr;
                gap: 50px;
            }

            .sambutan-title {
                font-size: 2.4em;
            }

            .sambutan-message {
                padding: 35px 30px;
            }

            .sambutan-message p {
                font-size: 1.05em;
            }

            .sambutan-arabic {
                font-size: 1.2em;
            }

            .sambutan-intro {
                font-size: 1.1em;
            }

            .sambutan-signature-name {
                font-size: 1.2em;
            }

            .sambutan-signature-title {
                font-size: 0.95em;
            }

            .berita-index-section {
        padding: 80px 20px;
    }

    .berita-index-title {
        font-size: 2.4em;
    }

    .berita-index-slider-wrapper {
        padding: 0 55px;
    }

    .berita-index-nav-btn {
        width: 45px;
        height: 45px;
        font-size: 1.8em;
    }

    .berita-index-card-title {
        font-size: 1.2em;
    }

    .mengapa-section {
        padding: 80px 30px;
    }

    .mengapa-title {
        font-size: 2.4em;
    }

    .mengapa-subtitle {
        font-size: 1.05em;
    }

    .mengapa-cards-wrapper {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 35px;
    }

    .mengapa-card {
        padding: 40px 30px;
    }

    .mengapa-card-title {
        font-size: 1.4em;
    }

    .capaian-section {
        padding: 80px 20px;
    }

    .capaian-header {
        margin-bottom: 50px;
    }

    .capaian-title {
        font-size: 2.4em;
    }

    .capaian-badge {
        font-size: 12px;
        padding: 7px 18px;
    }

    .capaian-view-link {
        font-size: 13px;
    }

    .capaian-grid {
        gap: 25px;
    }

    .capaian-large .capaian-image-wrapper {
        height: 400px;
    }

    .capaian-small .capaian-image-wrapper {
        height: 180px;
    }

    .capaian-content {
        padding: 22px;
    }

    .capaian-large .capaian-content {
        padding: 28px;
    }

    .capaian-card-title {
        font-size: 1.15em;
    }

    .capaian-large .capaian-card-title {
        font-size: 1.5em;
    }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="logo-section">
                <img src="{{ asset('assets/img/Logo Satap.png') }}" alt="Logo SMPN Satu Atap 1" class="logo">
                <a href="{{ url('/') }}" class="school-name">SMP NEGERI SATU ATAP 1 BANGODUA</a>
            </div>
            
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="nav-menu" id="navMenu">
                <li class="dropdown">
                    <a href="" class="menu-gw">Informasi <span class="arrow">▼</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/lokasi') }}">Lokasi</a></li>
                        <li><a href="{{ url('/tentang') }}">Sejarah & Visi Misi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="menu-gw">Struktur Organisasi <span class="arrow">▼</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/osis') }}">Osis</a></li>
                        <li><a href="{{ url('/guru') }}">Guru dan Staff</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/berita') }}" class="menu-gw">Berita</a></li>
                <li><a href="{{ url('/karya') }}" class="menu-gw">Karya</a></li>
                <li><a href="{{ url('/galeri') }}" class="menu-gw">Galeri</a></li>
                <li><a href="{{ url('/ekstrakurikuler') }}" class="menu-gw">Ekstrakurikuler</a></li>
                <li><a href="{{ url('/spmb') }}" class="menu-gw">SPMB</a></li>
                <li><a href="{{ url('/login') }}" class="login-btn">Login Admin</a></li>
            </ul>
        </div>
    </nav>

    <section class="hero-section">
    <div class="photo-grid">

        {{-- 5 GAMBAR ATAS --}}
        @for($i = 1; $i <= 5; $i++)
            @php
                $rel = 'gambarKecil'.$i;
            @endphp
            <div class="photo-item top"
                 style="--rotation: {{ [8,-5,6,-7,5][$i-1] }}deg; --delay: {{ ($i-1)*0.5 }}s;">
                <div class="photo-inner">
                    @if($hero->$rel)
                        <img src="{{ asset('storage/'.$hero->$rel->gambar) }}"
                             class="photo-portrait"
                             alt="Hero Image {{ $i }}">
                    @else
                        <div class="photo-portrait bg-secondary"></div>
                    @endif
                </div>
            </div>
        @endfor

        {{-- 5 GAMBAR BAWAH --}}
        @for($i = 6; $i <= 10; $i++)
            @php
                $rel = 'gambarKecil'.$i;
            @endphp
            <div class="photo-item bottom"
                 style="--rotation: {{ [-6,7,-5,8,-7][$i-6] }}deg; --delay: {{ (($i-6)*0.5)+0.3 }}s;">
                <div class="photo-inner">
                    @if($hero->$rel)
                        <img src="{{ asset('storage/'.$hero->$rel->gambar) }}"
                             class="photo-portrait"
                             alt="Hero Image {{ $i }}">
                    @else
                        <div class="photo-portrait bg-secondary"></div>
                    @endif
                </div>
            </div>
        @endfor

    </div>

    {{-- TEKS HERO --}}
    <div class="hero-content">
        <div class="hero-badge">Website Resmi</div>

        <h1>{{ $hero->judul ?? 'SMPN SATU ATAP 1 BANGODUA' }}</h1>

        <p class="hero-subtitle">
            {{ $hero->subjudul ?? 'Membentuk generasi muda yang cerdas, berkarakter, dan siap menghadapi masa depan yang lebih baik' }}
        </p>

        <a href="{{ route('galeri.index') }}" class="cta-button">
            Galeri Lengkap Kami
        </a>
    </div>
</section>


<section class="sambutan-section" id="sambutan">
    <div class="sambutan-container">
        <div class="sambutan-header">
            <span class="sambutan-badge">Sambutan</span>
            <h2 class="sambutan-title">Sambutan Kepala Sekolah</h2>
            <div class="sambutan-divider"></div>
        </div>

        <div class="sambutan-content">

            {{-- FOTO KEPALA SEKOLAH --}}
            <div class="sambutan-image-wrapper">
                <div class="sambutan-image-card">
                    <div class="sambutan-image-border"></div>

                    <img
                        src="{{ 
                            $sambutan && $sambutan->fotoKepala && $sambutan->fotoKepala->foto
                                ? asset('storage/' . $sambutan->fotoKepala->foto)
                                : asset('assets/img/default-user.jpg')
                        }}"
                        alt="Kepala Sekolah"
                        class="sambutan-image"
                    >

                    <div class="sambutan-name-card">
                        <h3>
                            {{ $sambutan->kepalaGuru->nama ?? 'Nama Kepala Sekolah' }}
                        </h3>
                        <p>Kepala Sekolah</p>
                    </div>
                </div>
            </div>

            {{-- TEKS SAMBUTAN --}}
            <div class="sambutan-text-wrapper">

                <div class="sambutan-greeting">
                    <p class="sambutan-arabic">
                        Assalamu'alaikum warahmatullahi wabarakatuh,
                    </p>
                </div>

                <div class="sambutan-message">
                    @if($sambutan && $sambutan->sambutan_kepala)
                        {!! $sambutan->sambutan_kepala !!}
                    @else
                        <p class="text-muted fst-italic">
                            Sambutan kepala sekolah belum tersedia.
                        </p>
                    @endif
                </div>

                <div class="sambutan-signature">
                    <div class="sambutan-signature-line"></div>

                    <p class="sambutan-signature-name">
                        {{ $sambutan->kepalaGuru->nama ?? '—' }}
                    </p>

                    <p class="sambutan-signature-title">
                        Kepala Sekolah {{ config('app.name') }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>


    <!-- Section Berita - Letakkan setelah section sambutan -->
    <section class="berita-index-section" id="berita">
    <div class="berita-index-container">
        <div class="berita-index-header">
            <span class="berita-index-badge">Berita Terbaru</span>
            <h2 class="berita-index-title">Aktivitas Terbaru Siswa dan Berita Lebih Lanjut</h2>
            <div class="berita-index-divider"></div>
        </div>

        <div class="berita-index-slider-wrapper">
            <button class="berita-index-nav-btn berita-index-prev" id="beritaPrev"><span>‹</span></button>

            <div class="berita-index-slider" id="beritaSlider">
                <div class="berita-index-track" id="beritaTrack">

                    @foreach($beritas as $berita)
                    <div class="berita-index-card">
                        <div class="berita-index-image">
                            <img src="{{ asset('storage/' . ($berita->galeri->gambar ?? 'default.jpg')) }}"
                                 alt="{{ $berita->judul }}">
                            <div class="berita-index-overlay"></div>
                        </div>

                        <div class="berita-index-content">
                            <span class="berita-index-time">
                                {{ $berita->created_at->diffForHumans() }}
                            </span>

                            <h3 class="berita-index-card-title">
                                {{ $berita->judul }}
                            </h3>

                            <p class="berita-index-description">
                                {{ Str::limit(strip_tags($berita->konten), 120) }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <button class="berita-index-nav-btn berita-index-next" id="beritaNext"><span>›</span></button>
        </div>

        <div class="berita-index-dots" id="beritaDots"></div>

        <div class="berita-index-button-wrapper">
            <a href="{{ route('frontend.berita') }}" class="berita-index-cta-button">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>



    <section class="mengapa-section" id="mengapa">
        <div class="mengapa-container">
            <div class="mengapa-header">
                <span class="mengapa-badge">Keunggulan Kami</span>
                <h2 class="mengapa-title">Mengapa Memilih Sekolah Ini?</h2>
                <div class="mengapa-divider"></div>
                <p class="mengapa-subtitle">
                    Kami menyediakan berbagai fasilitas dan sistem terpadu untuk mendukung 
                    kegiatan belajar mengajar yang efektif dan efisien
                </p>
            </div>

            <div class="mengapa-cards-wrapper">
                <!-- Card 1 -->
                <div class="mengapa-card">
                    <div class="mengapa-icon-wrapper">
                        <div class="mengapa-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <h3 class="mengapa-card-title">Sistem Billing & Invoice Online</h3>
                    <p class="mengapa-card-description">
                        Kontrol keuangan yang sederhana dan aman untuk organisasi Anda. 
                        Kirim invoice dan kontrak yang disesuaikan dengan mudah.
                    </p>
                    <div class="mengapa-card-features">
                        <span class="mengapa-feature-tag">✓ Pembayaran Online</span>
                        <span class="mengapa-feature-tag">✓ Laporan Keuangan</span>
                        <span class="mengapa-feature-tag">✓ Invoice Otomatis</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="mengapa-card">
                    <div class="mengapa-icon-wrapper">
                        <div class="mengapa-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                    </div>
                    <h3 class="mengapa-card-title">Penjadwalan & Presensi Mudah</h3>
                    <p class="mengapa-card-description">
                        Jadwalkan dan pesan ruang kelas di satu kampus atau beberapa kampus. 
                        Simpan catatan kehadiran siswa yang detail.
                    </p>
                    <div class="mengapa-card-features">
                        <span class="mengapa-feature-tag">✓ Absensi Digital</span>
                        <span class="mengapa-feature-tag">✓ Jadwal Otomatis</span>
                        <span class="mengapa-feature-tag">✓ Multi Kampus</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="mengapa-card">
                    <div class="mengapa-icon-wrapper">
                        <div class="mengapa-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="mengapa-card-title">Pelacakan Customer Terintegrasi</h3>
                    <p class="mengapa-card-description">
                        Otomatiskan dan lacak email ke individu atau grup. 
                        Sistem built-in Skilline membantu mengorganisir data Anda.
                    </p>
                    <div class="mengapa-card-features">
                        <span class="mengapa-feature-tag">✓ Email Otomatis</span>
                        <span class="mengapa-feature-tag">✓ Data Terorganisir</span>
                        <span class="mengapa-feature-tag">✓ Tracking Real-time</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="capaian-section" id="capaian">
    <div class="capaian-container">

        <div class="capaian-header">
            <span class="capaian-badge">Update Terbaru</span>
            <h2 class="capaian-title">KARYA & PRESTASI</h2>

            <div class="capaian-view-all">
                <a href="{{ route('frontend.karya') }}" class="capaian-view-link">
                    LIHAT SEMUA KARYA <span class="capaian-arrow">→</span>
                </a>
            </div>

            <div class="capaian-view-all">
                <a href="{{ route('frontend.berita') }}" class="capaian-view-link">
                    LIHAT SEMUA PRESTASI <span class="capaian-arrow">→</span>
                </a>
            </div>
        </div>

        <div class="capaian-grid">

            {{-- CARD BESAR – PRESTASI --}}
            @if($prestasiUtama)
            <div class="capaian-card capaian-large">
                <div class="capaian-image-wrapper">
                    <img src="{{ asset('storage/' . ($prestasiUtama->galeri->gambar ?? 'default.jpg')) }}"
                         alt="{{ $prestasiUtama->judul }}"
                         class="capaian-image">

                    <div class="capaian-overlay">
                        <div class="capaian-badge-small">Prestasi</div>
                    </div>
                </div>

                <div class="capaian-content">
                    <span class="capaian-date">
                        {{ $prestasiUtama->created_at->format('d/m/Y') }}
                    </span>

                    <h3 class="capaian-card-title">
                        {{ $prestasiUtama->judul }}
                    </h3>

                    <a href="{{ route('frontend.single-berita', $prestasiUtama->slug) }}"
                       class="capaian-read-more">
                        Selengkapnya →
                    </a>
                </div>
            </div>
            @endif

            {{-- CARD KECIL – KARYA --}}
            <div class="capaian-small-grid">
                @foreach($karyas as $karya)
                <div class="capaian-card capaian-small">
                    <div class="capaian-image-wrapper">
                        <img src="{{ asset('storage/' . ($karya->cover_image->gambar ?? 'default.jpg')) }}"
                             alt="{{ $karya->judul }}"
                             class="capaian-image">

                        <div class="capaian-overlay">
                            <div class="capaian-badge-small">Karya</div>
                        </div>
                    </div>

                    <div class="capaian-content">
                        <span class="capaian-date">
                            {{ \Carbon\Carbon::parse($karya->tanggal)->format('d/m/Y') }}
                        </span>

                        <h3 class="capaian-card-title">
                            {{ $karya->judul }}
                        </h3>

                        <a href="{{ route('frontend.single-karya', $karya->id) }}"
                           class="capaian-read-more">
                            Selengkapnya →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>



    <!-- Modern Footer -->
    <footer class="modern-footer">
        <div class="footer-wave">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
            </svg>
        </div>

        <div class="footer-content">
            <div class="footer-grid">
                <!-- Tentang Sekolah -->
                <div class="footer-col">
                    <div class="footer-logo-section">
                        <img src="{{ asset('assets/img/Logo Satap.png') }}" alt="Logo Sekolah" class="footer-logo">
                        <h3 class="footer-title">SMP Negeri Satu Atap 1 Bangodua</h3>
                    </div>
                    <p class="footer-desc">Lembaga pendidikan yang berkomitmen untuk menghasilkan generasi unggul, berakhlak mulia, dan berprestasi.</p>
                    
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Menu Cepat -->
                <div class="footer-col">
                    <h4 class="footer-heading">Menu Cepat</h4>
                    <ul class="footer-links">
                        <li><a href="#">Profil Sekolah</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                        <li><a href="#">Berita Sekolah</a></li>
                        <li><a href="#">Prestasi</a></li>
                        <li><a href="#">Galeri</a></li>
                    </ul>
                </div>

                <!-- Informasi -->
                <div class="footer-col">
                    <h4 class="footer-heading">Informasi</h4>
                    <ul class="footer-links">
                        <li><a href="#">Visi & Misi</a></li>
                        <li><a href="#">Lokasi</a></li>
                        <li><a href="#">Kalender Akademik</a></li>
                        <li><a href="#">PPDB</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="footer-col">
                    <h4 class="footer-heading">Hubungi Kami</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span>Jl. Pendidikan No. 123<br>Bangodua, Indonesia</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <span>(021) 1234-5678</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <span>info@smpnsatuatap1.sch.id</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                            <span>Senin - Jumat<br>07.00 - 16.00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p>&copy; {{ date('Y') }} SMP Negeri Satu Atap 1 Bangodua. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // ========== NAVBAR SCRIPTS ==========
        const navbar = document.getElementById('navbar');
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');
        
        // Script untuk mengubah warna navbar saat scroll
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Toggle hamburger menu
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // **Mobile Dropdown Toggle**
        const dropdowns = document.querySelectorAll('.dropdown > a');

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const parent = this.parentElement;
                    parent.classList.toggle('active');
                    
                    // Close other dropdowns
                    dropdowns.forEach(otherDropdown => {
                        if (otherDropdown !== dropdown) {
                            otherDropdown.parentElement.classList.remove('active');
                        }
                    });
                }
            });
        });

        // Close menu when clicking on a link (TAPI TIDAK untuk dropdown parent)
        const navLinks = document.querySelectorAll('.nav-menu a');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Jangan tutup menu jika yang diklik adalah dropdown parent di mobile
                if (window.innerWidth <= 768 && this.parentElement.classList.contains('dropdown')) {
                    return;
                }
                
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideNav = navbar.contains(event.target);
            if (!isClickInsideNav && navMenu.classList.contains('active')) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            }
        });

        // ========== SAMBUTAN SECTION SCRIPTS ==========
        const sambutanObserverOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        };

        const sambutanObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const header = entry.target.querySelector('.sambutan-header');
                    if (header) {
                        header.classList.add('sambutan-animate');
                    }

                    const imageWrapper = entry.target.querySelector('.sambutan-image-wrapper');
                    if (imageWrapper) {
                        imageWrapper.classList.add('sambutan-animate');
                    }

                    const textWrapper = entry.target.querySelector('.sambutan-text-wrapper');
                    if (textWrapper) {
                        textWrapper.classList.add('sambutan-animate');
                    }

                    const paragraphs = entry.target.querySelectorAll('.sambutan-message p');
                    paragraphs.forEach((p, index) => {
                        setTimeout(() => {
                            p.style.opacity = '0';
                            p.style.transform = 'translateY(20px)';
                            p.style.transition = 'all 0.6s ease';
                            
                            setTimeout(() => {
                                p.style.opacity = '1';
                                p.style.transform = 'translateY(0)';
                            }, 50);
                        }, 600 + (index * 150));
                    });

                    const signature = entry.target.querySelector('.sambutan-signature');
                    if (signature) {
                        setTimeout(() => {
                            signature.style.opacity = '0';
                            signature.style.transform = 'translateX(30px)';
                            signature.style.transition = 'all 0.8s ease';
                            
                            setTimeout(() => {
                                signature.style.opacity = '1';
                                signature.style.transform = 'translateX(0)';
                            }, 50);
                        }, 1200);
                    }
                }
            });
        }, sambutanObserverOptions);

        // ========== DOM CONTENT LOADED ==========
        document.addEventListener('DOMContentLoaded', () => {
            // Sambutan Section Observer
            const sambutanSection = document.querySelector('.sambutan-section');
            if (sambutanSection) {
                sambutanObserver.observe(sambutanSection);
            }

            // Sambutan Parallax
            window.addEventListener('scroll', () => {
                const sambutanSection = document.querySelector('.sambutan-section');
                if (sambutanSection) {
                    const scrollPosition = window.pageYOffset;
                    const sectionTop = sambutanSection.offsetTop;
                    const sectionHeight = sambutanSection.offsetHeight;

                    if (scrollPosition > sectionTop - window.innerHeight && 
                        scrollPosition < sectionTop + sectionHeight) {
                        const parallaxValue = (scrollPosition - sectionTop) * 0.1;
                        sambutanSection.style.backgroundPositionY = `${parallaxValue}px`;
                    }
                }
            });

            // Sambutan Image Card Effect
            const imageCard = document.querySelector('.sambutan-image-card');
            if (imageCard) {
                imageCard.addEventListener('mousemove', (e) => {
                    const rect = imageCard.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = (y - centerY) / 20;
                    const rotateY = (centerX - x) / 20;
                    
                    imageCard.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
                });

                imageCard.addEventListener('mouseleave', () => {
                    imageCard.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
                });
            }

            // Sambutan Greeting Animation
            const greeting = document.querySelector('.sambutan-greeting');
            if (greeting) {
                const greetingObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const arabic = greeting.querySelector('.sambutan-arabic');
                            const intro = greeting.querySelector('.sambutan-intro');
                            
                            if (arabic) {
                                setTimeout(() => {
                                    arabic.style.opacity = '0';
                                    arabic.style.transform = 'translateY(20px)';
                                    arabic.style.transition = 'all 0.6s ease';
                                    
                                    setTimeout(() => {
                                        arabic.style.opacity = '1';
                                        arabic.style.transform = 'translateY(0)';
                                    }, 50);
                                }, 400);
                            }
                            
                            if (intro) {
                                setTimeout(() => {
                                    intro.style.opacity = '0';
                                    intro.style.transform = 'translateY(20px)';
                                    intro.style.transition = 'all 0.6s ease';
                                    
                                    setTimeout(() => {
                                        intro.style.opacity = '1';
                                        intro.style.transform = 'translateY(0)';
                                    }, 50);
                                }, 600);
                            }
                        }
                    });
                }, { threshold: 0.5 });
                
                greetingObserver.observe(greeting);
            }

            // ========== BERITA SECTION SCRIPTS ==========
            const beritaSection = document.querySelector('.berita-index-section');
            const beritaTrack = document.getElementById('beritaTrack');
            const beritaCards = document.querySelectorAll('.berita-index-card');
            const prevBtn = document.getElementById('beritaPrev');
            const nextBtn = document.getElementById('beritaNext');
            const dotsContainer = document.getElementById('beritaDots');
            const beritaHeader = document.querySelector('.berita-index-header');

            if (beritaSection && beritaCards.length > 0) {
                let currentIndex = 0;
                const totalCards = beritaCards.length;
                let cardsPerView = 3;
                let autoSlideInterval;

                function updateCardsPerView() {
                    const width = window.innerWidth;
                    if (width <= 768) {
                        cardsPerView = 1;
                    } else if (width <= 1200) {
                        cardsPerView = 2;
                    } else {
                        cardsPerView = 3;
                    }
                    return Math.ceil(totalCards / cardsPerView) - 1;
                }

                function createDots() {
                    dotsContainer.innerHTML = '';
                    const maxDots = updateCardsPerView() + 1;
                    
                    for (let i = 0; i < maxDots; i++) {
                        const dot = document.createElement('div');
                        dot.classList.add('berita-index-dot');
                        if (i === 0) dot.classList.add('berita-index-active');
                        
                        dot.addEventListener('click', () => {
                            currentIndex = i;
                            updateSlider();
                            resetAutoSlide();
                        });
                        
                        dotsContainer.appendChild(dot);
                    }
                }

                function updateSlider() {
                    const maxIndexUpdated = updateCardsPerView();
                    
                    if (currentIndex > maxIndexUpdated) {
                        currentIndex = maxIndexUpdated;
                    }

                    const cardWidth = beritaCards[0].offsetWidth;
                    const gap = 30;
                    const offset = -(currentIndex * cardsPerView * (cardWidth + gap));
                    
                    beritaTrack.style.transform = `translateX(${offset}px)`;

                    const dots = document.querySelectorAll('.berita-index-dot');
                    dots.forEach((dot, index) => {
                        dot.classList.toggle('berita-index-active', index === currentIndex);
                    });

                    prevBtn.style.opacity = '1';
                    prevBtn.style.cursor = 'pointer';
                    nextBtn.style.opacity = '1';
                    nextBtn.style.cursor = 'pointer';
                }

                function prevSlide() {
                    const maxIndexUpdated = updateCardsPerView();
                    
                    if (currentIndex > 0) {
                        currentIndex--;
                    } else {
                        currentIndex = maxIndexUpdated;
                    }
                    updateSlider();
                    resetAutoSlide();
                }

                function nextSlide() {
                    const maxIndexUpdated = updateCardsPerView();
                    
                    if (currentIndex < maxIndexUpdated) {
                        currentIndex++;
                    } else {
                        currentIndex = 0;
                    }
                    updateSlider();
                    resetAutoSlide();
                }

                function startAutoSlide() {
                    autoSlideInterval = setInterval(() => {
                        nextSlide();
                    }, 5000);
                }

                function stopAutoSlide() {
                    clearInterval(autoSlideInterval);
                }

                function resetAutoSlide() {
                    stopAutoSlide();
                    startAutoSlide();
                }

                const beritaObserverOptions = {
                    threshold: 0.2,
                    rootMargin: '0px 0px -100px 0px'
                };

                const beritaObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            if (beritaHeader) {
                                beritaHeader.classList.add('berita-index-animate');
                            }

                            beritaCards.forEach((card, index) => {
                                setTimeout(() => {
                                    card.classList.add('berita-index-animate');
                                }, index * 100);
                            });

                            startAutoSlide();
                            beritaObserver.unobserve(entry.target);
                        }
                    });
                }, beritaObserverOptions);

                beritaObserver.observe(beritaSection);

                prevBtn.addEventListener('click', prevSlide);
                nextBtn.addEventListener('click', nextSlide);

                beritaSection.addEventListener('mouseenter', stopAutoSlide);
                beritaSection.addEventListener('mouseleave', startAutoSlide);

                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        createDots();
                        updateSlider();
                    }, 250);
                });

                let touchStartX = 0;
                let touchEndX = 0;

                beritaTrack.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    stopAutoSlide();
                });

                beritaTrack.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    const swipeThreshold = 50;
                    const diff = touchStartX - touchEndX;

                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                    }
                    startAutoSlide();
                });

                document.addEventListener('keydown', (e) => {
                    if (beritaSection.getBoundingClientRect().top < window.innerHeight && 
                        beritaSection.getBoundingClientRect().bottom > 0) {
                        if (e.key === 'ArrowLeft') {
                            prevSlide();
                        } else if (e.key === 'ArrowRight') {
                            nextSlide();
                        }
                    }
                });

                beritaCards.forEach(card => {
                    card.addEventListener('click', function() {
                        this.style.transform = 'scale(0.98)';
                        setTimeout(() => {
                            this.style.transform = '';
                        }, 200);
                    });
                });

                createDots();
                updateSlider();

                window.addEventListener('scroll', () => {
                    if (beritaSection) {
                        const scrollPosition = window.pageYOffset;
                        const sectionTop = beritaSection.offsetTop;
                        const sectionHeight = beritaSection.offsetHeight;

                        if (scrollPosition > sectionTop - window.innerHeight && 
                            scrollPosition < sectionTop + sectionHeight) {
                            const parallaxValue = (scrollPosition - sectionTop) * 0.3;
                            beritaSection.style.backgroundPositionY = `${parallaxValue}px`;
                        }
                    }
                });
            }

            // ========== MENGAPA SECTION SCRIPTS ==========
            const mengapaSection = document.querySelector('.mengapa-section');
            const mengapaHeader = document.querySelector('.mengapa-header');
            const mengapaCards = document.querySelectorAll('.mengapa-card');

            if (mengapaSection) {
                const mengapaObserverOptions = {
                    threshold: 0.2,
                    rootMargin: '0px 0px -100px 0px'
                };

                const mengapaObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            if (mengapaHeader) {
                                setTimeout(() => {
                                    mengapaHeader.classList.add('mengapa-animate');
                                }, 100);
                            }

                            mengapaCards.forEach((card, index) => {
                                setTimeout(() => {
                                    card.classList.add('mengapa-animate');
                                }, 300 + (index * 200));
                            });

                            mengapaObserver.unobserve(entry.target);
                        }
                    });
                }, mengapaObserverOptions);

                mengapaObserver.observe(mengapaSection);
            }

            // ========== CAPAIAN SECTION SCRIPTS ==========
            const capaianSection = document.querySelector('.capaian-section');
            const capaianHeader = document.querySelector('.capaian-header');
            const capaianCards = document.querySelectorAll('.capaian-card');

            if (capaianSection) {
                const capaianObserverOptions = {
                    threshold: 0.15,
                    rootMargin: '0px 0px -100px 0px'
                };

                const capaianObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            if (capaianHeader) {
                                setTimeout(() => {
                                    capaianHeader.classList.add('capaian-animate');
                                }, 100);
                            }

                            capaianCards.forEach((card, index) => {
                                setTimeout(() => {
                                    card.classList.add('capaian-animate');
                                }, 300 + (index * 150));
                            });

                            capaianObserver.unobserve(entry.target);
                        }
                    });
                }, capaianObserverOptions);

                capaianObserver.observe(capaianSection);

                window.addEventListener('scroll', () => {
                    if (capaianSection) {
                        const scrollPosition = window.pageYOffset;
                        const sectionTop = capaianSection.offsetTop;
                        const sectionHeight = capaianSection.offsetHeight;

                        if (scrollPosition > sectionTop - window.innerHeight && 
                            scrollPosition < sectionTop + sectionHeight) {
                            const parallaxValue = (scrollPosition - sectionTop) * 0.2;
                            capaianSection.style.backgroundPositionY = `${parallaxValue}px`;
                        }
                    }
                });

                if (window.innerWidth > 768) {
                    capaianCards.forEach(card => {
                        card.addEventListener('mousemove', (e) => {
                            const rect = card.getBoundingClientRect();
                            const x = e.clientX - rect.left;
                            const y = e.clientY - rect.top;
                            
                            const centerX = rect.width / 2;
                            const centerY = rect.height / 2;
                            
                            const rotateX = (y - centerY) / 30;
                            const rotateY = (centerX - x) / 30;
                            
                            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-15px) scale(1.02)`;
                        });

                        card.addEventListener('mouseleave', () => {
                            card.style.transform = '';
                        });
                    });
                }

                capaianCards.forEach(card => {
                    card.addEventListener('click', function(e) {
                        if (e.target.tagName.toLowerCase() === 'a') return;
                        
                        this.style.transform = 'scale(0.98)';
                        setTimeout(() => {
                            this.style.transform = '';
                        }, 200);
                    });

                    card.addEventListener('mouseenter', function(e) {
                        const ripple = document.createElement('div');
                        ripple.className = 'capaian-ripple';
                        ripple.style.cssText = `
                            position: absolute;
                            top: ${e.offsetY}px;
                            left: ${e.offsetX}px;
                            width: 0;
                            height: 0;
                            border-radius: 50%;
                            background: rgba(102, 126, 234, 0.1);
                            transform: translate(-50%, -50%);
                            animation: capaian-ripple-animation 0.8s ease-out;
                            pointer-events: none;
                        `;
                        
                        this.appendChild(ripple);
                        
                        setTimeout(() => {
                            ripple.remove();
                        }, 800);
                    });
                });

                if (!document.querySelector('#capaian-ripple-style')) {
                    const style = document.createElement('style');
                    style.id = 'capaian-ripple-style';
                    style.textContent = `
                        @keyframes capaian-ripple-animation {
                            to {
                                width: 300px;
                                height: 300px;
                                opacity: 0;
                            }
                        }
                    `;
                    document.head.appendChild(style);
                }

                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.style.opacity = '0';
                            img.style.transition = 'opacity 0.6s ease';
                            
                            setTimeout(() => {
                                img.style.opacity = '1';
                            }, 100);
                            
                            imageObserver.unobserve(img);
                        }
                    });
                }, { threshold: 0.1 });

                const images = document.querySelectorAll('.capaian-image');
                images.forEach(img => imageObserver.observe(img));

                const viewAllLink = document.querySelector('.capaian-view-link');
                if (viewAllLink) {
                    viewAllLink.addEventListener('click', (e) => {
                        e.preventDefault();
                        console.log('View all clicked');
                        
                        viewAllLink.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            viewAllLink.style.transform = '';
                        }, 200);
                    });
                }

                let currentFocusIndex = -1;
                
                document.addEventListener('keydown', (e) => {
                    if (capaianSection.getBoundingClientRect().top < window.innerHeight && 
                        capaianSection.getBoundingClientRect().bottom > 0) {
                        
                        const cards = Array.from(capaianCards);
                        
                        if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            currentFocusIndex = (currentFocusIndex + 1) % cards.length;
                            cards[currentFocusIndex].focus();
                            cards[currentFocusIndex].scrollIntoView({ 
                                behavior: 'smooth', 
                                block: 'center' 
                            });
                        } else if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            currentFocusIndex = currentFocusIndex <= 0 ? cards.length - 1 : currentFocusIndex - 1;
                            cards[currentFocusIndex].focus();
                            cards[currentFocusIndex].scrollIntoView({ 
                                behavior: 'smooth', 
                                block: 'center' 
                            });
                        }
                    }
                });

                capaianCards.forEach((card, index) => {
                    card.setAttribute('tabindex', '0');
                    card.addEventListener('focus', () => {
                        currentFocusIndex = index;
                    });
                });

                if ('IntersectionObserver' in window) {
                    console.log('✅ Capaian section animations initialized');
                } else {
                    console.warn('⚠️ IntersectionObserver not supported, fallback to instant display');
                    capaianHeader?.classList.add('capaian-animate');
                    capaianCards.forEach(card => card.classList.add('capaian-animate'));
                }
            }
        });
    </script>
</body>
</html>