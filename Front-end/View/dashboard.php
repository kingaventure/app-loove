
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Loove</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
      <link rel="stylesheet" href="/app-loove/Front-end/assets/css/dashboard.css">
</head>
<body>

<div class="container py-5">
    <h1 class="text-center mb-5">Dashboard Administrateur</h1>
    
    <div class="row g-4">
        <!-- Gestion Utilisateurs -->
        <div class="col-md-6">
            <a href="index.php?component=users" class="text-decoration-none">
                <div class="card admin-card bg-primary text-white">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class='bx bx-user admin-icon mb-3'></i>
                        <h3 class="card-title">Gestion Utilisateurs</h3>
                    </div>
                </div>
            </a>
        </div>

        <!-- Gestion Profils -->
        <div class="col-md-6">
            <a href="index.php?component=profiles" class="text-decoration-none">
                <div class="card admin-card bg-success text-white">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class='bx bx-id-card admin-icon mb-3'></i>
                        <h3 class="card-title">Gestion Profils</h3>
                    </div>
                </div>
            </a>
        </div>

        <!-- Gestion Signalements -->
        <div class="col-md-6">
            <a href="index.php?component=report" class="text-decoration-none">
                <div class="card admin-card bg-danger text-white">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class='bx bx-flag admin-icon mb-3'></i>
                        <h3 class="card-title">Gestion Signalements</h3>
                    </div>
                </div>
            </a>
        </div>

        <!-- Gestion Messages -->
        <div class="col-md-6">
            <a href="index.php?component=diss" class="text-decoration-none">
                <div class="card admin-card bg-warning text-white">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class='bx bx-message admin-icon mb-3'></i>
                        <h3 class="card-title">Gestion Messages</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<button id="logout" class="btn btn-danger position-fixed bottom-0 end-0 m-3">
    <a href="index.php?component=logout" class="btn btn-danger">Déconnexion</a>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>