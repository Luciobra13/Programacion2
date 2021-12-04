<main class="main-content">
    <div class="container">
        <h2 class="mb-1">Ingresar al Panel de Administración</h2>

        <p>Desde este panel se pueden administrar los productos de este sitio</p>

        <form action="acciones/auth-iniciar-sesion.php" method="post">
            <div class="form-fila">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-fila mt-4 mb-2">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="button mt-2 mb-3">Ingresar</button>
        </form>


    </div>
</main>
