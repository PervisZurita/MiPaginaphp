
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$usuario = Yii::$app->user->identity;
$esAdmin = $usuario !== null && ($usuario->role ?? '') === 'admin';
$autenticado = !Yii::$app->user->isGuest;

$nombreUsuario = $autenticado
    ? ($usuario->username ?? $usuario->nombre ?? 'Usuario')
    : 'Usuario';

?>

<style>
:root {
    --nav-bg: #ffffff;
    --nav-border: #e8eaf2;
    --nav-text: #596579;
    --nav-muted: #929db0;
    --nav-primary: #879bc5;
    --nav-primary-soft: #edf1fa;
    --nav-blue: #dce8fa;
    --nav-lavender: #e9e1f7;
    --nav-pink: #f9e2ea;
    --nav-cyan: #dff2f5;
    --nav-green: #e1f1e7;
    --nav-yellow: #fbf0d6;
    --nav-danger: #d87986;
    --nav-shadow: 0 4px 18px rgba(113, 128, 157, 0.10);
}

#site-header,
#site-header *,
#site-header *::before,
#site-header *::after {
    box-sizing: border-box;
}

#site-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 5000;
    width: 100%;
    background: var(--nav-bg);
    border-bottom: 1px solid var(--nav-border);
    box-shadow: var(--nav-shadow);
}

#site-header .navbar-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    width: 100%;
    min-height: 68px;
    padding: 10px 24px;
    overflow: visible;
}

#site-header .navbar-brand {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
    flex-shrink: 0;
    color: var(--nav-text);
    text-decoration: none;
}

#site-header .navbar-brand-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    color: #ffffff;
    background: linear-gradient(135deg, #a9b9dc, #8c9fc9);
    border: 1px solid #d9e1f3;
    border-radius: 13px;
    font-size: 20px;
    box-shadow: 0 4px 10px rgba(140, 159, 201, 0.18);
}

#site-header .navbar-brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

#site-header .navbar-brand-text strong {
    color: #52617b;
    font-size: 14px;
    font-weight: 800;
    letter-spacing: .4px;
}

#site-header .navbar-brand-text span {
    margin-top: 3px;
    color: #a0abc0;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
}

#site-header .navbar-menu {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    margin: 0 auto;
    padding: 0;
    list-style: none;
}

#site-header .navbar-menu a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    min-height: 38px;
    padding: 8px 12px;
    color: var(--nav-text);
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    border: 1px solid transparent;
    border-radius: 10px;
    transition: background .2s ease, color .2s ease, transform .2s ease;
}

#site-header .navbar-menu a i {
    color: #96a8ce;
    transition: color .2s ease;
}

#site-header .navbar-menu a:hover,
#site-header .navbar-menu a.active {
    color: #5c719b;
    background: var(--nav-primary-soft);
    border-color: #e1e7f5;
}

#site-header .navbar-menu a:hover {
    transform: translateY(-1px);
}

#site-header .navbar-menu a:hover i,
#site-header .navbar-menu a.active i {
    color: #748bb8;
}

#site-header .navbar-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 9px;
    flex-shrink: 0;
}

#site-header .navbar-icon-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    padding: 0;
    color: #8292b2;
    background: #f8f9fd;
    border: 1px solid #e6eaf4;
    border-radius: 11px;
    cursor: pointer;
    transition: background .2s ease, color .2s ease, transform .2s ease;
}

#site-header .navbar-icon-button:hover {
    color: #637ca9;
    background: #eaf0fb;
    border-color: #dbe4f5;
    transform: translateY(-1px);
}

#site-header .navbar-search {
    display: none;
    align-items: center;
    gap: 7px;
}

#site-header .navbar-search.active {
    display: flex;
}

#site-header .navbar-search input {
    width: 180px;
    height: 38px;
    padding: 0 12px;
    color: var(--nav-text);
    background: #fbfcff;
    border: 1px solid #e1e7f2;
    border-radius: 10px;
    outline: none;
}

#site-header .navbar-search input::placeholder {
    color: #a4aec0;
}

#site-header .navbar-search input:focus {
    border-color: #a9b9dc;
    box-shadow: 0 0 0 3px rgba(169, 185, 220, .2);
}

#site-header .user-dropdown {
    position: relative;
    flex-shrink: 0;
}

