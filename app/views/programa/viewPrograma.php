<div class="crearBTn">
    <a href="/programa/new" class="BtnCreate">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" width="50" height="50" stroke-width="2">
            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
            <path d="M15 12h-6"></path>
            <path d="M12 9v6"></path>
        </svg>
    </a>
    <div class="data-container">
        <?php
        if (isset($programas) && is_array($programas)) {
            foreach ($programas as $programa) {
                echo "<div class='record'>
                    <span>
                        $programa->id - $programa->codigo - $programa->nombre - $programa->nombreCentro
                    </span>
                    <div class='buttons'>
                        <a href='/programa/view/$programa->id'>Consultar</a>
                        <a href='/programa/edit/$programa->id'>Editar</a>
                        <a href='/programa/delete/$programa->id'>Eliminar</a>
                    </div>
                  </div>";
            }
        }
        ?>
    </div>