<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/custom/css/custom.css">

    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
        <a class="navbar-brand" href="#">Jarigan Saraf Tiruan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Testing <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <form action="" id="form-vector">
                    <?php foreach ([0, 7, 14, 21, 28, 35, 42, 49, 56] as $rangeVertical) { ?>
                        <div class="d-flex flex-vector justify-content-center">
                            <?php foreach (range(1, 7) as $rangeHorizontal) { ?>
                                <div class="vector-container">
                                    <label class="checkbox-vector m-0 p-0">
                                        <input type="checkbox" class="vector-input" name="vector[<?php echo ($rangeVertical + $rangeHorizontal) ?>]" value="1">
                                        <div class="vector-box"></div>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </form>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="">Threshold</label>
                    <input type="text" class="form-control" name="theta" id="theta" value="10">
                </div>
                <div class="form-group">
                    <label for="">Max Epoch</label>
                    <input type="text" class="form-control" name="max_iteration" id="max_iteration" value="100">
                </div>
                <div>
                    <button class="btn btn-md btn-primary btn-block" id="btn-testing">Testing</button>
                </div>

                <div>
                    <label for="">Output Huruf</label>
                    <div id="output">

                    </div>
                </div>
            </div>
        </div>

        
    </div>
    
    <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/popper/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="./assets/custom/js/custom.js"></script>
</body>
</html>