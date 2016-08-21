  <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <style type="text/css">
       .imag{
        width: 100px;
        height: 100px;
        }
    </style>
    <body>
        <div class="container">
            <div class="row">
                <?php
                echo date('d-M-y G:i:s');
                ?>
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="title">Qeydiyyat</h3>
                    <form method="post" action="upload_run.php" enctype="multipart/form-data"> 
                    <!-- enctype olmasa file upload olmur -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Adı">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="place" placeholder="Yer adı">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="pict">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default pull-right" type="submit" value="Yukle" name="upload">
                        </div>
                    </form>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Yükləyən</th>
                                    <th>Yer</th>
                                    <th>Şəkil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Yolchu Nasib</td>
                                    <td>Quba</td>
                                    <td>
                                        <img width="128" src="uploads/19082016152158photo.jpg" class="img-responsive">
                                    </td>
                                </tr>
<?php

  $myfile = fopen("array.txt", "a+") or die("Unable to open file!");

  $list = [];

  while (!feof($myfile)) {
      $list[] = fgets($myfile);
      array_push($list, fgets($myfile));
  }
  fclose($myfile);
   

        $list = explode('@@@###@@@',file_get_contents("array.txt"));

        foreach ($list as $key => $value){
          $list[$key] = explode('|', $value);
         }

foreach ($list as $key => $value) {

    if (isset($value[1])) {
         echo "<tr><td>$value[0]</td><td>$value[1]</td><td><img class='imag' src='$value[2]'></td></tr>";
    }

}
?>
                            </tbody>
                            <!-- <img src=""> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>








 