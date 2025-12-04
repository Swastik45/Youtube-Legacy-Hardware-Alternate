

# TV YouTube Lite — Lightweight YouTube Client for Older Smart TVs

TV YouTube Lite is a minimal, fast, and TV-optimized YouTube client built for older or low-spec smart TVs where the official YouTube app has become slow, laggy, or completely unusable due to new updates.
This project focuses on speed, simplicity, and smooth playback.

---

## Why This Exists

Modern YouTube updates often make older TVs slow, incompatible, or unable to play videos properly. Common issues include:

* Laggy UI
* Slow loading
* RAM/CPU overload
* Videos not playing
* Forced high-resolution buffering

This project solves those problems by providing a lightweight alternative that works smoothly on almost any TV browser.

---

## Features

### • Search

Search for videos by name using the YouTube Data API.

### • Home/Trending Feed

If no search query is entered, the app shows trending videos based on region.

### • Low-Resolution Playback (TV-Friendly)

Videos play through the **YouTube No-Cookie embed** using:

```
vq=small
```

This forces lower resolution for:

* faster buffering
* smooth playback on slow TVs
* low data usage

### • Minimal UI

Clean grid layout, thumbnails only, no unnecessary scripts.

### • Zero JavaScript Overhead

Everything works with PHP + HTML.
Perfect for weak TV browsers.

### • Privacy-Optimized

Uses nocookie embeds to reduce tracking.

---

## Tech Stack

* PHP
* YouTube Data API v3
* HTML/CSS
* No frameworks, no JavaScript required

---

## Code Overview

### `fetch_videos()`

A reusable function that:

* Handles YouTube search queries
* Loads trending videos
* Extracts video ID, title, thumbnails
* Uses `@file_get_contents()` safely
* Parses data using `json_decode()`

### Video Playback

Selecting a video adds:

```
?video=VIDEO_ID
```

The video then loads in a lightweight embed iframe.

### Input Safety

All output is sanitized using `htmlspecialchars()` to prevent XSS attacks.

---

## How to Run

1. Install PHP if not installed.
2. Add your YouTube API key inside the file:

   ```php
   $api_key = 'YOUR_API_KEY';
   ```
3. Start a local server:

   ```
   php -S localhost:8000
   ```
4. Open:

   ```
   http://localhost:8000
   ```

---

## Deployment

Works on:

* Shared hosting
* VPS (Apache/Nginx)
* Local server on TV browser
* Any lightweight PHP environment

No dependencies. No builds. No installation required.



If you want, I can generate a shorter version, a more “GitHub-professional” tone, or a marketing-style version.
