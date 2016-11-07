<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colloquia</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/mobile.css" rel="stylesheet">
</head>
<body>
    <div class="container">
      <h1>Hanze Colloquium</h1>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                </span>
            </div>
        </form>
        <br>
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
