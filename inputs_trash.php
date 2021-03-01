<?php
if(isset($_POST['submit'])){
    $inputs_number = $_POST["inputs_number"];
    
    $inputs = [];
    foreach (range(0, $inputs_number-1) as $number) {
        array_push($inputs,"option".$number);
    };
    // print_r($inputs);
}

?>

<html lang="en">

<head>
    <title>Form Builder</title>
</head>

<body>
    <form method="post" action="generate.php">
        <label>Form method</label>
        
        <select name="form_method" id="">
                <option value="POST">POST</option>
                <option value="GET">GET</option>
        </select>
    </br>
        <label>Form action</label>
        <input type="text" name="form_action" id="">
    </br>
        <label>Form class</label>
        <input type="text" name="form_class" id="">
    </br>
        <label>Html before</label>
        <input type="text" name="html_before" id="">
    </br>
        <label>Html after</label>
        <input type="text" name="html_after" id="">
    </br>
        <label>Input class</label>
        <input type="text" name="input_class" id="">
    </br>
    </br>
    <label>Inputs</label>
</br>

        <?php foreach($inputs as $item): ?>
            <input type="text" name = "<?php echo $item ?>">
            <select name = "<?php echo $item."type"; ?>" id="">
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="date">Date</option>
                <option value="email">Email</option>
                <option value="password">Password</option>
                <option value="time">Time</option>
                <option value="file">File</option>
                <option value="hidden">Hidden</option>
        
            </select>
        </br>
            
            
        <?php endforeach;?>
        <br>
        

        <input type="hidden" value="<?php echo $inputs_number?>" name="inputs_number">
        <input type="submit" value="submit" name="submit">

        
    </form>

   
</body>
</html>


<?php 
      //echo "<form method =\"$form_method\" action=\"$form_action\" class=\"$form_class\">$html_before QETU INPUTI $html_after </form>";
?>
