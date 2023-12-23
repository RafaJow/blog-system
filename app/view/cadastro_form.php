<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="row g-3">
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nome" aria-label="Nome" id="name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Sobrenome" aria-label="Sobrenome" id="lastname">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Registrar-se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>