<?php

// if (!function_exists('about_us_url')) {
//     function about_us_url() {
//         return url('/about');
//     }
// }

if (!function_exists('calculateProgress')) {
    function calculateProgress($completedTasks, $totalTasks) {
        return ($totalTasks > 0) ? ($completedTasks / $totalTasks) * 100 : 0;
    }
}


if (!function_exists('formatCurrency')) {
        function formatCurrency($amount, $currencySymbol = 'INR') {
        $currencyFormats = [
            'USD' => '$',
            'EUR' => '€',
            'INR' => '₹',
        ];
        $formattedAmount = number_format($amount, 2) . ' ' . $currencyFormats[$currencySymbol];
        return $formattedAmount;
    }
}