#site-header .user-dropdown-toggle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 38px;
    max-width: 220px;
    padding: 0 11px;
    color: var(--nav-text);
    background: #f9faff;
    border: 1px solid #e5e9f4;
    border-radius: 11px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    white-space: nowrap;
    transition: background .2s ease, border-color .2s ease;
}

#site-header .user-dropdown-toggle:hover,
#site-header .user-dropdown-toggle[aria-expanded="true"] {
    color: #60759d;
    background: #edf1fa;
    border-color: #dce4f4;
}

#site-header .user-dropdown-toggle .user-name {
    display: inline-block;
    max-width: 125px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

#site-header .user-dropdown-toggle .user-avatar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 25px;
    height: 25px;
    color: #647ca7;
    background: #e3eafb;
    border: 1px solid #d5e0f5;
    border-radius: 50%;
    flex-shrink: 0;
}

#site-header .user-dropdown-toggle > .fa-chevron-down {
    color: #a1abc0;
    font-size: 10px;
}

#site-header .user-dropdown-menu {
    position: absolute !important;
    top: calc(100% + 8px) !important;
    right: 0 !important;
    left: auto !important;
    z-index: 10000 !important;
    display: none;
    width: 245px;
    min-width: 220px;
    margin: 0 !important;
    padding: 8px;
    background: #ffffff;
    border: 1px solid #e6eaf3;
    border-radius: 14px;
    box-shadow: 0 14px 35px rgba(100, 116, 145, .16);
    transform: none !important;
}

#site-header .user-dropdown-menu.show {
    display: block;
}

#site-header .user-dropdown-menu .dropdown-user-info {
    padding: 11px 12px;
    margin-bottom: 6px;
    background: #f7f8fd;
    border-bottom: 1px solid #e9edf6;
    border-radius: 9px;
}

#site-header .user-dropdown-menu .dropdown-user-info strong {
    display: block;
    color: #52617b;
    font-size: 13px;
    overflow-wrap: anywhere;
}

#site-header .user-dropdown-menu .dropdown-user-info span {
    display: block;
    margin-top: 4px;
    color: #98a3b7;
    font-size: 11px;
}

#site-header .user-dropdown-menu a,
#site-header .user-dropdown-menu button.dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    min-height: 39px;
    padding: 9px 11px;
    color: #596579;
    background: transparent;
    border: 0;
    border-radius: 9px;
    font-size: 13px;
    text-align: left;
    text-decoration: none;
    cursor: pointer;
    transition: background .2s ease, color .2s ease;
}

#site-header .user-dropdown-menu a i,
#site-header .user-dropdown-menu button.dropdown-item i {
    width: 17px;
    color: #91a4ca;
    text-align: center;
}

#site-header .user-dropdown-menu a:hover,
#site-header .user-dropdown-menu button.dropdown-item:hover {
    color: #5d7299;
    background: #edf1fa;
}

#site-header .user-dropdown-menu .dropdown-divider {
    height: 1px;
    margin: 6px 0;
    background: #edf0f6;
}

#site-header .user-dropdown-menu .logout-item {
    color: #cf7885;
}

#site-header .user-dropdown-menu .logout-item i {
    color: #d58b96;
}

#site-header .user-dropdown-menu .logout-item:hover {
    color: #b95c6b;
    background: #fff0f2;
}

#site-header .logout-form {
    margin: 0;
}

#site-header .navbar-mobile-toggle {
    display: none;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    color: #8292b2;
    background: #f8f9fd;
    border: 1px solid #e6eaf4;
    border-radius: 11px;
    cursor: pointer;
}

/* Tema oscuro */

body.dark-mode #site-header {
    background: #222b3b;
    border-color: #354056;
    box-shadow: 0 4px 18px rgba(0, 0, 0, .16);
}

body.dark-mode #site-header .navbar-brand-text strong {
    color: #e0e7f4;
}

body.dark-mode #site-header .navbar-brand-text span {
    color: #aab7d0;
}

body.dark-mode #site-header .navbar-menu a,
body.dark-mode #site-header .user-dropdown-toggle,
body.dark-mode #site-header .navbar-icon-button,
body.dark-mode #site-header .navbar-mobile-toggle {
    color: #d0d9ea;
    background: #293449;
    border-color: #3a4760;
}

body.dark-mode #site-header .navbar-menu a i {
    color: #b2c4e7;
}

