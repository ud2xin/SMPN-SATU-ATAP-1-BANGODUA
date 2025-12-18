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
            gap: 1rem;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #667eea;
            font-size: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeIn 0.8s ease-out 0.3s both;
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
            font-size: 1.3rem;
            font-weight: 600;
            animation: fadeIn 0.8s ease-out 0.4s both;
            transition: color 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                        text-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .navbar.scrolled .school-name {
            color: white;
            text-shadow: none;
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
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-menu li {
            animation: fadeInUp 0.6s ease-out both;
        }

        .nav-menu li:nth-child(1) { animation-delay: 0.5s; }
        .nav-menu li:nth-child(2) { animation-delay: 0.6s; }
        .nav-menu li:nth-child(3) { animation-delay: 0.7s; }
        .nav-menu li:nth-child(4) { animation-delay: 0.8s; }
        .nav-menu li:nth-child(5) { animation-delay: 0.9s; }

        .menu-gw {
            color: #FFD700;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .navbar.scrolled .menu-gw {
            color: white;
            text-shadow: none;
        }

        .menu-gw:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
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

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 2rem 2rem 1rem;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section {
            animation: fadeInUp 0.6s ease-out both;
        }

        .footer-section:nth-child(1) { animation-delay: 1.3s; }
        .footer-section:nth-child(2) { animation-delay: 1.4s; }
        .footer-section:nth-child(3) { animation-delay: 1.5s; }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: #3498db;
            font-size: 1.2rem;
        }

        .footer-section p,
        .footer-section a {
            color: #bdc3c7;
            text-decoration: none;
            line-height: 1.8;
            display: block;
            transition: all 0.3s ease;
        }

        .footer-section a:hover {
            color: #3498db;
            padding-left: 5px;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .social-icon:hover {
            background: #3498db;
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #95a5a6;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

        /* ============================================
   BERITA INDEX SECTION - CSS STYLES
   Letakkan CSS ini di dalam tag <style> atau file CSS terpisah
   ============================================ */

.berita-index-section {
    padding: 100px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
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
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

/* ============================================
   SECTION KARYA & PRESTASI - CSS LENGKAP
   Letakkan di dalam tag <style> atau file CSS terpisah
   ============================================ */

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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
                top: 70px;
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
                background: rgba(0, 0, 0, 0.95);
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu li {
                width: 100%;
                animation: none;
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

            .logo {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .school-name {
                font-size: 1rem;
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

            .footer {
                padding: 1.5rem 1rem 1rem;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .footer-section {
                animation: none;
            }

            .footer-section h3 {
                font-size: 1.1rem;
            }

            .footer-section p,
            .footer-section a {
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
                <div class="logo">🎓</div>
                <span class="school-name">SMA Negeri 1</span>
            </div>
            
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="nav-menu" id="navMenu">
                <li><a href="#home" class="menu-gw">Beranda</a></li>
                <li><a href="#about" class="menu-gw">Tentang</a></li>
                <li><a href="#programs" class="menu-gw">Program</a></li>
                <li><a href="#contact" class="menu-gw">Kontak</a></li>
                <li><a href="#login" class="login-btn">Login Admin</a></li>
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
                <div class="sambutan-image-wrapper">
                    <div class="sambutan-image-card">
                        <div class="sambutan-image-border"></div>
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&h=800&fit=crop" 
                             alt="Kepala Sekolah" 
                             class="sambutan-image">
                        <div class="sambutan-name-card">
                            <h3>ISMIATI, S.Pd</h3>
                            <p>Kepala Sekolah</p>
                        </div>
                    </div>
                </div>

                <div class="sambutan-text-wrapper">
                    <div class="sambutan-greeting">
                        <p class="sambutan-arabic">Assalamu'alaikum warahmatullahi wabarakatuh,</p>
                        <p class="sambutan-intro">Halo anak-anak semua,</p>
                    </div>

                    <div class="sambutan-message">
                        <p>Senang sekali saya bisa menyapa kalian di hari ini. Di sekolah kita, kita punya visi besar, yaitu menjadi Pelajar GEMAH RIPAH LOH JINAWI: rajin beribadah dan beramal, pandai dan amanah, peduli lingkungan, hidup sehat, berjiwa nasionalis, dan wirausaha.</p>

                        <p>Untuk mencapai itu, kita punya beberapa misi penting: Rajin belajar, beribadah, dan berperilaku santun menjadi dasar pembiasaan siswa, disertai kepedulian menjaga lingkungan sekolah agar tetap bersih, indah, dan asri melalui kegiatan GEMMES setiap Jumat. Sekolah juga mendorong pengembangan bakat di bidang olahraga, seni, bahasa, dan berbagai ekstrakurikuler, sekaligus memperluas pengalaman belajar melalui kerja sama dengan dunia usaha agar setiap siswa dapat mengenal dunia nyata secara lebih luas dan bermakna.</p>

                        <p>Saya mengajak kalian semua untuk selalu semangat, saling membantu, dan menjaga nama baik sekolah. Dengan begitu, kita bisa tumbuh menjadi generasi yang cerdas, berakhlak, dan siap menghadapi masa depan.</p>

                        <p class="sambutan-closing">Terima kasih, anak-anak. Terus semangat ya!</p>
                        <p class="sambutan-arabic-closing">Wassalamu'alaikum warahmatullahi wabarakatuh.</p>
                    </div>

                    <div class="sambutan-signature">
                        <div class="sambutan-signature-line"></div>
                        <p class="sambutan-signature-name">ISMIATI, S.Pd</p>
                        <p class="sambutan-signature-title">Kepala Sekolah SMPN Satu Atap 1 Bangodua</p>
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
                <button class="berita-index-nav-btn berita-index-prev" id="beritaPrev">
                    <span>‹</span>
                </button>

                <div class="berita-index-slider" id="beritaSlider">
                    <div class="berita-index-track" id="beritaTrack">
                        <!-- Berita 1 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800&h=600&fit=crop" alt="Berita 1">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">2 minggu lalu</span>
                                <h3 class="berita-index-card-title">Berita dari Kantor Executive Principal</h3>
                                <p class="berita-index-description">Kepada para orang tua, siswa, guru, dan alumni Sekolah Ciputra, Minggu ini kembali menjadi contoh luar biasa tentang arti menjadi...</p>
                            </div>
                        </div>

                        <!-- Berita 2 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=800&h=600&fit=crop" alt="Berita 2">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">2 minggu lalu</span>
                                <h3 class="berita-index-card-title">Global Robotics Games 2025</h3>
                                <p class="berita-index-description">Sekolah Ciputra dengan bangga merayakan pencapaian luar biasa Tim Robotika P7 P 8 kami di Global Robotic Games (GRG) 2025 yang...</p>
                            </div>
                        </div>

                        <!-- Berita 3 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&h=600&fit=crop" alt="Berita 3">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">3 minggu lalu</span>
                                <h3 class="berita-index-card-title">Kegiatan Ekstrakurikuler Seni Musik</h3>
                                <p class="berita-index-description">Siswa-siswi kami menunjukkan bakat luar biasa dalam pertunjukan musik yang memukau. Kepada para sahabat Sekolah Ciputra, Minggu ini merupakan salah satu minggu yang paling berkesan...</p>
                            </div>
                        </div>

                        <!-- Berita 4 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop" alt="Berita 4">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">3 minggu lalu</span>
                                <h3 class="berita-index-card-title">Olimpiade Sains Nasional 2025</h3>
                                <p class="berita-index-description">Para siswa berprestasi meraih medali emas dan perak di kompetisi Olimpiade Sains tingkat nasional...</p>
                            </div>
                        </div>

                        <!-- Berita 5 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&h=600&fit=crop" alt="Berita 5">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">4 minggu lalu</span>
                                <h3 class="berita-index-card-title">Peringatan Hari Kartini</h3>
                                <p class="berita-index-description">Seluruh siswa merayakan Hari Kartini dengan mengenakan pakaian adat dan mengadakan lomba...</p>
                            </div>
                        </div>

                        <!-- Berita 6 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=800&h=600&fit=crop" alt="Berita 6">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">1 bulan lalu</span>
                                <h3 class="berita-index-card-title">Kunjungan Industri ke Pabrik</h3>
                                <p class="berita-index-description">Siswa kelas 11 mengunjungi beberapa pabrik untuk mempelajari proses produksi dan manajemen industri...</p>
                            </div>
                        </div>

                        <!-- Berita 7 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&h=600&fit=crop" alt="Berita 7">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">1 bulan lalu</span>
                                <h3 class="berita-index-card-title">Turnamen Basket Antar Sekolah</h3>
                                <p class="berita-index-description">Tim basket sekolah berhasil menjuarai turnamen basket tingkat kota dengan skor telak...</p>
                            </div>
                        </div>

                        <!-- Berita 8 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1503676382389-4809596d5290?w=800&h=600&fit=crop" alt="Berita 8">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">1 bulan lalu</span>
                                <h3 class="berita-index-card-title">Workshop Digital Marketing</h3>
                                <p class="berita-index-description">Siswa mengikuti workshop digital marketing yang diadakan oleh praktisi profesional...</p>
                            </div>
                        </div>

                        <!-- Berita 9 -->
                        <div class="berita-index-card">
                            <div class="berita-index-image">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=600&fit=crop" alt="Berita 9">
                                <div class="berita-index-overlay"></div>
                            </div>
                            <div class="berita-index-content">
                                <span class="berita-index-time">2 bulan lalu</span>
                                <h3 class="berita-index-card-title">Program Bakti Sosial</h3>
                                <p class="berita-index-description">Sekolah mengadakan bakti sosial dengan memberikan bantuan kepada masyarakat kurang mampu...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="berita-index-nav-btn berita-index-next" id="beritaNext">
                    <span>›</span>
                </button>
            </div>

            <div class="berita-index-dots" id="beritaDots"></div>

            <div class="berita-index-button-wrapper">
                <a href="#" class="berita-index-cta-button">Lihat Semua Berita</a>
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
            <!-- Header -->
            <div class="capaian-header">
                <span class="capaian-badge">Latest Updates</span>
                <h2 class="capaian-title">KARYA & PRESTASI</h2>
                <div class="capaian-view-all">
                    <a href="#" class="capaian-view-link">
                        SEE ALL KARYA
                        <span class="capaian-arrow">→</span>
                    </a>
                </div>

                <div class="capaian-view-all">
                    <a href="#" class="capaian-view-link">
                        SEE ALL PRESTASI
                        <span class="capaian-arrow">→</span>
                    </a>
                </div>
            </div>
    
            <!-- Grid Layout -->
            <div class="capaian-grid">
                <!-- Large Featured Card -->
                <div class="capaian-card capaian-large">
                    <div class="capaian-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=400&h=300&fit=crop" 
                             alt="Request For Progress" 
                             class="capaian-image">
                        <div class="capaian-overlay">
                            <div class="capaian-badge-small">Karya</div>
                        </div>
                    </div>
                    <div class="capaian-content">
                        <span class="capaian-date">04/05/2025</span>
                        <h3 class="capaian-card-title">Request For Progress Canteen Vendor 2019-2020</h3>
                        <a href="#" class="capaian-read-more">Selengkapnya →</a>
                    </div>
                </div>
    
                <!-- Small Cards Grid -->
                <div class="capaian-small-grid">
                    <!-- Card 1 -->
                    <div class="capaian-card capaian-small">
                        <div class="capaian-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=400&h=300&fit=crop" 
                                 alt="Grade 11 Kupang" 
                                 class="capaian-image">
                            <div class="capaian-overlay">
                                <div class="capaian-badge-small">Prestasi</div>
                            </div>
                        </div>
                        <div class="capaian-content">
                            <span class="capaian-date">02/05/2025</span>
                            <h3 class="capaian-card-title">Grade 11 Kupang CAS Trip</h3>
                            <a href="#" class="capaian-read-more">Selengkapnya →</a>
                        </div>
                    </div>
    
                    <!-- Card 2 -->
                    <div class="capaian-card capaian-small">
                        <div class="capaian-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=400&h=300&fit=crop" 
                                 alt="Grade 3 Learning" 
                                 class="capaian-image">
                            <div class="capaian-overlay">
                                <div class="capaian-badge-small">Karya</div>
                            </div>
                        </div>
                        <div class="capaian-content">
                            <span class="capaian-date">29/04/2025</span>
                            <h3 class="capaian-card-title">Grade 3 Learning Journey to Rumah Keramik</h3>
                            <a href="#" class="capaian-read-more">Selengkapnya →</a>
                        </div>
                    </div>
    
                    <!-- Card 3 -->
                    <div class="capaian-card capaian-small">
                        <div class="capaian-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&h=300&fit=crop" 
                                 alt="Grade 2 Learning" 
                                 class="capaian-image">
                            <div class="capaian-overlay">
                                <div class="capaian-badge-small">Prestasi</div>
                            </div>
                        </div>
                        <div class="capaian-content">
                            <span class="capaian-date">26/04/2025</span>
                            <h3 class="capaian-card-title">Grade 2 Learning Journey to Taman Budaya Sen...</h3>
                            <a href="#" class="capaian-read-more">Selengkapnya →</a>
                        </div>
                    </div>
    
                    <!-- Card 4 -->
                    <div class="capaian-card capaian-small">
                        <div class="capaian-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400&h=300&fit=crop" 
                                 alt="Grade 1 Learning" 
                                 class="capaian-image">
                            <div class="capaian-overlay">
                                <div class="capaian-badge-small">Karya</div>
                            </div>
                        </div>
                        <div class="capaian-content">
                            <span class="capaian-date">25/04/2025</span>
                            <h3 class="capaian-card-title">Grade 1 Learning Journey to Taman Budaya Sent...</h3>
                            <a href="#" class="capaian-read-more">Selengkapnya →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Tentang Sekolah</h3>
                <p>SMA Negeri 1 adalah lembaga pendidikan yang berkomitmen untuk menghasilkan generasi unggul dan berakhlak mulia.</p>
                <div class="social-icons">
                    <a href="#" class="social-icon">📘</a>
                    <a href="#" class="social-icon">📷</a>
                    <a href="#" class="social-icon">🐦</a>
                    <a href="#" class="social-icon">▶️</a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Menu Cepat</h3>
                <a href="#">Profil Sekolah</a>
                <a href="#">Visi & Misi</a>
                <a href="#">Fasilitas</a>
                <a href="#">Prestasi</a>
                <a href="#">Galeri</a>
            </div>
            <div class="footer-section">
                <h3>Kontak Kami</h3>
                <p>📍 Jl. Pendidikan No. 123, Jakarta</p>
                <p>📞 (021) 1234-5678</p>
                <p>✉️ info@sman1.sch.id</p>
                <p>⏰ Senin - Jumat: 07.00 - 16.00</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 SMA Negeri 1. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Script untuk mengubah warna navbar saat scroll
        const navbar = document.getElementById('navbar');
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');
        
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

        // Close menu when clicking on a link
        const navLinks = document.querySelectorAll('.menu-gw');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
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

        // sambutan-script.js

        // Intersection Observer untuk animasi saat scroll
        const sambutanObserverOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        };

        const sambutanObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Animate header
                    const header = entry.target.querySelector('.sambutan-header');
                    if (header) {
                        header.classList.add('sambutan-animate');
                    }

                    // Animate image wrapper
                    const imageWrapper = entry.target.querySelector('.sambutan-image-wrapper');
                    if (imageWrapper) {
                        imageWrapper.classList.add('sambutan-animate');
                    }

                    // Animate text wrapper
                    const textWrapper = entry.target.querySelector('.sambutan-text-wrapper');
                    if (textWrapper) {
                        textWrapper.classList.add('sambutan-animate');
                    }

                    // Animate paragraphs sequentially
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

                    // Animate signature
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

        // Observe sambutan section
        document.addEventListener('DOMContentLoaded', () => {
            const sambutanSection = document.querySelector('.sambutan-section');
            if (sambutanSection) {
                sambutanObserver.observe(sambutanSection);
            }

            // Add parallax effect to background elements
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

            // Add interactive card effect
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

            // Add smooth reveal for greeting
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
        });

                    /* ============================================
        BERITA INDEX SECTION - JAVASCRIPT (9 Berita)
        ============================================ */

        document.addEventListener('DOMContentLoaded', () => {
            // Element selections
            const beritaSection = document.querySelector('.berita-index-section');
            const beritaTrack = document.getElementById('beritaTrack');
            const beritaCards = document.querySelectorAll('.berita-index-card');
            const prevBtn = document.getElementById('beritaPrev');
            const nextBtn = document.getElementById('beritaNext');
            const dotsContainer = document.getElementById('beritaDots');
            const beritaHeader = document.querySelector('.berita-index-header');

            // Slider state
            let currentIndex = 0;
            const totalCards = beritaCards.length;
            let cardsPerView = 3;
            const maxIndex = Math.ceil(totalCards / cardsPerView) - 1;
            let autoSlideInterval;

            // Update cards per view based on screen size
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

            // Create dots for navigation
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

            // Update slider position
            function updateSlider() {
                const maxIndexUpdated = updateCardsPerView();
                
                // Ensure currentIndex doesn't exceed max
                if (currentIndex > maxIndexUpdated) {
                    currentIndex = maxIndexUpdated;
                }

                const cardWidth = beritaCards[0].offsetWidth;
                const gap = 30;
                const offset = -(currentIndex * cardsPerView * (cardWidth + gap));
                
                beritaTrack.style.transform = `translateX(${offset}px)`;

                // Update dots
                const dots = document.querySelectorAll('.berita-index-dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('berita-index-active', index === currentIndex);
                });

                // Update button states (buttons always enabled for continuous loop)
                prevBtn.style.opacity = '1';
                prevBtn.style.cursor = 'pointer';
                nextBtn.style.opacity = '1';
                nextBtn.style.cursor = 'pointer';
            }

            // Navigate to previous slide
            function prevSlide() {
                const maxIndexUpdated = updateCardsPerView();
                
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    // Loop to end when going back from first slide
                    currentIndex = maxIndexUpdated;
                }
                updateSlider();
                resetAutoSlide();
            }

            // Navigate to next slide
            function nextSlide() {
                const maxIndexUpdated = updateCardsPerView();
                
                if (currentIndex < maxIndexUpdated) {
                    currentIndex++;
                    updateSlider();
                    resetAutoSlide();
                } else {
                    // Loop back to beginning after reaching the end (showing all 9 cards)
                    currentIndex = 0;
                    updateSlider();
                    resetAutoSlide();
                }
            }

            // Auto slide functionality
            function startAutoSlide() {
                autoSlideInterval = setInterval(() => {
                    nextSlide();
                }, 5000); // Change slide every 5 seconds
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            function resetAutoSlide() {
                stopAutoSlide();
                startAutoSlide();
            }

            // Intersection Observer for animations
            const beritaObserverOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const beritaObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Animate header
                        if (beritaHeader) {
                            beritaHeader.classList.add('berita-index-animate');
                        }

                        // Animate cards with stagger effect
                        beritaCards.forEach((card, index) => {
                            setTimeout(() => {
                                card.classList.add('berita-index-animate');
                            }, index * 100);
                        });

                        // Start auto slide when section is visible
                        startAutoSlide();

                        // Stop observing after animation
                        beritaObserver.unobserve(entry.target);
                    }
                });
            }, beritaObserverOptions);

            // Start observing
            if (beritaSection) {
                beritaObserver.observe(beritaSection);
            }

            // Event listeners
            prevBtn.addEventListener('click', prevSlide);
            nextBtn.addEventListener('click', nextSlide);

            // Stop auto slide on hover
            beritaSection.addEventListener('mouseenter', stopAutoSlide);
            beritaSection.addEventListener('mouseleave', startAutoSlide);

            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    createDots();
                    updateSlider();
                }, 250);
            });

            // Touch/swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            beritaTrack.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoSlide();
            });

            beritaTrack.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoSlide();
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        // Swipe left - next
                        nextSlide();
                    } else {
                        // Swipe right - previous
                        prevSlide();
                    }
                }
            }

            // Keyboard navigation
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

            // Add click animation to cards
            beritaCards.forEach(card => {
                card.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 200);
                });
            });

            // Initialize
            createDots();
            updateSlider();

            // Parallax effect on scroll
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
        });

        /* ============================================
   MENGAPA SECTION - JAVASCRIPT
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {
    // Element selections
    const mengapaSection = document.querySelector('.mengapa-section');
    const mengapaHeader = document.querySelector('.mengapa-header');
    const mengapaCards = document.querySelectorAll('.mengapa-card');

    // Intersection Observer Options
    const mengapaObserverOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };

    // Create Intersection Observer
    const mengapaObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate header
                if (mengapaHeader) {
                    setTimeout(() => {
                        mengapaHeader.classList.add('mengapa-animate');
                    }, 100);
                }

                // Animate cards with stagger effect
                mengapaCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('mengapa-animate');
                    }, 300 + (index * 200));
                });

                // Stop observing after animation
                mengapaObserver.unobserve(entry.target);
            }
        });
    }, mengapaObserverOptions);

    // Start observing
    if (mengapaSection) {
        mengapaObserver.observe(mengapaSection);
    }
});

/* ============================================
   SECTION KARYA & PRESTASI - JAVASCRIPT
   Letakkan di dalam tag <script> atau file JS terpisah
   ============================================ */

   document.addEventListener('DOMContentLoaded', () => {
    // Element selections
    const capaianSection = document.querySelector('.capaian-section');
    const capaianHeader = document.querySelector('.capaian-header');
    const capaianCards = document.querySelectorAll('.capaian-card');

    // Intersection Observer Options
    const capaianObserverOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -100px 0px'
    };

    // Create Intersection Observer
    const capaianObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate header
                if (capaianHeader) {
                    setTimeout(() => {
                        capaianHeader.classList.add('capaian-animate');
                    }, 100);
                }

                // Animate cards with stagger effect
                capaianCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('capaian-animate');
                    }, 300 + (index * 150));
                });

                // Stop observing after animation
                capaianObserver.unobserve(entry.target);
            }
        });
    }, capaianObserverOptions);

    // Start observing
    if (capaianSection) {
        capaianObserver.observe(capaianSection);
    }

    // Add parallax effect to background elements
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

    // Add interactive 3D tilt effect to cards (desktop only)
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

    // Add click animation to cards
    capaianCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Don't trigger if clicking on a link
            if (e.target.tagName.toLowerCase() === 'a') return;
            
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 200);
        });
    });

    // Add ripple effect on hover
    capaianCards.forEach(card => {
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

    // Add CSS animation for ripple (inject into document)
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

    // Lazy loading for images
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

    // Add smooth scroll to "View All" link
    const viewAllLink = document.querySelector('.capaian-view-link');
    if (viewAllLink) {
        viewAllLink.addEventListener('click', (e) => {
            e.preventDefault();
            // You can add your own navigation logic here
            console.log('View all clicked');
            
            // Add a subtle animation to the link
            viewAllLink.style.transform = 'scale(0.95)';
            setTimeout(() => {
                viewAllLink.style.transform = '';
            }, 200);
        });
    }

    // Add keyboard navigation
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

    // Make cards focusable
    capaianCards.forEach((card, index) => {
        card.setAttribute('tabindex', '0');
        card.addEventListener('focus', () => {
            currentFocusIndex = index;
        });
    });

    // Add performance monitoring
    if ('IntersectionObserver' in window) {
        console.log('✅ Capaian section animations initialized');
    } else {
        console.warn('⚠️ IntersectionObserver not supported, fallback to instant display');
        // Fallback: show all elements immediately
        capaianHeader?.classList.add('capaian-animate');
        capaianCards.forEach(card => card.classList.add('capaian-animate'));
    }
});
    </script>
</body>
</html>