<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css" type="text/css" />
</head>
<body>
    <?php include 'paginator.php'; ?>
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
        <?php include 'pagination.php'; ?>
    </div>
</body>
</html>
