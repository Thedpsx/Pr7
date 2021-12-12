<?php
    if (file_exists('database/users.csv')) {
        $filedata = file('database/users.csv');
        for($i = 0; $i < count($filedata); $i++){
            $user = explode(",", $filedata[$i]);
            $users[] = [
                'name' => isset($user[0])?$user[0]:"myerror",
                'email' => isset($user[1])?$user[1]:"myerror",
                'gender' => isset($user[2])?$user[2]:"myerror",
                'filepath' => isset($user[3])?$user[3]:"myerror",
             ];  
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       body{
           padding-top: 3rem;
       }
       .container {
           width: 400px;
       }
   </style>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>File path</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i = 1; $i < count($users); $i++){
                        $imagesrc = (empty(trim($users[$i]['filepath']))) ? 'public/images/empty.png' : $users[$i]['filepath'];
                        echo "<tr>
                                <td>".$users[$i]['name']."</td>
                                <td>".$users[$i]['email']."</td>
                                <td>".$users[$i]['gender']."</td>
                                <td><img src='".$imagesrc."' width='200' height='100'></td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>