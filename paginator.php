
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
