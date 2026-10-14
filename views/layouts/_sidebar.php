<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\helpers\Url;

$currentRoute = Yii::$app->controller->route;
$usuario = Yii::$app->user->identity;
$autenticado = !Yii::$app->user->isGuest;
$esAdmin = $autenticado && ($usuario->role ?? '') === 'admin';

$menuItems = [
    [
        'label' => 'Preguntas frecuentes',
        'icon' => 'fa-circle-question',
        'color' => 'icon-turquoise',
        'url' => ['/preguntas-frecuentes/index'],
    ],
    [
        'label' => 'Evaluación de conocimientos',
        'icon' => 'fa-pen-to-square',
        'color' => 'icon-blue',
        'url' => ['/cuestionario/realizar'],
    ],
];

if ($esAdmin) {
    $menuItems[] = [
        'label' => 'Resultados del cuestionario',
        'icon' => 'fa-chart-column',
        'color' => 'icon-purple',
        'url' => ['/cuestionario/resultados'],
    ];

    $menuItems[] = [
        'label' => 'Estadísticas del cuestionario',
        'icon' => 'fa-chart-pie',
        'color' => 'icon-orange',
        'url' => ['/cuestionario/estadisticas'],
    ];
}

$menuItems = array_merge($menuItems, [
    [
        'label' => 'Foro de discusión',
        'icon' => 'fa-comments',
        'color' => 'icon-cyan',
        'url' => ['/foro/index'],
    ],
    [
        'label' => 'Documentos',
        'icon' => 'fa-folder-open',
        'color' => 'icon-yellow',
        'url' => ['/documento/index'],
    ],
    [
        'label' => 'Infografías',
        'icon' => 'fa-images',
        'color' => 'icon-pink',
        'url' => ['/infografias/index'],
    ],
    [
        'label' => 'Ayuda y orientación',
        'icon' => 'fa-life-ring',
        'color' => 'icon-green',
        'url' => ['/preguntas-frecuentes/ayuda'],
    ],
]);

$this->registerCss(<<<'CSS'
:root {
    --sidebar-width: 270px;
    --sidebar-collapsed-width: 82px;
    --sidebar-top: 78px;

    --sidebar-bg: #ffffff;
    --sidebar-border: #e8eaf2;
    --sidebar-text: #596579;
    --sidebar-muted: #929db0;
    --sidebar-hover: #f5f6fb;
    --sidebar-active: #edf1fa;
    --sidebar-primary: #879bc5;
    --sidebar-shadow: 0 8px 28px rgba(80, 94, 130, .07);
}

/* ESTRUCTURA */

#sidebar,
#sidebar * {
    box-sizing: border-box;
}

#sidebar {
    position: fixed;
    top: var(--sidebar-top);
    left: 0;
    bottom: 0;
    z-index: 3000;

    display: flex;
    flex-direction: column;

    width: var(--sidebar-collapsed-width);
    max-width: var(--sidebar-collapsed-width);
    overflow-x: hidden;
    overflow-y: auto;

    background: var(--sidebar-bg);
    border-right: 1px solid var(--sidebar-border);
    box-shadow: var(--sidebar-shadow);

    transition: width .28s ease, max-width .28s ease;
}

#sidebar.sidebar-expanded {
    width: var(--sidebar-width);
    max-width: var(--sidebar-width);
}

/* CABECERA */

#sidebar .sidebar-header {
    display: flex;
    flex: 0 0 66px;
    align-items: center;
    justify-content: center;
    gap: 0;

    width: 100%;
    min-height: 66px;
    height: 66px;
    padding: 12px 8px;

    overflow: hidden;
    white-space: nowrap;

    background: #ffffff;
    border-bottom: 1px solid #f0f1f6;
}

#sidebar .sidebar-toggle {
    display: inline-flex;
    flex: 0 0 40px;
    align-items: center;
    justify-content: center;

    width: 40px;
    min-width: 40px;
    height: 40px;
    padding: 0;

    color: #7187b4;
    background: #edf1fa;
    border: 1px solid #e0e6f4;
    border-radius: 13px;

    cursor: pointer;
    transition: background .2s ease, transform .2s ease;
}

#sidebar .sidebar-toggle:hover {
    color: #596fa0;
    background: #dce8fa;
    transform: translateY(-1px);
}

#sidebar .sidebar-toggle i {
    font-size: 17px;
}

#sidebar .sidebar-title {
    display: none;
    min-width: 0;
    overflow: hidden;

    color: #71809b;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.1px;

    opacity: 0;
    visibility: hidden;
}

#sidebar.sidebar-expanded .sidebar-header {
    justify-content: flex-start;
    gap: 14px;
    padding: 12px 20px;
}

#sidebar.sidebar-expanded .sidebar-title {
    display: block;
    opacity: 1;
    visibility: visible;
}

/* LISTA DE MENÚ */

