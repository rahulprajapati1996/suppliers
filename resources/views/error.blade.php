<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row flex-center">
            <div class="col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Error</div>
                    <div class="panel-body">
                        <h1 class="text-danger">{{ $data['message'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>