body.dark-mode #site-header .navbar-menu a:hover,
body.dark-mode #site-header .navbar-menu a.active,
body.dark-mode #site-header .user-dropdown-toggle:hover,
body.dark-mode #site-header .user-dropdown-toggle[aria-expanded="true"],
body.dark-mode #site-header .navbar-icon-button:hover,
body.dark-mode #site-header .navbar-mobile-toggle:hover {
    color: #edf2ff;
    background: #38445e;
}

body.dark-mode #site-header .user-dropdown-toggle .user-avatar {
    color: #dbe6ff;
    background: #465675;
    border-color: #536487;
}

body.dark-mode #site-header .navbar-search input {
    color: #e2e8f0;
    background: #293449;
    border-color: #3a4760;
}

body.dark-mode #site-header .user-dropdown-menu {
    background: #293449;
    border-color: #3a4760;
}

body.dark-mode #site-header .user-dropdown-menu .dropdown-user-info {
    background: #222b3b;
    border-color: #3a4760;
}

body.dark-mode #site-header .user-dropdown-menu .dropdown-user-info strong,
body.dark-mode #site-header .user-dropdown-menu a,
body.dark-mode #site-header .user-dropdown-menu button.dropdown-item {
    color: #e0e7f4;
}

body.dark-mode #site-header .user-dropdown-menu .dropdown-user-info span {
    color: #aab7d0;
}

body.dark-mode #site-header .user-dropdown-menu a:hover,
body.dark-mode #site-header .user-dropdown-menu button.dropdown-item:hover {
    background: #38445e;
}

body.dark-mode #site-header .user-dropdown-menu .dropdown-divider {
    background: #3a4760;
}

/* Responsive */

@media (max-width: 1050px) {
    #site-header .navbar-container {
        gap: 10px;
        padding: 10px 15px;
    }

    #site-header .navbar-brand-text strong {
        font-size: 12px;
    }

    #site-header .navbar-menu a {
        padding: 8px;
        font-size: 12px;
    }

    #site-header .navbar-menu a i {
        display: none;
    }
}

@media (max-width: 800px) {
    #site-header .navbar-container {
        flex-wrap: wrap;
        min-height: 68px;
    }

    #site-header .navbar-mobile-toggle {
        display: inline-flex;
    }

    #site-header .navbar-menu {
        display: none;
        order: 5;
        flex-direction: column;
        align-items: stretch;
        width: 100%;
        margin: 0;
        padding: 8px 0 0;
        border-top: 1px solid #e8ebf4;
    }

    #site-header .navbar-menu.mobile-open {
        display: flex;
    }

    #site-header .navbar-menu a {
        justify-content: flex-start;
        width: 100%;
        padding: 11px 12px;
    }

    #site-header .navbar-menu a i {
        display: inline-block;
    }

    #site-header .navbar-brand {
        margin-right: auto;
    }

    #site-header .navbar-brand-text strong {
        font-size: 11px;
    }

    #site-header .navbar-brand-text span {
        font-size: 9px;
    }

    #site-header .navbar-actions {
        gap: 6px;
    }

    #site-header .navbar-search.active {
        position: absolute;
        top: calc(100% + 6px);
        right: 12px;
        z-index: 6000;
        padding: 8px;
        background: #ffffff;
        border: 1px solid #e6eaf3;
        border-radius: 12px;
        box-shadow: 0 8px 22px rgba(100, 116, 145, .16);
    }

    #site-header .navbar-search input {
        width: min(180px, 38vw);
    }

    #site-header .user-dropdown-toggle .user-name {
        display: none;
    }

    #site-header .user-dropdown-toggle {
        width: 38px;
        padding: 0;
    }

    body.dark-mode #site-header .navbar-menu {
        border-color: #3a4760;
    }

    body.dark-mode #site-header .navbar-search.active {
        background: #293449;
        border-color: #3a4760;
    }
}

@media (max-width: 420px) {
    #site-header .navbar-container {
        gap: 7px;
        padding: 9px 10px;
    }

    #site-header .navbar-brand {
        gap: 7px;
    }

    #site-header .navbar-brand-icon {
        width: 36px;
        height: 36px;
        font-size: 17px;
        border-radius: 10px;
    }

    #site-header .navbar-brand-text strong {
        font-size: 10px;
        letter-spacing: 0;
    }

    #site-header .navbar-brand-text span {
        font-size: 8px;
        letter-spacing: 1.5px;
    }

    #site-header .navbar-actions {
        gap: 4px;
    }

    #site-header .navbar-icon-button,
    #site-header .navbar-mobile-toggle,
    #site-header .user-dropdown-toggle {
        width: 34px;
        height: 34px;
    }
}
</style>