#sidebar .sidebar-menu {
    display: flex;
    flex: 1 1 auto;
    flex-direction: column;
    align-items: center;
    gap: 8px;

    width: 100%;
    min-height: 0;
    padding: 18px 8px;

    overflow-x: hidden;
    overflow-y: auto;
}

#sidebar .sidebar-menu::-webkit-scrollbar {
    width: 5px;
}

#sidebar .sidebar-menu::-webkit-scrollbar-thumb {
    background: #dfe4f0;
    border-radius: 10px;
}

/* ENLACES RECOGIDOS */

#sidebar .sidebar-link {
    position: relative;

    display: flex;
    flex: 0 0 48px;
    align-items: center;
    justify-content: center;
    gap: 0;

    width: 48px;
    min-width: 48px;
    max-width: 48px;
    height: 48px;
    min-height: 48px;

    margin: 0;
    padding: 5px;

    overflow: hidden;
    white-space: nowrap;

    color: var(--sidebar-text);
    text-decoration: none !important;

    background: transparent;
    border: 1px solid transparent;
    border-radius: 13px;

    transition: background .2s ease, border-color .2s ease;
}

#sidebar .sidebar-link > i {
    display: inline-flex;
    flex: 0 0 36px;
    align-items: center;
    justify-content: center;

    width: 36px;
    min-width: 36px;
    height: 36px;
    margin: 0;

    font-size: 17px;
    border-radius: 11px;

    transition: transform .2s ease;
}

#sidebar .sidebar-link:hover {
    color: #475675;
    background: var(--sidebar-hover);
    border-color: #edf0f7;
}

#sidebar .sidebar-link:hover > i {
    transform: scale(1.06);
}

#sidebar .sidebar-link.active {
    color: #526991;
    font-weight: 700;
    background: var(--sidebar-active);
    border-color: #dfe6f6;
}

#sidebar .sidebar-link.active::before {
    position: absolute;
    top: 10px;
    bottom: 10px;
    left: -1px;

    width: 4px;
    content: "";

    background: var(--sidebar-primary);
    border-radius: 0 5px 5px 0;
}

/* ETIQUETAS OCULTAS AL RECOGER */

#sidebar .sidebar-label {
    display: none !important;
    flex: 1 1 auto;
    min-width: 0;

    color: inherit;
    font-size: 13px;
    line-height: 1.45;

    white-space: normal;
    overflow-wrap: break-word;

    opacity: 0;
    visibility: hidden;
}

/* ENLACES DESPLEGADOS */

#sidebar.sidebar-expanded .sidebar-menu {
    align-items: stretch;
    gap: 7px;
    padding: 20px 12px;
}

#sidebar.sidebar-expanded .sidebar-link {
    flex: 0 0 auto;
    justify-content: flex-start;
    gap: 13px;

    width: 100%;
    min-width: 0;
    max-width: 100%;
    height: auto;
    min-height: 48px;

    padding: 7px 10px;
    white-space: normal;
}

#sidebar.sidebar-expanded .sidebar-link > i {
    flex: 0 0 36px;
    width: 36px;
    min-width: 36px;
    height: 36px;
}

#sidebar.sidebar-expanded .sidebar-label {
    display: block !important;
    opacity: 1;
    visibility: visible;
}

/* COLORES PASTEL */

#sidebar .icon-turquoise {
    color: #55a9a5;
    background: #dff2ef;
}

#sidebar .icon-blue {
    color: #6d8ec5;
    background: #dce8fa;
}

#sidebar .icon-purple {
    color: #9980c7;
    background: #e9e1f7;
}

#sidebar .icon-orange {
    color: #c99160;
    background: #fbeddc;
}

#sidebar .icon-cyan {
    color: #60a7c2;
    background: #dff2f5;
}

#sidebar .icon-yellow {
    color: #b99a4d;
    background: #fbf0d6;
}

#sidebar .icon-pink {
    color: #cb85a0;
    background: #f9e2ea;
}

#sidebar .icon-green {
    color: #6da784;
    background: #e1f1e7;
}

/* PIE DEL SIDEBAR */

#sidebar .sidebar-footer {
    display: flex;
    flex: 0 0 auto;
    align-items: center;
    justify-content: center;

    width: 100%;
    min-width: 0;
    padding: 12px 5px;

    overflow: hidden;
    background: #ffffff;
    border-top: 1px solid #f0f1f6;
}

#sidebar .sidebar-footer-text {
    display: none;

    color: var(--sidebar-muted);
    font-size: 11px;
    line-height: 1.5;
    overflow-wrap: break-word;

    opacity: 0;
    visibility: hidden;
}

#sidebar.sidebar-expanded .sidebar-footer {
    display: block;
    padding: 17px 18px;
}

#sidebar.sidebar-expanded .sidebar-footer-text {
    display: block;
    opacity: 1;
    visibility: visible;
}

/* MÓVILES Y TABLETAS */

