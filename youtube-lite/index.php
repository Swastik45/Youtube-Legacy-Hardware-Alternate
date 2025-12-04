<?php
$iframe_url = null;
$message = "";
$search_query = isset($_POST['search']) ? trim($_POST['search']) : '';
$api_key = 'AIzaSyA3ojztcYc5xHXBk_GpzYdYE2irCLsxmqc'; // Replace with your key
$home_videos = [];

// Function to fetch videos via YouTube API
function fetch_videos($query = '', $api_key) {
    $videos = [];
    if($query) {
        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&q=" . urlencode($query) . "&maxResults=12&key=" . $api_key;
    } else {
        // Trending videos as "home feed"
        $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet&chart=mostPopular&maxResults=12&regionCode=US&key=" . $api_key;
    }

    $json = @file_get_contents($url);
    if($json) {
        $data = json_decode($json, true);
        if(isset($data['items'])) {
            foreach($data['items'] as $item) {
                $id = $item['id']['videoId'] ?? $item['id'];
                $videos[] = [
                    'id' => $id,
                    'title' => $item['snippet']['title'],
                    'thumbnail' => $item['snippet']['thumbnails']['medium']['url']
                ];
            }
        }
    }
    return $videos;
}

// Fetch videos for home or search
$home_videos = fetch_videos($search_query, $api_key);

// Handle video playback
if(isset($_GET['video'])) {
    $video_id = $_GET['video'];
    // Force low resolution for TV
    $iframe_url = "https://www.youtube-nocookie.com/embed/$video_id?vq=small";
    $message = "Playing video in low resolution for smooth playback.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TV YouTube App</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>TV YouTube App</h1>

<form method="post">
    <input type="text" name="search" placeholder="Search by name..." value="<?= htmlspecialchars($search_query) ?>">
    <button type="submit">Search</button>
</form>

<p><?= htmlspecialchars($message) ?></p>

<?php if($iframe_url): ?>
    <iframe src="<?= htmlspecialchars($iframe_url) ?>" allowfullscreen></iframe>
<?php endif; ?>

<h2><?= $search_query ? "Search results for: " . htmlspecialchars($search_query) : "Home / Trending" ?></h2>
<div class="video-grid">
<?php foreach($home_videos as $v): ?>
    <div class="video-item">
        <a href="?video=<?= htmlspecialchars($v['id']) ?>">
            <img src="<?= htmlspecialchars($v['thumbnail']) ?>" alt="<?= htmlspecialchars($v['title']) ?>">
            <p><?= htmlspecialchars($v['title']) ?></p>
        </a>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
