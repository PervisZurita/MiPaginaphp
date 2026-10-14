<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\widgets\LinkPager;

$this->title = 'Gestión de Usuarios';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.user-index {
    --users-primary: #879bc5;
    --users-primary-dark: #687fae;
    --users-primary-light: #dce8fa;
    --users-blue-soft: #edf1fa;
    --users-purple-soft: #e9e1f7;
    --users-green-soft: #e1f1e7;
    --users-mint-soft: #dff2ef;
    --users-pink-soft: #f9e2ea;
    --users-yellow-soft: #fbf0d6;
    --users-bg: #f8f9fd;
    --users-white: #ffffff;
    --users-border: #e8eaf2;
    --users-title: #465675;
    --users-text: #596579;
    --users-muted: #929db0;

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 28px 24px 45px;
    color: var(--users-text);
    box-sizing: border-box;
}

.user-index *,
.user-index *::before,
.user-index *::after {
    box-sizing: border-box;
}

/* Encabezado */

.users-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 22px;
    margin-bottom: 26px;
    padding: 28px 30px;
    background: linear-gradient(125deg, #edf1fa 0%, #e3eaf8 55%, #e9e1f7 100%);
    border: 1px solid #e0e6f3;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(83, 101, 143, .07);
}

.users-header-content {
    display: flex;
    align-items: center;
    gap: 18px;
    min-width: 0;
}

.users-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    min-width: 64px;
    border-radius: 19px;
    background: rgba(255, 255, 255, .82);
    color: var(--users-primary-dark);
    font-size: 27px;
    box-shadow: 0 4px 12px rgba(83, 101, 143, .08);
}

.users-header h1 {
    margin: 0 0 8px;
    color: var(--users-title);
    font-size: clamp(22px, 2.3vw, 29px);
    font-weight: 750;
    line-height: 1.3;
}

.users-header p {
    max-width: 650px;
    margin: 0;
    color: #737f96;
    font-size: 14px;
    line-height: 1.8;
}

.btn-create-user {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;
    padding: 13px 19px;
    border: 1px solid #d2dcef;
    border-radius: 12px;
    background: #fff;
    color: var(--users-primary-dark);
    font-size: 13px;
    font-weight: 700;
    text-decoration: none !important;
    white-space: nowrap;
    box-shadow: 0 4px 12px rgba(83, 101, 143, .07);
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}

.btn-create-user:hover {
    color: #526b9c;
    background: #f8faff;
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(83, 101, 143, .12);
}

.btn-create-user:focus {
    color: var(--users-primary-dark);
    outline: 3px solid rgba(135, 155, 197, .2);
    outline-offset: 2px;
}

/* Tarjeta de usuarios */

.users-card {
    overflow: hidden;
    width: 100%;
    background: var(--users-white);
    border: 1px solid var(--users-border);
    border-radius: 20px;
    box-shadow: 0 7px 25px rgba(83, 101, 143, .055);
}

.users-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 25px;
    background: #fcfcff;
    border-bottom: 1px solid var(--users-border);
}

.users-card-title {
    display: flex;
    align-items: center;
    gap: 11px;
    margin: 0;
    color: var(--users-title);
    font-size: 17px;
    font-weight: 750;
}

.users-card-title i {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 11px;
    background: var(--users-blue-soft);
    color: var(--users-primary-dark);
    font-size: 15px;
}

/* Tabla */

.users-table-wrapper {
    width: 100%;
    overflow-x: auto;
    scrollbar-width: thin;
    scrollbar-color: #d5ddec #f8f9fd;
}

.users-table-wrapper .grid-view {
    width: 100%;
    min-width: 760px;
}

.users-table {
    width: 100%;
    margin: 0 !important;
    border-collapse: separate !important;
    border-spacing: 0;
    background: #fff;
}

.users-table thead th {
    padding: 16px 18px;
    background: #f7f8fd;
    color: #7b879e;
    font-size: 11px;
    font-weight: 750;
    text-transform: uppercase;
    letter-spacing: .65px;
    white-space: nowrap;
    border: none;
    border-bottom: 1px solid var(--users-border);
}