@media (max-width: 768px) {
    #sidebar {
        top: var(--sidebar-top);
        bottom: 0;
        width: min(var(--sidebar-width), 85vw);
        max-width: 85vw;

        transform: translateX(-100%);
        transition: transform .28s ease, box-shadow .28s ease;
    }

    #sidebar.sidebar-expanded {
        width: min(var(--sidebar-width), 85vw);
        max-width: 85vw;

        transform: translateX(0);
        box-shadow: 8px 0 30px rgba(80, 94, 120, .15);
    }

    #sidebar.sidebar-collapsed {
        transform: translateX(-100%);
    }

    #sidebar.sidebar-collapsed .sidebar-header {
        justify-content: flex-start;
        gap: 14px;
        padding: 12px 20px;
    }

    #sidebar.sidebar-collapsed .sidebar-title {
        display: block;
        opacity: 1;
        visibility: visible;
    }

    #sidebar.sidebar-collapsed .sidebar-menu {
        align-items: stretch;
        gap: 7px;
        padding: 20px 12px;
    }

    #sidebar.sidebar-collapsed .sidebar-link {
        flex: 0 0 auto;
        justify-content: flex-start;
        gap: 13px;

        width: 100%;
        min-width: 0;
        max-width: 100%;
        height: auto;
        min-height: 48px;

        padding: 7px 10px;
    }

    #sidebar.sidebar-collapsed .sidebar-label {
        display: block !important;
        opacity: 1;
        visibility: visible;
    }

    #sidebar.sidebar-collapsed .sidebar-footer {
        display: block;
        padding: 17px 18px;
    }

    #sidebar.sidebar-collapsed .sidebar-footer-text {
        display: block;
        opacity: 1;
        visibility: visible;
    }
}

@media (prefers-reduced-motion: reduce) {
    #sidebar,
    #sidebar * {
        transition: none !important;
    }
}
CSS);

?>

<aside class="sidebar sidebar-collapsed" id="sidebar">
    <div class="sidebar-header">
        <button
            type="button"
            class="sidebar-toggle"
            id="sidebarToggle"
            aria-label="Abrir menú"
            aria-expanded="false"
            aria-controls="sidebarMenu"
            title="Abrir menú"
        >
            <i class="fa-solid fa-bars"></i>
        </button>

        <span class="sidebar-title">MENÚ PRINCIPAL</span>
    </div>

    <nav
        class="sidebar-menu"
        id="sidebarMenu"
        aria-label="Menú principal"
    >
        <?php foreach ($menuItems as $item): ?>
            <?php
            $url = Url::to($item['url']);
            $route = ltrim($item['url'][0], '/');

            $active = $currentRoute === $route
                || str_starts_with($currentRoute, $route . '/');
            ?>

            <?= Html::a(
                '<i class="fa-solid '
                . Html::encode($item['icon']) . ' '
                . Html::encode($item['color']) . '"></i>'
                . '<span class="sidebar-label">'
                . Html::encode($item['label'])
                . '</span>',
                $url,
                [
                    'class' => 'sidebar-link' . ($active ? ' active' : ''),
                    'title' => $item['label'],
                    'encode' => false,
                    'aria-current' => $active ? 'page' : null,
                ]
            ) ?>
        <?php endforeach; ?>
    </nav>

    <div class="sidebar-footer">
        <span class="sidebar-footer-text">
            Ética en la investigación científica
        </span>
    </div>
</aside>

<?php

$this->registerJs(<<<'JS'
(function () {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');

    if (!sidebar || !toggle || sidebar.dataset.initialized === 'true') {
        return;
    }

    sidebar.dataset.initialized = 'true';

    function establecerEstado(abierto) {
        sidebar.classList.toggle('sidebar-expanded', abierto);
        sidebar.classList.toggle('sidebar-collapsed', !abierto);

        document.body.classList.toggle('sidebar-is-expanded', abierto);
        document.body.classList.toggle('sidebar-is-collapsed', !abierto);

        toggle.setAttribute('aria-expanded', String(abierto));
        toggle.setAttribute(
            'aria-label',
            abierto ? 'Cerrar menú' : 'Abrir menú'
        );
        toggle.setAttribute(
            'title',
            abierto ? 'Cerrar menú' : 'Abrir menú'
        );

        const icono = toggle.querySelector('i');

        if (icono) {
            icono.className = abierto
                ? 'fa-solid fa-xmark'
                : 'fa-solid fa-bars';
        }
    }

    toggle.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();

        establecerEstado(
            !sidebar.classList.contains('sidebar-expanded')
        );
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            establecerEstado(false);
        }
    });

    document.addEventListener('click', function (event) {
        if (
            window.innerWidth <= 768 &&
            sidebar.classList.contains('sidebar-expanded') &&
            !sidebar.contains(event.target)
        ) {
            establecerEstado(false);
        }
    });

    establecerEstado(false);
})();
JS);

?>
