
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

    $code = "<form method=\"$form_method\" action=\"$form_action\" class=\"$form_class\"> \n";

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
            $code .= $tab."  <label>$name</label>\n";
            $code .= $tab."  <input type=\"$type\" class=\"$input_class\" name=\"$name\">\n ";
        
        if(!empty($html_after)){
        $code .= "  $html_after\n";
        }
        
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
    $code .= "</form>";
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Forms - SB Admin Pro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <div id="layoutSidenav">
           
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                            Forms
                                        </h1>
                                        <div class="page-header-subtitle">Dynamic form components to give your users informative and intuitive inputs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container mt-n10">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Default Bootstrap Form Controls-->
                                <div id="default">
                                    <div class="card mb-4">
                                        <div class="card-header">Default Bootstrap Form Controls</div>
                                        <div class="card-body">
                                            <!-- Component Preview-->
                                            <div class="sbp-preview">
                                                <div class="sbp-preview-code">
                                                    <!-- Code sample-->
                                                    <ul class="nav nav-tabs" id="formsDefaultTabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active mr-1" id="formsDefaultHtmlTab" data-toggle="tab" href="#formsDefaultHtml" role="tab" aria-controls="formsDefaultHtml" aria-selected="true">
                                                                <i class="fab fa-html5 text-orange mr-1"></i>
                                                                HTML
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="formsDefaultPugTab" data-toggle="tab" href="#formsDefaultPug" role="tab" aria-controls="formsDefaultPug" aria-selected="false">
                                                                <img class="img-pug mr-1" src="assets/img/php.svg" />
                                                                PHP
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!-- Tab panes-->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="formsDefaultHtml" role="tabpanel" aria-labelledby="formsDefaultHtmlTab">
                                                            <pre class="language-markup"><code><script type="text/plain"><?php echo $code ?></script></code></pre>
                                                        </div>
                                                        <div class="tab-pane" id="formsDefaultPug" role="tabpanel" aria-labelledby="formsDefaultPugTab">
                                                            <pre class="language-php"><code><?php echo $post ?></code></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sbp-preview-content">
                                                    <?php echo $code ?>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Sticky Navigation-->
                            
                        </div>
                    </div>
                </main>
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; Your Website 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-markup.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/date-range-picker-demo.js"></script>
    </body>
</html>
