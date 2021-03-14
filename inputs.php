<?php
if (isset($_POST['submit'])) {
    $inputs_number = $_POST["inputs_number"];

    $inputs = [];
    foreach (range(0, $inputs_number - 1) as $number) {
        array_push($inputs, "option" . $number);
    };
    // print_r($inputs);
}

?>

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

<body class="">

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

                            <!-- Solid Form Controls-->
                            <div id="solid">
                                <div class="card mb-4">
                                    <div class="card-header">Custom Solid Form Controls</div>
                                    <div class="card-body">
                                        <!-- Component Preview-->

                                        <div class="sbp-preview-content">
                                            <form method="post" action="generate.php">
                                               Old variable=&quot;
                                                <input class="form-control form-control-solid mb-5" name="old_var" style="display: inline; width: 20%;" type="text" placeholder="article" />
                                                &quot;
                                                <br>
                                                &lt;form method=&quot;
                                                <select class="form-control form-control-solid" name="form_method" style="display: inline; width: 20%;">
                                                    <option value="POST">POST</option>
                                                    <option value="GET">GET</option>
                                                </select>
                                                &quot; &nbsp; action=&quot;
                                                <input class="form-control form-control-solid" name="form_action" style="display: inline; width: 20%;" type="text" placeholder="article"/>
                                                &quot; &nbsp; class=&quot;
                                                <input class="form-control form-control-solid" name="form_class" style="display: inline; width: 30%;" type="text" />
                                                &quot; &gt;
                                                <br>

                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                &lt;inputs class=&quot;
                                                <input class="form-control form-control-solid mt-4" name="input_class" style="display: inline; width: 30%;" type="text" />
                                                &quot;&gt;
                                                <br>

                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                <textarea class="form-control form-control-solid mt-4" name="html_before" style="display: inline; width: 70%;" /></textarea>
                                                <br>

                                                <?php foreach ($inputs as $item) : ?>

                                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    &lt;input&nbsp; name=&quot;
                                                    <input name="<?php echo $item ?>" class="form-control form-control-solid mt-4" style="display: inline; width: 20%;" type="text" />
                                                    &quot; &nbsp; type=&quot;
                                                    <select name="<?php echo $item . "type" ?>" class="form-control form-control-solid" style="display: inline; width: 20%;">
                                                        <option value="text">Text</option>
                                                        <option value="number">Number</option>
                                                        <option value="date">Date</option>
                                                        <option value="email">Email</option>
                                                        <option value="password">Password</option>
                                                        <option value="time">Time</option>
                                                        <option value="file">File</option>
                                                        <option value="hidden">Hidden</option>
                                                    </select>
                                                    &quot; &nbsp; /&gt;
                                                    <br>

                                                <?php endforeach ?>

                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                <textarea class="form-control form-control-solid mt-4" name="html_after" style="display: inline; width: 70%;"></textarea>

                                                <p class="mt-4"> &nbsp; &nbsp; &nbsp; &nbsp;
                                                    &lt;/inputs&gt;
                                                </p>

                                                <p class="mt-4">
                                                    &lt;/form&gt;
                                                </p>

                                                <input type="hidden" value="<?php echo $inputs_number?>" name="inputs_number">

                                                <div class="align-items-center text-center center w-100">
                                                    <button type="submit" name="submit" class="btn btn-primary mt-5 p-3" style="width:90%">
                                                        Submit
                                                    </button>
                                                </div>

                                            </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/date-range-picker-demo.js"></script>
</body>

</html>