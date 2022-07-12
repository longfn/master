<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .sidebar-container{
            background: lightblue;
            border: 1px solid blue;
            max-height: 100vh;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top bg-light" style="z-index: 9999">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">GOLSOFT</a>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4 sidebar-container sticky-top">
            <div class="row">
              <div class="col-md-12">
                <div class="container-fluid">
                  <p>System</p>
                  <nav class="nav flex-column">
                    <a href="/admin/user" class="nav-link">User management</a>
                    <a href="/admin/role" class="nav-link">Role management</a>
                    <a href="/admin/permission" class="nav-link">Permission management</a>
                  </nav>
                  <p>Catalog</p>
                  <nav class="nav flex-column">
                    <a href="/admin/product" class="nav-link">Product management</a>
                    <a href="/admin/category" class="nav-link">Category management</a>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8" style="min-height: 80vh">
            <div class="row">
              <div class="col-md-12">
                <h3> Category Management </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg sticky-bottom bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">FOOTER</a>
      </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
