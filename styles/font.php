<?php
header("Content-type: text/css; charset: UTF-8");

// URL of the Google Fonts CSS with Poppins font
$google_fonts_url = "https://fonts.googleapis.com/css2?family=Oswald&display=swap";

// Fetch the font CSS using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $google_fonts_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$font_css = curl_exec($ch);
curl_close($ch);

// Output the font CSS
echo $font_css;
?>
