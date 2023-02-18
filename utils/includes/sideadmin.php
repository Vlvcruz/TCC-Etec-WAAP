<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="../../painel/ong/css/styles.css">
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
<div class="sidebar">
    <div class="logo-details">
        <!--<i class='bx bxl-c-plus-plus icon'></i>-->
        <div class="logo_name">WAAP</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Buscar...">
            <span class="tooltip">Buscar</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="pet.php">
                <i><span class="iconify" data-icon="cil:animal"></span></i>
                <span class="links_name">Pets</span>
            </a>
            <span class="tooltip">Pets</span>
        </li>
        <li>
            <a href="aviso.php">
                <i class='bx bx-chat'></i>
                <span class="links_name">Avisos</span>
            </a>
            <span class="tooltip">Avisos</span>
        </li>
        <li>
            <a href="estatisticas.php">
                <i class='bx bx-pie-chart-alt-2'></i>
                <span class="links_name">Estatísticas</span>
            </a>
            <span class="tooltip">Estatísticas</span>
        </li>
        <li>
            <a href="editar.php">
                <i class='bx bx-cog'></i>
                <span class="links_name">Gerenciar</span>
            </a>
            <span class="tooltip">Gerenciar</span>
        </li>
        <li>
            <a href="cadastro-animal.php">
                <i><span class="iconify" data-icon="ic:outline-app-registration"></span></i>
                <span class="links_name">Cadastrar Pet</span>
            </a>
            <span class="tooltip">Cadastrar Pet</span>
        </li>
        <li class="profile">
            <a href="../../index.php">
                <i class='bx bx-log-out' id="log_out"></i>
                <span class="links_name">Sair</span>
            </a>
        </li>
    </ul>
</div>
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });
    searchBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
</script>