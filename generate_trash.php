<?php
    if(isset($_POST['submit'])){
        $form_method = $_POST["form_method"];
        $form_action = $_POST["form_action"];
        $form_class = $_POST["form_class"];
        $html_before = $_POST["html_before"];
        $html_after = $_POST["html_after"];
        $input_class = $_POST["input_class"];
        $inputs_number = $_POST["inputs_number"];
    
        $options = [];
        foreach (range(0, $inputs_number-1) as $number) {
            $op = "option".$number;
            $options[$op] = [$_POST[$op], $_POST[$op."type"]];
        };
        // print_r($options);
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    
    $code = "<form method=\"$form_method\" action=\"$form_action\" class=\"$form_class\"> \n";
    $fields = [];
    $values = [];
    $post = "";
    foreach($options as $option => $value){
        $name = $value[0];
        $type = $value[1];
        
        $code .= "\n";
        $code .= "  $html_before\n";
            $code .= "      <label>$name</label>\n";
            $code .= "      <input type=\"$type\" class=\"$input_class\" name=\"$name\">\n ";
        $code .= "  $html_after\n";
        
        array_push($fields,"`$name`");
        switch($type){
            case "date":
                array_push($values,"STR_TO_DATE('$$name', '%Y-%m-%d')");
                break;
            default:
                array_push($values,"'$$name'");
        };
        switch($type){
            case "time":
                $post .= "$$name = date(\"G:i\", strtotime(htmlspecialchars(\$_POST[\"$name\"])));\n";
                break;
            default:
                $post .= "$$name = htmlspecialchars(\$_POST[\"$name\"]);\n";
        };
     
    }
    $fields = implode(', ', $fields);
    $values = implode(', ', $values);

    $i_query = "INSERT INTO table_name($fields) VALUES($values);";
    $post .= "\n\$query = \"$i_query\"";
    $code .= "\n";
    $code .= "</form>";
               
    ?>


    <textarea style="width: 100%;" rows="30" name="asd" id="asd" ><?php echo $code ?></textarea>
    <label for="">Post</label>
    <textarea style="width: 100%;" rows="30" name="asd" id="asd" ><?php echo $post ?></textarea>
    <?php echo $i_query;?>
<br><br><br>
    <?php echo $code ?>
</body>
</html>