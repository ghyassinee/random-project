<?php
function xmlToArray($xmlString)
{
    $xml = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);
    $json = json_encode($xml);
    return json_decode($json, true);
}

$inputText = isset($_POST['inputText']) ? $_POST['inputText'] : '';

$defaultConfig = [
    'ipp' => 3,
    'caption_file' => './captions/captions.txt',
    'imgs_folder' => './images/'
];

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$pageConfig = $defaultConfig;

if (!empty($inputText)) {
    // Try parsing as JSON
    $jsonData = json_decode($inputText, true);
    
    if ($jsonData !== null && isset($jsonData['page_conf'])) {
        $pageConfig = $jsonData['page_conf'];
    } else {
        $xmlData = xmlToArray($inputText);
        
        if (isset($xmlData['page_conf'])) {
            $pageConfig = $xmlData['page_conf'];
        }
    }
}

$itemsPerPage = isset($pageConfig['ipp']) ? $pageConfig['ipp'] : 3;

$startIndex = ($currentPage - 1) * $itemsPerPage;
?>

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
        <div class="inputContainer">
            <form method="post">
                <h4>Write your instructions in JSON or XML</h4>
                <textarea rows="10" name="inputText"></textarea>
                <button type="submit">Generate Page</button>
            </form>
        </div>

        <div class="nav">
            <img class="logo" src="./logo/Logo2.png" alt="" />
        </div>
        <div class="container">
            <?php
            for ($i = $startIndex; $i < $startIndex + $itemsPerPage; $i++) {
                if ($i >= count($hekmaSections)) {
                    break; 
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
