<?php 
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true; // Nothing to delete
    }

    if (!is_dir($dir)) {
        return unlink($dir); // Delete file
    }

    // Scan and loop through directory contents
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        $path = $dir . DIRECTORY_SEPARATOR . $item;

        if (is_dir($path)) {
            // Recursive call for subdirectory
            if (!deleteDirectory($path)) {
                return false;
            }
        } else {
            // Delete file
            if (!unlink($path)) {
                return false;
            }
        }
    }

    // Remove the empty directory itself
    return rmdir($dir);
}