<?php
$totalPages = ceil(count($hekmaSections) / $itemsPerPage);

echo '<div class="pagination">';
for ($page = $totalPages; $page >= 1; $page--) {
    $activeClass = ($currentPage == $page) ? 'active' : '';
    echo '<a href="?page=' . $page . '" class="' . $activeClass . '">' . $page . '</a>';
}
echo '</div>';
?>
