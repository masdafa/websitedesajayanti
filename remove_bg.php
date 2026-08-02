<?php
$file = 'public/images/logo-baru.png';
if (!file_exists($file)) die("File not found");

$img = imagecreatefromstring(file_get_contents($file));
if (!$img) die("Could not read image");

$width = imagesx($img);
$height = imagesy($img);
$out = imagecreatetruecolor($width, $height);
imagesavealpha($out, true);
$transparent = imagecolorallocatealpha($out, 0, 0, 0, 127);
imagefill($out, 0, 0, $transparent);

// Get background color from top-left pixel (assumed to be background)
$bg_rgb = imagecolorat($img, 0, 0);
$bg_r = ($bg_rgb >> 16) & 0xFF;
$bg_g = ($bg_rgb >> 8) & 0xFF;
$bg_b = $bg_rgb & 0xFF;

for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
        $rgb = imagecolorat($img, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        
        $dist = sqrt(pow($r - $bg_r, 2) + pow($g - $bg_g, 2) + pow($b - $bg_b, 2));
        
        if ($dist < 40) {
            imagesetpixel($out, $x, $y, $transparent);
        } else if ($dist < 80) {
            $alpha = (int)(127 - (($dist - 40) / 40 * 127));
            $color = imagecolorallocatealpha($out, $r, $g, $b, $alpha);
            imagesetpixel($out, $x, $y, $color);
        } else {
            $color = imagecolorallocatealpha($out, $r, $g, $b, 0);
            imagesetpixel($out, $x, $y, $color);
        }
    }
}

imagepng($out, 'public/images/logo-transparent.png');

$favicon = imagecreatetruecolor(128, 128);
imagesavealpha($favicon, true);
imagefill($favicon, 0, 0, $transparent);

$ratio = $width / $height;
if ($ratio > 1) {
    $new_w = 128;
    $new_h = 128 / $ratio;
} else {
    $new_h = 128;
    $new_w = 128 * $ratio;
}
$dst_x = (128 - $new_w) / 2;
$dst_y = (128 - $new_h) / 2;

imagecopyresampled($favicon, $out, $dst_x, $dst_y, 0, 0, $new_w, $new_h, $width, $height);
imagepng($favicon, 'public/favicon.png');

echo "Success";