.users-table thead th a {
    color: #68758f;
    text-decoration: none;
}

.users-table thead th a:hover {
    color: var(--users-primary-dark);
}

.users-table tbody td {
    padding: 16px 18px;
    vertical-align: middle;
    color: var(--users-text);
    font-size: 13px;
    line-height: 1.7;
    border: none;
    border-bottom: 1px solid #f0f1f7;
}

.users-table tbody tr {
    transition: background .18s ease;
}

.users-table tbody tr:hover {
    background: #fafbff;
}

.users-table tbody tr:last-child td {
    border-bottom: none;
}

.users-table tbody td a:not(.btn) {
    color: var(--users-primary-dark);
}

/* Usuario y avatar */

.username-cell {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 150px;
}

.user-avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    min-width: 42px;
    border: 1px solid #dce5f6;
    border-radius: 14px;
    background: linear-gradient(145deg, #edf1fa, #dce8fa);
    color: #637cae;
    font-size: 16px;
    font-weight: 800;
    text-transform: uppercase;
}

.username-text {
    color: var(--users-title);
    font-size: 13px;
    font-weight: 750;
    overflow-wrap: anywhere;
}

.user-email {
    color: #7385ad !important;
    overflow-wrap: anywhere;
    text-decoration: none;
}

.user-email:hover {
    color: #536b9c !important;
    text-decoration: underline;
}

/* Roles */

.role-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 7px 12px;
    border: 1px solid transparent;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 750;
    white-space: nowrap;
}

.role-admin {
    background: var(--users-pink-soft);
    border-color: #f2d2df;
    color: #a85e78;
}

.role-user {
    background: var(--users-green-soft);
    border-color: #d1e8d9;
    color: #528568;
}

.role-default {
    background: #eef0f6;
    border-color: #e2e5ee;
    color: #727e94;
}

/* Acciones */

.user-actions {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 7px;
    white-space: nowrap;
}

.user-actions .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    min-width: 35px;
    padding: 0;
    border: 1px solid transparent;
    border-radius: 11px;
    font-size: 13px;
    text-decoration: none;
    box-shadow: none;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}

.user-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(83, 101, 143, .12);
}

.user-actions .btn:focus {
    outline: 2px solid rgba(135, 155, 197, .3);
    outline-offset: 2px;
}

.btn-view {
    background: var(--users-blue-soft);
    border-color: #dce5f6 !important;
    color: #6b83b4;
}

.btn-view:hover {
    background: #dce8fa;
    color: #506a9f;
}

.btn-update {
    background: var(--users-yellow-soft);
    border-color: #f1e5c7 !important;
    color: #b18a43;
}

.btn-update:hover {
    background: #f5e7c4;
    color: #987333;
}

.btn-delete {
    background: var(--users-pink-soft);
    border-color: #f1d7e0 !important;
    color: #bd7189;
}

.btn-delete:hover {
    background: #f5d4e0;
    color: #a95772;
}

.btn-password {
    background: var(--users-purple-soft);
    border-color: #e0d7f2 !important;
    color: #8a75b7;
}

.btn-password:hover {
    background: #ded3f3;
    color: #7059a0;
}

/* Resumen */

.user-index .grid-view .summary {
    padding: 17px 24px 20px;
    color: var(--users-muted);
    font-size: 12px;
    line-height: 1.6;
}

/* Paginación */

.users-pagination {
    display: flex;
    justify-content: flex-end;
    padding: 19px 24px;
    border-top: 1px solid #f0f1f7;
    background: #fff;
}

.users-pagination .pagination {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin: 0;
    padding: 0;
}

.users-pagination .pagination li {
    list-style: none;
}

.users-pagination .pagination li a,
.users-pagination .pagination li span {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 36px;
    height: 36px;
    padding: 0 10px;
    border: 1px solid #e8eaf2 !important;
    border-radius: 10px !important;
    background: #fff;
    color: #75819a;
    font-size: 12px;
    text-decoration: none;
    transition: all .2s ease;
}

