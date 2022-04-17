<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="bootstrap/css/bootstrap-gradient-custom.css" rel="stylesheet" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <title>Login - SGP&C</title>
</head>
<body>
    <section class="vh-100 gradient-custom">
         <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                           
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50">Porfavor entre com sua matrícula e senha!</p>
                           
                            <?php
                                if(isset($login_err) && $login_err == 1){
                        
                                echo('<p class="text-danger">Nome de usuário ou senha incorretos</p>');
                                }
                            ?>
                            <form action="#" method="post" id="formlogin" name="formlogin">
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="typeMatriculaX" id="typeMatriculaX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeMatriculaX">Matrícula</label>
                                </div>


                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="typePasswordX" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Senha</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>
</body>
</html>