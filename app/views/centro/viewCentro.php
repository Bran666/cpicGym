<div class="crearBTn">
    <a href="/centro/new" class="BtnCreate">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" width="50" height="50" stroke-width="2">
            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
            <path d="M15 12h-6"></path>
            <path d="M12 9v6"></path>
        </svg>
    </a>
    <div class="data-container">
        <?php
        if (isset($centros) && is_array($centros)) {
            foreach ($centros as $key => $value) {
                echo "<div class='record'>
                            <span>$value->id - $value->nombre </span>
                                <div class='buttons'>
                                    <a href='/centro/view/$value->id' >Consultar</a>
                                    <a href='/centro/edit/$value->id' >Editar</a>
                                    <a href='/centro/delete/$value->id' >Eliminar</a>
                                </div>
                            </div>";
            }
        }
        ?>
    </div>