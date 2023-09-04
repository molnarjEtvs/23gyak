<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hírlevél feliratkozás</title>
     <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="bg-info p-3">
                <h1>Iratkozz fel hírlevelünkre!</h1>
                <form>
                    <div>
                        <label for="nev">Név</label>
                        <input type="text" name="nev" id="nev" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label for="email">E-mail cím:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn bg-danger w-100 text-white">Feliratkozom</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>

    

</body>
</html>