.users-pagination .pagination li.active span,
.users-pagination .pagination li.active a {
    background: #dce8fa;
    border-color: #d2dff5 !important;
    color: #5c74a5;
    font-weight: 800;
}

.users-pagination .pagination li a:hover {
    background: #edf1fa;
    border-color: #dce5f6 !important;
    color: #5c74a5;
}

.users-pagination .pagination li.disabled span {
    opacity: .45;
    cursor: not-allowed;
}

/* Estado vacío */

.users-table .empty {
    padding: 40px 20px;
    background: #fff;
    color: #8b96aa;
    font-size: 13px;
    text-align: center;
}

/* Ajustes responsivos */

@media (max-width: 900px) {
    .user-index {
        padding: 22px 16px 35px;
    }

    .users-header {
        padding: 24px;
    }

    .users-header p {
        max-width: 460px;
    }
}

@media (max-width: 768px) {
    .user-index {
        padding: 18px 10px 30px;
    }

    .users-header {
        flex-direction: column;
        align-items: stretch;
        gap: 20px;
        padding: 22px;
        border-radius: 18px;
    }

    .users-header-content {
        align-items: flex-start;
        gap: 14px;
    }

    .users-header-icon {
        width: 51px;
        height: 51px;
        min-width: 51px;
        border-radius: 15px;
        font-size: 21px;
    }

    .users-header h1 {
        font-size: 23px;
    }

    .users-header p {
        font-size: 13px;
    }

    .btn-create-user {
        width: 100%;
    }

    .users-card {
        border-radius: 16px;
    }

    .users-card-header {
        padding: 17px;
    }

    .users-table thead th,
    .users-table tbody td {
        padding: 13px 12px;
    }

    .users-pagination {
        justify-content: center;
        padding: 17px 10px;
    }

    .user-index .grid-view .summary {
        padding: 15px 16px;
    }
}

@media (max-width: 480px) {
    .user-index {
        padding: 14px 6px 24px;
    }

    .users-header {
        padding: 18px;
    }

    .users-header-content {
        gap: 11px;
    }

    .users-header-icon {
        width: 44px;
        height: 44px;
        min-width: 44px;
        font-size: 18px;
    }

    .users-header h1 {
        font-size: 20px;
    }

    .users-header p {
        font-size: 12px;
    }

    .users-card-title {
        font-size: 15px;
    }

    .users-card-title i {
        width: 32px;
        height: 32px;
    }
}
CSS);
?>

