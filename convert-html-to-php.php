<?php
$directory = __DIR__; // Change this if you want a specific directory

function convertHtmlToPhp($dir) {
    $files = scandir($dir);

    foreach ($files as $file) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;

        // Skip . and ..
        if ($file === '.' || $file === '..') continue;

        // If it's a directory, recurse
        if (is_dir($path)) {
            convertHtmlToPhp($path);
        }

        // If it's an .html file
        if (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'html') {
            $phpFilePath = preg_replace('/\.html$/', '.php', $path);

            // Read content
            $content = file_get_contents($path);

            // Replace .html links with .php
            $updatedContent = preg_replace('/href="([^"]+)\.html"/i', 'href="$1.php"', $content);
            $updatedContent = preg_replace('/src="([^"]+)\.html"/i', 'src="$1.php"', $updatedContent);

            // Write to new .php file
            file_put_contents($phpFilePath, $updatedContent);

            // Optionally delete the old .html file
            unlink($path);

            echo "Converted: $file → " . basename($phpFilePath) . "\n";
        }
    }
}

convertHtmlToPhp($directory);
