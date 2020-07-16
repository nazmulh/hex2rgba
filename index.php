<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hex to RGBA</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Nunito', sans-serif;
        line-height: 1.2;

    }

    .wrapper {
        max-width: 1170px;
        margin-left: auto;
        margin-right: auto;
        padding: 50px 15px;
    }

    h1 {
        font-size: 35px;
        text-align: center;
        font-weight: 300;
    }

    .form {}

    form {
        width: 100%;
        max-width: 650px;
        margin-top: 25px;
        margin-left: auto;
        margin-right: auto;
    }

    input {
        border: 1px solid #ddd;
        padding: 0 15px;
        width: 100%;
        line-height: 50px;
        font-size: 15px;
        color: #666;
    }

    label {
        display: block;
        font-size: 16px;
    }

    button:hover {
        background: #d5efc2;
    }

    button {
        cursor: pointer;
        float: right;
        margin-top: 25px;
        display: block;
        max-width: 320px;
        line-height: 50px;
        border: 0;
        border-radius: 5px;
        width: 100%;
        font-size: 15px;
        color: #7a7a7a;
        transition: .3s;
        margin-bottom: 15px;
    }
    </style>
</head>

<body>
    <?php
// Function to convert hex color to rgba
        function hex2rgba($getColor){
            $color = $getColor;
            $color = ltrim($color, '#');
            $lcolor = strlen($color);
           
            if($lcolor===3 || $lcolor===6 ){
                if($lcolor===3){
                    $color = $color.$color;
                }

                list($red, $green, $blue) = sscanf($color, '%02x%02x%02x');
                return "rgba( {$red}, {$green}, {$blue}, 1)";
            }
            else{
               return  $colorCode = "Please write correct hexcode of your color";
            }
            
        }
        // If form is set
        if (isset($_POST['submit'])) { 
            if(isset($_POST['hex']) && !empty($_POST['hex'])){
                $getColor = htmlspecialchars($_POST['hex']);
                $colorCode = hex2rgba($getColor);
            }
            else{
                $colorCode = "hexcode cant be empty";
            }
        }


        
 ?>
    <div class="wrapper">
        <h1>Hex color Code to RGBA</h1>
        <div class="form">
            <form method="POST">
                <p>
                    <label for="hex">Hex Code value:</label>
                    <br>
                    <input type="text" placeholder="Hex as such as #000 or 000" id="hex" name="hex">
                </p>
                <p>
                    <button type="submit" name="submit">Get Rgba Value</button></p>
                <?php
                    if (isset($_POST['submit'])) { 
                    echo " <p><input  style='background: {$colorCode}' type='text' placeholder=' {$colorCode}'> </p> ";

                }

                ?>
                </p>
            </form>
        </div>
    </div>



</body>

</html>