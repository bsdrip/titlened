<?php
function get_branch_name($link) {
    $link_parts = explode('/', $link);
    $branch_name = $link_parts[count($link_parts) - 2] . '-' . str_replace('-', '_', $link_parts[count($link_parts) - 1]);
    return $branch_name;
}
function get_pointz_title($link) {
    $link_parts = explode('/', $link);
    $pointz_title = $link_parts[count($link_parts) - 2] . ' ' . str_replace('-', ' ', $link_parts[count($link_parts) - 1]);
    return $pointz_title;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titlened</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <input type="text" name="link" placeholder="Enter YouTrack link"> <br>
        <input type="radio" id="branch_name" name="result" value="branch_name">
        <label for="branch_name">Branch Name</label>
        <input type="radio" id="pointz_title" name="result" value="pointz_title">
        <label for="pointz_title">Pointz Title</label> <br>
        <input type="submit" value="Generate">
    </form>
    <?php if (isset($_POST['link']) && $_POST['link'] !== ''): ?>
        <pre>
            <code id="code-block">
                <?php
                    if (isset($_POST['link'])) {
                        if (isset($_POST['result'])) {
                            if ($_POST['result'] == 'branch_name') {
                                echo get_branch_name($_POST['link']);
                            } else if ($_POST['result'] == 'pointz_title') {
                                echo get_pointz_title($_POST['link']);
                            }
                        }
                    }
                ?>
            </code>
        <button id="copy-button" onclick="copyText()">Copy</button>
        </pre>
    <?php endif; ?>
    <script>
        function copyText() {
            const codeBlock = document.getElementById('code-block');
            const range = document.createRange();
            range.selectNode(codeBlock);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
        }
    </script>
</body>
</html>
