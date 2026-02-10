
# 📺 TV YouTube Lite
### A lightweight, PHP-based YouTube client optimized for legacy Smart TVs.




Modern YouTube updates often make older Smart TVs slow, incompatible, or unable to play videos due to high RAM/CPU usage. **TV YouTube Lite** solves this by providing a high-speed, server-side alternative that works on almost any TV browser.

[**View Live  Project**](https://youtube-clone.kesug.com/?i=1)

---

## 🚀 Why This Exists
Older Smart TVs often struggle with the official YouTube app due to:
* **Laggy UI:** Heavy JavaScript frameworks used in modern apps.
* **Buffering:** Forced high-resolution playback that exceeds hardware limits.
* **Crashes:** High RAM consumption from modern web standards.

**TV YouTube Lite** shifts the processing load to the server, delivering clean HTML/CSS that even low-spec TVs can render smoothly.

---

## ✨ Features
* **⚡ Zero JavaScript Overhead:** Built with PHP + HTML to ensure compatibility with weak TV browser engines.
* **📉 Low-Res Optimization:** Automatically forces `vq=small` in embeds for faster buffering and smooth playback.
* **🔍 Search & Discovery:** Search via the YouTube Data API or browse the Trending feed by default.
* **🛡️ Privacy-First:** Uses `youtube-nocookie.com` to reduce tracking and improve performance.
* **📱 Minimalist UI:** Clean grid layout with large thumbnails designed for distance viewing.

---

## 🛠️ Tech Stack
* **Language:** PHP (Native)
* **API:** YouTube Data API v3
* **Frontend:** Semantic HTML5 / CSS3
* **Dependencies:** None (No frameworks, no libraries)

---

## 🔧 Installation & Setup

1. **Clone the Project:**
   ```bash
   git clone [https://github.com/your-username/tv-youtube-lite.git](https://github.com/your-username/tv-youtube-lite.git)
   cd tv-youtube-lite

```

2. **Add Your API Key:**
Open the file and insert your [YouTube Data API Key](https://console.cloud.google.com/):
```php
$api_key = 'YOUR_API_KEY_HERE';

```


3. **Run Locally:**
```bash
php -S localhost:8000

```


Point your TV browser to `http://your-computer-ip:8000`.

---

## 📂 Architecture Overview

### Video Fetching

The `fetch_videos()` function handles API requests server-side. It safely parses data using `json_decode()` and returns only the necessary metadata (ID, Title, Thumbnail), reducing the payload sent to the TV.

### Playback Logic

When a video is selected, the app appends `?video=VIDEO_ID` to the URL. The server then generates a lightweight IFrame embed:

* **No-Cookie Domain:** Reduces data overhead.
* **Forced Quality:** Appends parameters to ensure the TV hardware isn't overwhelmed by 4K/1080p streams.

### Security

All output is passed through `htmlspecialchars()` to ensure the application is protected against XSS attacks, even in older browser environments.

---

## 🌐 Deployment

This project is "plug-and-play" and works on:

* **Shared Hosting:** (Bluehost, HostGator, etc.)
* **Local Servers:** (Raspberry Pi, XAMPP, WAMP)
* **VPS:** (DigitalOcean, Linode running Apache/Nginx)

---
