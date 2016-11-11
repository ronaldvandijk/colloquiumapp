<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colloquia</title>
    <link href="/css/mobile.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


</head>
<body>
    <div class="container">
      <h1>Hanze Colloquium</h1>
        <form action="" method="POST">
            <div class="input-group">
                <select class="selectpicker" data-selected-text-format="count > 1" data-width="25%" Title="Klassen" name="Klassen" multiple>
                    <!-- TODO: Klassen dynamisch vullen. -->
                    <option>ITV1J</option>
                    <option>ITV1A</option>
                    <option>ITV1B</option>
                    <option>ITV1c</option>
                    <option>ITV1d</option>
                    <option>ITV1e</option>
                </select>
                <select class="selectpicker" data-selected-text-format="count > 1" data-width="25%" Title="Locaties" name="Klassen" multiple>
                    <!-- TODO: Locaties dynamisch vullen. -->
                    <option>Loc1</option>
                    <option>loc2</option>
                    <option>loc3</option>
                </select>

                <!-- Date Picker -->
                <div id="sandbox-container">
                    <input type="text" placeholder="Datum" class="form-control">
                </div>
            </div>
            <div class="input-group">

                <input type="text"  class=" form-control " placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                </span>
            </div>
        </form>
        <br>
        @yield('content')
    </div>
    <script> $('#sandbox-container input').datepicker({ });</script>
    <script src="/js/app.js"></script>
</body>
</html>
