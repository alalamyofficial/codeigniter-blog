<?php 


if (!function_exists('timeAgo')) {
    function timeAgo($time) {
        $currentTime = time();
        $timeDiff = $currentTime - strtotime($time);
    
        $seconds = $timeDiff;
        $minutes = round($seconds / 60);
        $hours = round($minutes / 60);
        $days = round($hours / 24);
        $weeks = round($days / 7);
        $months = round($days / 30);
        $years = round($days / 365);
    
        if ($seconds < 60) {
            return "just now";
        } else if ($minutes < 60) {
            return "$minutes minutes ago";
        } else if ($hours < 24) {
            return "$hours hours ago";
        } else if ($days < 7) {
            return "$days days ago";
        } else if ($weeks < 4) {
            return "$weeks weeks ago";
        } else if ($months < 12) {
            return "$months months ago";
        } else {
            return "$years years ago";
        }
    }
    
}