<header id="site-header">
    <div class="navbar-container">

        <a class="navbar-brand" href="<?= Url::to(['/site/index']) ?>">
            <span class="navbar-brand-icon">
                <i class="fa-solid fa-scale-balanced"></i>
            </span>

            <span class="navbar-brand-text">
                <strong>INVESTIGACIÓN CON ÉTICA</strong>
                <span>DIGITAL</span>
            </span>
        </a>

        <button
            class="navbar-mobile-toggle"
            type="button"
            id="navbarMobileToggle"
            aria-label="Abrir menú de navegación"
            aria-expanded="false"
        >
            <i class="fa-solid fa-bars"></i>
        </button>

        <nav class="navbar-menu" id="navbarMenu">
            <a href="<?= Url::to(['/site/index']) ?>">
                <i class="fa-solid fa-house"></i>
                Inicio
            </a>

            <a href="<?= Url::to(['/site/about']) ?>">
                <i class="fa-solid fa-circle-info"></i>
                Nosotros
            </a>

            <a href="<?= Url::to(['/site/servicios']) ?>">
                <i class="fa-solid fa-layer-group"></i>
                Servicios
            </a>

            <a href="<?= Url::to(['/site/videos']) ?>">
                <i class="fa-solid fa-newspaper"></i>
                Blog
            </a>
        </nav>

        <div class="navbar-actions">

            <form
                class="navbar-search"
                id="navbarSearch"
                action="<?= Url::to(['/site/index']) ?>"
                method="get"
            >
                <input
                    type="search"
                    name="q"
                    id="navbarSearchInput"
                    placeholder="Buscar en la página..."
                    aria-label="Buscar"
                >

                <button
                    class="navbar-icon-button"
                    type="submit"
                    aria-label="Buscar"
                >
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <button
                class="navbar-icon-button"
                type="button"
                id="navbarSearchToggle"
                aria-label="Mostrar búsqueda"
            >
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

            <button
                class="navbar-icon-button"
                type="button"
                id="navbarThemeToggle"
                aria-label="Cambiar tema"
            >
                <i class="fa-solid fa-moon"></i>
            </button>

            <div class="user-dropdown" id="userDropdownContainer">
                <button
                    class="user-dropdown-toggle"
                    type="button"
                    id="userDropdown"
                    aria-expanded="false"
                    aria-controls="userDropdownMenu"
                >
                    <span class="user-avatar">
                        <i class="fa-solid fa-user"></i>
                    </span>

                    <span class="user-name">
                        <?= Html::encode($nombreUsuario) ?>
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>
                </button>

                <div
                    class="user-dropdown-menu"
                    id="userDropdownMenu"
                    aria-labelledby="userDropdown"
                    hidden
                >
                    <div class="dropdown-user-info">
                        <strong><?= Html::encode($nombreUsuario) ?></strong>
                        <span>
                            <?= $esAdmin
                                ? 'Administrador'
                                : ($autenticado ? 'Usuario registrado' : 'Visitante') ?>
                        </span>
                    </div>

                    <?php if ($autenticado): ?>

                        
<a href="<?= Url::to(['/user/update', 'id' => Yii::$app->user->id]) ?>">
    <i class="fa-solid fa-id-card"></i>
    Editar perfil
</a>


                        <a href="<?= Url::to(['/user/change-password']) ?>">
                            <i class="fa-solid fa-key"></i>
                            Cambiar contraseña
                        </a>

                        <?php if ($esAdmin): ?>
                            <div class="dropdown-divider"></div>

                            <a href="<?= Url::to(['/user/index']) ?>">
                                <i class="fa-solid fa-users-gear"></i>
                                Gestionar usuarios
                            </a>
                        <?php endif; ?>

                        <div class="dropdown-divider"></div>

                        <?= Html::beginForm(
                            ['/site/logout'],
                            'post',
                            ['class' => 'logout-form']
                        ) ?>
                            <button
                                type="submit"
                                class="dropdown-item logout-item"
                            >
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Cerrar sesión
                            </button>
                        <?= Html::endForm() ?>

                    <?php else: ?>

                        <a href="<?= Url::to(['/site/login']) ?>">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Iniciar sesión
                        </a>

                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</header>

