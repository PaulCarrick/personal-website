<?php
echo '<pre>';
foreach (getenv() as $key => $value) {
    echo "$key => $value\n";
}
echo '</pre>';
?>
