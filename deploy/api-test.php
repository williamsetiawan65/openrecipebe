<?php

// version
// ganti ke mode development untuk menggunakan konfigurasi database lokal, ganti ke mode release untuk menggunakan konfigurasi database di hosting
$mode = "cobacobarelease"; // development / release

// database connection
if ($mode == "development") {
    $conn = mysqli_connect("localhost", "root", "", "openrecipe");
} else if ($mode == "release") {
    $conn = mysqli_connect("localhost", "id22255497_openrecipe", "Openrecipe@12", "id22255497_openrecipe");
}

//Access-Control-Allow-Origin header with wildcard.
header('Access-Control-Allow-Origin: *');
// php response type
header('Content-Type: application/json; charset=utf-8');

// error container
$errorContainer = 0;

if ($mode == "development" || $mode == "release") {
    // n videos with high views
    if (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "view") {
        if (isset($_GET["limit"]) && isset($_GET["offset"])) {
            $query = mysqli_query($conn, "SELECT * FROM video ORDER BY viewCount DESC LIMIT " . $_GET["limit"] . " OFFSET " . $_GET["offset"]);
        } else {
            $query = mysqli_query($conn, "SELECT * FROM video ORDER BY viewCount DESC");
        }
        $result = ["data" => []];
        while ($row = mysqli_fetch_assoc($query)) {
            $result["data"][] = $row;
        }
        mysqli_close($conn);
        $result = json_encode($result);
        if ($result == '{"data":[]}') {
            echo (json_encode(["data" => "data 0"]));
        } else {
            echo ($result);
        }
    }

    // n latest videos
    else if (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "date") {
        if (isset($_GET["limit"]) && isset($_GET["offset"])) {
            $query = mysqli_query($conn, "SELECT * FROM video ORDER BY dateAdded DESC LIMIT " . $_GET["limit"] . " OFFSET " . $_GET["offset"]);
        } else {
            $query = mysqli_query($conn, "SELECT * FROM video ORDER BY dateAdded DESC");
        }
        $result = ["data" => []];
        while ($row = mysqli_fetch_assoc($query)) {
            $result["data"][] = $row;
        }
        mysqli_close($conn);
        $result = json_encode($result);
        if ($result == '{"data":[]}') {
            echo (json_encode(["data" => "data 0"]));
        } else {
            echo ($result);
        }
    }

    // event videos
    else if (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "event") {
        if (isset($_GET["limit"]) && isset($_GET["offset"])) {
            if (isset($_GET["event"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE event = '" . $_GET["event"] .  "' ORDER BY dateAdded DESC" . " LIMIT " . $_GET["limit"] . " OFFSET " . $_GET["offset"]);
            } else {
                $errorContainer = 1;
            }
        } else {
            if (isset($_GET["event"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE event = '" . $_GET["event"] . "'  ORDER BY dateAdded DESC");
            } else {
                $errorContainer = 1;
            }
        }
        if ($errorContainer == 0) {
            $result = ["data" => []];
            while ($row = mysqli_fetch_assoc($query)) {
                $result["data"][] = $row;
            }
            mysqli_close($conn);
            $result = json_encode($result);
            if ($result == '{"data":[]}') {
                echo (json_encode(["data" => "data 0"]));
            } else {
                echo ($result);
            }
        } else if ($errorContainer == 1) {
            echo (json_encode(["data" => "wrong request"]));
        }
    }

    // n homepage videos
    elseif (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "homepage") {
        if (isset($_GET["limit"]) && isset($_GET["offset"])) {
            if (isset($_GET["country"]) && isset($_GET["category"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE country = '" . $_GET["country"] . "' AND category = '" . $_GET["category"] . "' ORDER BY dateAdded DESC" . " LIMIT " . $_GET["limit"] . " OFFSET " . $_GET["offset"]);
            } else {
                $errorContainer = 1;
            }
        } else {
            if (isset($_GET["country"]) && isset($_GET["category"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE country = '" . $_GET["country"] . "' AND category = '" . $_GET["category"] . "' ORDER BY dateAdded DESC");
            } else {
                $errorContainer = 1;
            }
        }
        if ($errorContainer == 0) {
            $result = ["data" => []];
            while ($row = mysqli_fetch_assoc($query)) {
                $result["data"][] = $row;
            }
            mysqli_close($conn);
            $result = json_encode($result);
            if ($result == '{"data":[]}') {
                echo (json_encode(["data" => "data 0"]));
            } else {
                echo ($result);
            }
        } else if ($errorContainer == 1) {
            echo (json_encode(["data" => "wrong request"]));
        }
    }

    // n ingredient page videos
    elseif (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "ingpage") {
        if (isset($_GET["limit"]) && isset($_GET["offset"])) {
            if (isset($_GET["country"]) && isset($_GET["ingredients"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE country = '" . $_GET["country"] . "' AND ingredients = '" . $_GET["ingredients"] . "' ORDER BY dateAdded DESC" . " LIMIT " . $_GET["limit"] . " OFFSET " . $_GET["offset"]);
            } else {
                $errorContainer = 1;
            }
        } else {
            if (isset($_GET["country"]) && isset($_GET["ingredients"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE country = '" . $_GET["country"] . "' AND ingredients = '" . $_GET["ingredients"] . "' ORDER BY dateAdded DESC");
            } else {
                $errorContainer = 1;
            }
        }
        if ($errorContainer == 0) {
            $result = ["data" => []];
            while ($row = mysqli_fetch_assoc($query)) {
                $result["data"][] = $row;
            }
            mysqli_close($conn);
            $result = json_encode($result);
            if ($result == '{"data":[]}') {
                echo (json_encode(["data" => "data 0"]));
            } else {
                echo ($result);
            }
        } else if ($errorContainer == 1) {
            echo (json_encode(["data" => "wrong request"]));
        }
    }

    // list country, ingredients, or category
    elseif (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "list") {
        if (isset($_GET["listType"])) {
            if ($_GET["listType"] == "ingredients") {
                $query = mysqli_query($conn, "SELECT DISTINCT ingredients FROM video");
            } else if ($_GET["listType"] == "country") {
                $query = mysqli_query($conn, "SELECT DISTINCT country FROM video");
            } else if ($_GET["listType"] == "category") {
                $query = mysqli_query($conn, "SELECT DISTINCT category FROM video");
            } else {
                $errorContainer = 1;
            }
        } else {
            $errorContainer = 1;
        }
        if ($errorContainer == 0) {
            $result = ["data" => []];
            while ($row = mysqli_fetch_assoc($query)) {
                if ($row[$_GET["listType"]] != "") {
                    $result["data"][] = $row[$_GET["listType"]];
                }
            }
            mysqli_close($conn);
            $result = json_encode($result);
            if ($result == '{"data":[]}') {
                echo (json_encode(["data" => "data 0"]));
            } else {
                echo ($result);
            }
        } else if ($errorContainer == 1) {
            echo (json_encode(["data" => "wrong request"]));
        }
    }

    // search videos
    else if (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "search") {
        if (isset($_GET["limit"]) && isset($_GET["offset"])) {
            if (isset($_GET["keyword"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE videoName LIKE '%" . $_GET["keyword"] . "%' ORDER BY dateAdded DESC" . " LIMIT " . $_GET["limit"] . " OFFSET " . $_GET["offset"]);
            } else {
                $errorContainer = 1;
            }
        } else {
            if (isset($_GET["keyword"])) {
                $query = mysqli_query($conn, "SELECT * FROM video WHERE videoName LIKE '%" . $_GET["keyword"] . "%' ORDER BY dateAdded DESC");
            } else {
                $errorContainer = 1;
            }
        }
        if ($errorContainer == 0) {
            $result = ["data" => []];
            while ($row = mysqli_fetch_assoc($query)) {
                $result["data"][] = $row;
            }
            mysqli_close($conn);
            $result = json_encode($result);
            if ($result == '{"data":[]}') {
                echo (json_encode(["data" => "data 0"]));
            } else {
                echo ($result);
            }
        } else if ($errorContainer == 1) {
            echo (json_encode(["data" => "wrong request"]));
        }
    }

    // update video view count
    elseif (isset($_GET["request"]) && $_GET["request"] == "videoList" && isset($_GET["option"]) && $_GET["option"] == "updateView") {
        if (isset($_GET["videoId"])) {
            $query = mysqli_query($conn, "UPDATE video SET viewCount = viewCount + 1 WHERE videoId = '" . $_GET["videoId"] . "'");
        } else {
            $errorContainer = 1;
        }

        if ($errorContainer == 0) {
            mysqli_close($conn);
            if ($query == true) {
                echo (json_encode(["data" => "view count update succes"]));
            } else {
                echo (json_encode(["data" => "view count update failed"]));
            }
        } else if ($errorContainer == 1) {
            echo (json_encode(["data" => "wrong request"]));
        }
    } else {
        echo (json_encode(["data" => "wrong request"]));
    }
} else {
    echo (json_encode(["data" => "wrong api version"]));
}
