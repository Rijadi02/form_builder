$code .= "<form method=\"$form_method\" action=\"$form_action\" class=\"$form_class\" enctype=\"multipart/form-data\">  \n";
    $code .= "@csrf\n";
    $method = "\$_".strtoupper($form_method);
    
    $fields = [];
    $values = [];
    $post = "";
    foreach($options as $option => $value){
        $name = $value[0];
        $type = $value[1];
        
        $tab = "";

        $code .= "\n";
        
        if(!empty($html_before)){
            $code .= "  $html_before\n";
            $tab = "    ";
        }   
            $code .= $tab."<div class=\"col-lg-12\">\n";
            $code .= $tab."<label for=\"$name\" class=\"col-md-12 col-form-label\">Add $name</label>\n";
            $code .= $tab."<input id=\"$name\" type=\"$type\" name=\"$name\" class=\"form-control @error('$name') is-invalid @enderror\" value=\"{{ old('$name') }}\" autocomplete=\"$name\">\n";
            $code .= $tab."@error('$name')\n";
            $code .= $tab."<span class=\"invalid-feedback\" role=\"alert\">\n";
            $code .= $tab."<strong>{{ \$message }}</strong>";
            $code .= $tab."</span>\n";
            $code .= $tab."@enderror\n";
            $code .= $tab."</div>\n";
            ?>
         
              
            
            <?php
        if(!empty($html_after)){
        $code .= "  $html_after\n";
        }
        
        array_push($fields,"`$name`");
        
        
        
        
        
        //Query
        switch($type){
            case "date":
                array_push($values,"STR_TO_DATE('$$name', '%Y-%m-%d')");
                break;
            default:
                array_push($values,"'$$name'");
        };
        switch($type){
            case "time":
                $post .= "$$name = date(\"G:i\", strtotime(htmlspecialchars(".$method."[\"$name\"])));\n";
                break;
            default:
                $post .= "$$name = htmlspecialchars(".$method."[\"$name\"]);\n";
        };
     
        }
        $fields = implode(', ', $fields);
        $values = implode(', ', $values);

        $i_query = "INSERT INTO table_name($fields) VALUES($values);";
        $post .= "\n\$query = \"$i_query\";";
        $code .= "\n";
        //Query End

    $code .= "<div class=\"form-group mt-3\">\n";
    $code .= "<button type=\"submit\" class=\"btn btn-primary\">Add</button>\n</div>";
    $code .= "</form>";