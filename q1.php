<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css" type="text/css" />
</head>
<body>
<?php
$hekmaSections = [];

// Fetch all image files from the "images" folder
$imageFolder = './images/';
$images = glob($imageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Loop through the images and add them to $hekmaSections
foreach ($images as $image) {
    $hekmaSections[] = [
        'title' => '
        حاسبوا أنفسكم قبل أن تحاسبوا ولا يدع قوم الجهاد في سبيل الله
        إلّا ضربهم الله بالفقر ولا ظهرت الفحشاء في قوم إلّا عمهم الله
        حاسبوا أنفسكم قبل أن تحاسبوا ولا يدع قوم الجهاد في سبيل الله
        إلّا ضربهم الله بالفقر ولا ظهرتبا
    ',
        'author' => 'أبو بكر الصديق رضي الله عنه',
        'image' => $image
    ];
}
?>

    <div class="page">
        <div class="nav">
            <img class="logo" src="./logo/Logo2.png" alt="" />
        </div>
        <div class="container">
            <?php
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $itemsPerPage = 3;
            $startIndex = ($currentPage - 1) * $itemsPerPage;
            
            for ($i = $startIndex; $i < $startIndex + $itemsPerPage; $i++) {
                if ($i >= count($hekmaSections)) {
                    break; // Stop if we reach the end of sections
                }

                $hekmaSection = $hekmaSections[$i];
                echo '<div class="hekmaSection">';
                echo '    <div class="text-section">';
                echo '        <h3>' . $hekmaSection['title'] . '</h3>';
                echo '        <p>' . $hekmaSection['author'] . '</p>';
                echo '    </div>';
                echo '    <img src="' . $hekmaSection['image'] . '" alt="" />';
                echo '</div>';
            }
            ?>
        </div>
        <?php
$totalPages = ceil(count($hekmaSections) / $itemsPerPage);

echo '<div class="pagination">';
for ($page = $totalPages; $page >= 1; $page--) {
    $activeClass = ($currentPage == $page) ? 'active' : '';
    echo '<a href="?page=' . $page . '" class="' . $activeClass . '">' . $page . '</a>';
}
echo '</div>';
?>

    </div>
</body>
</html>
