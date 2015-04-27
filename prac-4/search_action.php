<!DOCTYPE html>
<html>
<head>
    <?php require("db_config.php"); ?>
</head>

<body>
    <?php
    $q = mysqli_real_escape_string($connect, $_GET['q']); //get q from the address bar, also escaping the string
    $sql = "SELECT * FROM `restaurant-data` WHERE CONCAT(`name`, `address`, `contact`) LIKE '%" . $q . "%'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $i=0;
        while($row = mysqli_fetch_array($result)) {
            $images = $row["image-url"];
            $imageArray = explode("#", $images);
            echo "<div class=\"panel panel-default\">";
            echo "<div class=\"panel-heading\">";
            echo "<span class=\"badge\">" . $row["id"] . "</span><b>" . $row["name"] . "</b>";
            echo "</div>";
            echo "<div class=\"panel-body\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-lg-4\">";
            echo "<a href=\"" . $imageArray[0] . "\" data-lightbox=\"" . $row["name"] . "\">";
            echo "<img class=\"imgLightbox\" src=\"" . $imageArray[0] . "\" alt=\"" . $row["name"] . "\" />";
            echo "</a>";
            echo "<a href=\"" . $imageArray[1] . "\" data-lightbox=\"" . $row["name"] . "\">";
            echo "<img class=\"imgLightbox\" src=\"" . $imageArray[1] . "\" alt=\"" . $row["name"] . "\" />";
            echo "</a>";
            echo "<a href=\"" . $imageArray[2] . "\" data-lightbox=\"" . $row["name"] . "\">";
            echo "<img class=\"imgLightbox\" src=\"" . $imageArray[2] . "\" alt=\"" . $row["name"] . "\" />";
            echo "</a>";
            echo "</div>";
            echo "<div class=\"col-lg-8\">";
            echo "<p>";
            echo "Address: " . $row["address"];
            echo "<br>";
            echo "Phone: " . $row["contact"];
            echo "</p>";
            echo "<div class=\"more-panel\">";
            echo "<div class=\"moreInfo-panel\">";
            echo "<blockquote>";
            echo $row["description"];
            echo "</blockquote>";
            echo "</div>";
            echo "<a href=\"javascript:void(0);\" class=\"btn btn-primary moreInfo\">More Info</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            ?>
            <?php 
            $i++;
        }
    }
    else
    {
        echo "<table class=\"table table-striped\">";
        echo "<tr>";
        echo "<th rowspan=\"8\" style=\"text-align:center;\">No entries found!";
        echo "</th>";
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>
</html>