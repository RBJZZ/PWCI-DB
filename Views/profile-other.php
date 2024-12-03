<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/profile.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
    <title>Perfil de Usuario</title>
</head>
<body>

    <?php include 'navbar.php'; ?>
    
    <div class="container-fluid" style="margin-top: 58px;">
        <div class="row justify-content-center">
            <div class="col-lg-4 p-4 m-4">
                <div class="row justify-content-center text-center p-2">
                    <div class="col-lg-8 bg-light p-4 rounded-4">
                        <img id="img-preview" class="img-fluid border border-rounded rounded-pill m-1" 
                             src="../Views/<?php echo htmlspecialchars($usuario['pfp']); ?>" 
                             alt="Foto de <?php echo htmlspecialchars($usuario['username']); ?>" 
                             style="width: 200px;">
                        <h2 class="m-0 mb-2"><?php echo htmlspecialchars($usuario['username']); ?></h2>
                        <div class="justify-items-center text-start">
                            <p class="text-bold">Se unió el: <span class="text-primary"><?php echo htmlspecialchars($usuario['join_date']); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <?php if (!$usuario['visible']): ?>
                    <div class="hidden-profile text-center">
                        <h2 class="ms-0 p-5 mt-5">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                                </svg>
                            </span>
                            Este usuario bloqueó su perfil
                        </h2>
                    </div>
                <?php else: ?>
                    <div class="user-list mt-5 p-3">
                        <h2 class="ms-2 mt-2">Listas del Usuario</h2>
                        <div class="card-group" id="user-lists-container">
                            <?php if (!empty($listas)): ?>
                                <?php foreach ($listas as $lista): ?>
                                    <div class="card mx-1 shadow-sm">
                                    <a href="../Views/list-click.php?id=<?php echo htmlspecialchars($lista['id'])?>&ul=<?php echo htmlspecialchars($usuario['id'])?>">
                                        <img src="../Views/src/src/img1.png" class="card-img-top" alt="list-user">
                                    </a>
                                        <div class="card-body">
                                            
                                            <h5 class="card-title"><?php echo htmlspecialchars($lista['nombre']); ?></h5>
                                            <p class="card-text"><?php echo htmlspecialchars($lista['descripcion']); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No hay listas públicas creadas por este usuario.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