<div class="user-index">

    <div class="users-header">
        <div class="users-header-content">
            <div class="users-header-icon">
                <i class="fa-solid fa-users"></i>
            </div>

            <div>
                <h1><?= Html::encode($this->title) ?></h1>
                <p>
                    Administra las cuentas, los correos electrónicos
                    y los permisos de los usuarios del sistema.
                </p>
            </div>
        </div>

        <?= Html::a(
            '<i class="fa-solid fa-user-plus"></i> Crear usuario',
            ['create'],
            ['class' => 'btn-create-user']
        ) ?>
    </div>

    <div class="users-card">

        <div class="users-card-header">
            <h2 class="users-card-title">
                <i class="fa-solid fa-list"></i>
                Usuarios registrados
            </h2>
        </div>

        <div class="users-table-wrapper">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,

                'tableOptions' => [
                    'class' => 'table users-table',
                ],

                'options' => [
                    'class' => 'grid-view',
                ],

                'layout' =>
                    "{items}\n" .
                    "<div class=\"users-pagination\">{pager}</div>\n" .
                    "{summary}",

                'summary' =>
                    '<div class="text-muted small">' .
                    'Mostrando {begin}–{end} de {totalCount} usuarios' .
                    '</div>',

                'emptyText' => 'Todavía no hay usuarios registrados.',

                'pager' => [
                    'class' => LinkPager::class,
                    'options' => [
                        'class' => 'pagination',
                    ],
                    'linkContainerOptions' => [
                        'class' => 'page-item',
                    ],
                    'linkOptions' => [
                        'class' => 'page-link',
                    ],
                    'disabledListItemSubTagOptions' => [
                        'class' => 'page-link',
                    ],
                    'prevPageLabel' => '‹',
                    'nextPageLabel' => '›',
                    'firstPageLabel' => '«',
                    'lastPageLabel' => '»',
                    'maxButtonCount' => 5,
                ],

                'columns' => [

                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => '#',
                        'contentOptions' => [
                            'style' => 'width: 60px;',
                        ],
                    ],

                    [
                        'attribute' => 'username',
                        'header' => 'Usuario',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $username = (string) $model->username;

                            $initial = $username !== ''
                                ? mb_strtoupper(mb_substr($username, 0, 1))
                                : '?';

                            return '<div class="username-cell">' .
                                '<div class="user-avatar">' .
                                Html::encode($initial) .
                                '</div>' .
                                '<span class="username-text">' .
                                Html::encode($username) .
                                '</span>' .
                                '</div>';
                        },
                    ],

                    [
                        'attribute' => 'nombre',
                        'header' => 'Nombre completo',
                        'value' => function ($model) {
                            return trim(
                                (string) $model->nombre . ' ' .
                                (string) $model->apellido
                            );
                        },
                    ],

                    [
                        'attribute' => 'correo',
                        'header' => 'Correo electrónico',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if (empty($model->correo)) {
                                return '<span style="color:#929db0;">No registrado</span>';
                            }

                            return Html::mailto(
                                $model->correo,
                                $model->correo,
                                ['class' => 'user-email']
                            );
                        },
                    ],

                    [
                        'attribute' => 'role',
                        'header' => 'Rol',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $role = strtolower(trim((string) $model->role));

                            if ($role === 'admin') {
                                $class = 'role-admin';
                                $icon = 'fa-shield-halved';
                                $label = 'Administrador';
                            } elseif ($role === 'user') {
                                $class = 'role-user';
                                $icon = 'fa-user';
                                $label = 'Usuario';
                            } else {
                                $class = 'role-default';
                                $icon = 'fa-user-tag';
                                $label = $role !== ''
                                    ? ucfirst($role)
                                    : 'Sin rol';
                            }

                            return '<span class="role-badge ' . $class . '">' .
                                '<i class="fa-solid ' . $icon . '"></i> ' .
                                Html::encode($label) .
                                '</span>';
                        },
                    ],

                    [
                        'class' => ActionColumn::class,
                        'header' => 'Acciones',
                        'template' => '<div class="user-actions">{view} {update} {delete} {reset}</div>',

                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'reset') {
                                return [
                                    'reset-password',
                                    'id' => $model->id,
                                ];
                            }

                            return [
                                $action,
                                'id' => $model->id,
                            ];
                        },

                        'buttons' => [

                            'view' => function ($url) {
                                return Html::a(
                                    '<i class="fa-solid fa-eye"></i>',
                                    $url,
                                    [
                                        'class' => 'btn btn-view',
                                        'title' => 'Ver usuario',
                                        'aria-label' => 'Ver usuario',
                                    ]
                                );
                            },

                            'update' => function ($url) {
                                return Html::a(
                                    '<i class="fa-solid fa-pen"></i>',
                                    $url,
                                    [
                                        'class' => 'btn btn-update',
                                        'title' => 'Editar usuario',
                                        'aria-label' => 'Editar usuario',
                                    ]
                                );
                            },

                            'delete' => function ($url) {
                                return Html::a(
                                    '<i class="fa-solid fa-trash"></i>',
                                    $url,
                                    [
                                        'class' => 'btn btn-delete',
                                        'title' => 'Eliminar usuario',
                                        'aria-label' => 'Eliminar usuario',
                                        'data' => [
                                            'confirm' => '¿Está seguro de eliminar este usuario?',
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                            },

                            'reset' => function ($url) {
                                return Html::a(
                                    '<i class="fa-solid fa-key"></i>',
                                    $url,
                                    [
                                        'class' => 'btn btn-password',
                                        'title' => 'Restablecer contraseña',
                                        'aria-label' => 'Restablecer contraseña',
                                        'data' => [
                                            'confirm' => '¿Desea restablecer la contraseña de este usuario?',
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                            },
                        ],
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
