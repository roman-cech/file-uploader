<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Files</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
</head>
<body>
    <section class="bg-info p-3">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 50vh">
                <div class="col-sm-10 text-center">
                    <div class="col text-center mb-3">
                        <h1 class="text-warning display-2">Table of Files</h1>
                    </div>
                    <div class="my-custom-scrollbar">
                        <table id="myTable" class="table table-bordered table-light">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                                <?php
                                    $directory = array_diff(scandir("../files/"), array('..', '.'));
                                    $arraySupport = array();

                                    if ($_GET['getDir']){
                                        $leftDir = array_diff(scandir("../files/directory/"), array('..', '.'));
                                        $directory = array();
                                        echo "<tr><td>";
                                        echo "<a href='?index.php'>"."..."."</a></td>";
                                        echo "<td>"." "."</td>";
                                        echo "<td>"." "."</td></tr>";
                                        foreach ($leftDir as $item){
                                            $arraySupport = explode(":", $item);
                                            echo "<tr><td>".$arraySupport[0]."</td>";
                                            echo "<td>".filesize("../files/directory/$item"). " bytes</td>";
                                            echo "<td>".date("d M Y H:i:s.", filemtime("../files/directory/$item"))."</td></tr>";
                                        }
                                    }

                                    foreach ($directory as $item){
                                        $arraySupport = explode(":", $item);
                                        echo "<tr><td>";
                                        if(is_dir("../files/$item")) {
                                            echo "<a href='?getDir=$item'>" . $item . ".." . "</a>";
                                            echo "</td>";
                                            echo "<td>"." "."</td>";
                                            echo "<td>"." "."</td></tr>";
                                        }
                                        else {
                                            echo  $arraySupport[0];
                                            echo "</td>";
                                            echo "<td>".filesize("../files/$item") . " bytes</td>";
                                            echo "<td>".date("d M Y H:i:s.", filemtime("../files/$item")) . "</td></tr>";
                                        }
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-warning p-3 text-center">
        <div class="container-fluid">
            <div class="row justify-content-center" style="height: 50vh">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="col text-center mb-3">
                        <h1 class="text-info display-3">Form</h1>
                    </div>
                    <div class="form-group">
                        <label><strong>Select file to upload:</strong></label>
                        <input class="form-control" type="text" name="getNewName" placeholder="File name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Upload Image" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="script.js"></script>
</body>
</html>