<?php
$this->registerCss(<<<'CSS'
body {
    padding-top: 68px;
}
CSS);

$this->registerJs(<<<'JS'
document.addEventListener('DOMContentLoaded', function () {
    const contenedor = document.getElementById('userDropdownContainer');
    const botonUsuario = document.getElementById('userDropdown');
    const menuUsuario = document.getElementById('userDropdownMenu');

    const botonMovil = document.getElementById('navbarMobileToggle');
    const menuNavegacion = document.getElementById('navbarMenu');

    const botonBusqueda = document.getElementById('navbarSearchToggle');
    const formularioBusqueda = document.getElementById('navbarSearch');
    const campoBusqueda = document.getElementById('navbarSearchInput');

    const botonTema = document.getElementById('navbarThemeToggle');

    if (contenedor && botonUsuario && menuUsuario) {
        function abrirDropdown() {
            menuUsuario.hidden = false;
            menuUsuario.classList.add('show');
            botonUsuario.setAttribute('aria-expanded', 'true');
        }

        function cerrarDropdown() {
            menuUsuario.classList.remove('show');
            menuUsuario.hidden = true;
            botonUsuario.setAttribute('aria-expanded', 'false');
        }

        botonUsuario.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (menuUsuario.hidden) {
                abrirDropdown();
            } else {
                cerrarDropdown();
            }
        });

        menuUsuario.addEventListener('click', function (event) {
            event.stopPropagation();
        });

        document.addEventListener('click', function (event) {
            if (!contenedor.contains(event.target)) {
                cerrarDropdown();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                cerrarDropdown();
                botonUsuario.focus();
            }
        });

        window.addEventListener('resize', cerrarDropdown);
    }

    if (botonMovil && menuNavegacion) {
        botonMovil.addEventListener('click', function () {
            const abierto = menuNavegacion.classList.toggle('mobile-open');

            botonMovil.setAttribute('aria-expanded', String(abierto));
            botonMovil.setAttribute(
                'aria-label',
                abierto ? 'Cerrar menú de navegación' : 'Abrir menú de navegación'
            );

            const icono = botonMovil.querySelector('i');

            if (icono) {
                icono.className = abierto
                    ? 'fa-solid fa-xmark'
                    : 'fa-solid fa-bars';
            }
        });
    }

    if (botonBusqueda && formularioBusqueda) {
        botonBusqueda.addEventListener('click', function (event) {
            event.stopPropagation();

            const activa = formularioBusqueda.classList.toggle('active');
            botonBusqueda.setAttribute('aria-expanded', String(activa));

            if (activa && campoBusqueda) {
                campoBusqueda.focus();
            }
        });

        formularioBusqueda.addEventListener('click', function (event) {
            event.stopPropagation();
        });

        document.addEventListener('click', function (event) {
            if (
                !formularioBusqueda.contains(event.target) &&
                !botonBusqueda.contains(event.target)
            ) {
                formularioBusqueda.classList.remove('active');
                botonBusqueda.setAttribute('aria-expanded', 'false');
            }
        });
    }

    if (botonTema) {
        const temaGuardado = document.documentElement.getAttribute('data-theme');
        const oscuroInicial =
            temaGuardado === 'dark' ||
            document.body.classList.contains('dark-mode');

        document.body.classList.toggle('dark-mode', oscuroInicial);
        actualizarIconoTema(oscuroInicial);

        botonTema.addEventListener('click', function () {
            const oscuro = document.body.classList.toggle('dark-mode');

            document.documentElement.setAttribute(
                'data-theme',
                oscuro ? 'dark' : 'light'
            );

            actualizarIconoTema(oscuro);
        });

        function actualizarIconoTema(oscuro) {
            const icono = botonTema.querySelector('i');

            if (icono) {
                icono.className = oscuro
                    ? 'fa-solid fa-sun'
                    : 'fa-solid fa-moon';
            }

            botonTema.setAttribute(
                'aria-label',
                oscuro ? 'Activar tema claro' : 'Activar tema oscuro'
            );
        }
    }
});
JS, View::POS_END);
?>
