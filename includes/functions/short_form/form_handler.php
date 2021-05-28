<?php
// define variables and set to empty values
$linkErr = "";
$link ="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(!empty($_POST['link']))
    {
        $link = filter_var(($_POST["link"]), FILTER_SANITIZE_URL);

        if(filter_var($link, FILTER_VALIDATE_URL) == false)
        {
            $linkErr = "invalid link!";
        }
    }
    else
    {
        $linkErr = "link is required!";
    }
}
?>