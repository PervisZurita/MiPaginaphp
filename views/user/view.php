<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\User $model */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalle del usuario';

$esAdmin = !Yii::$app->user->isGuest
    && Yii::$app->user->identity->role === 'admin';

$esPropietario = !Yii::$app->user->isGuest
    && (int) Yii::$app->user->id === (int) $model->id;

$urlVolver = $esAdmin
    ? ['/user/index']
    : ['/site/index'];

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.user-view {
    --view-primary: #879bc5;
    --view-primary-dark: #687fae;
    --view-blue-soft: #edf1fa;
    --view-blue-light: #dce8fa;
    --view-purple-soft: #e9e1f7;
    --view-green-soft: #e1f1e7;
    --view-pink-soft: #f9e2ea;
    --view-yellow-soft: #fbf0d6;
    --view-border: #e8eaf2;
    --view-title: #465675;
    --view-text: #596579;
    --view-muted: #929db0;

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 28px 24px 45px;
    color: var(--view-text);
    box-sizing: border-box;
}

.user-view *,
.user-view *::before,
.user-view *::after {
    box-sizing: border-box;
}

/* Encabezado */

.user-view-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 22px;
    margin-bottom: 26px;
    padding: 28px 30px;
    background: linear-gradient(
        125deg,
        #edf1fa 0%,
        #e3eaf8 55%,
        #e9e1f7 100%
    );
    border: 1px solid #e0e6f3;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(83, 101, 143, .07);
}

.user-view-header-content {
    display: flex;
    align-items: center;
    gap: 18px;
    min-width: 0;
}

.user-view-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    min-width: 64px;
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 19px;
    background: rgba(255, 255, 255, .82);
    color: var(--view-primary-dark);
    font-size: 27px;
    box-shadow: 0 4px 12px rgba(83, 101, 143, .07);
}

.user-view-header h1 {
    margin: 0 0 8px;
    color: var(--view-title);
    font-size: clamp(22px, 2.3vw, 29px);
    font-weight: 750;
    line-height: 1.35;
    overflow-wrap: anywhere;
}

.user-view-header p {
    margin: 0;
    color: #737f96;
    font-size: 14px;
    line-height: 1.7;
}

.user-view-header-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-user-back,
.btn-user-edit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 44px;
    padding: 11px 17px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 750;
    text-decoration: none !important;
    white-space: nowrap;
    transition: all .2s ease;
}

.btn-user-back {
    color: #6d7c99 !important;
    background: rgba(255, 255, 255, .82);
    border: 1px solid #dbe2f0;
}

.btn-user-back:hover {
    background: #fff;
    color: #536b9c !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 12px rgba(83, 101, 143, .09);
}

.btn-user-edit {
    color: #fff !important;
    background: linear-gradient(135deg, #879bc5, #758bb9);
    border: 1px solid #8196c0;
    box-shadow: 0 4px 12px rgba(104, 127, 174, .13);
}

.btn-user-edit:hover {
    color: #fff !important;
    background: linear-gradient(135deg, #758bb9, #687fae);
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(104, 127, 174, .2);
}

/* Tarjeta principal */

.user-view-card {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--view-border);
    border-radius: 20px;
    box-shadow: 0 7px 25px rgba(83, 101, 143, .055);
}

.user-view-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 22px 30px;
    background: #fcfcff;
    border-bottom: 1px solid var(--view-border);
}

.user-view-card-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    min-width: 42px;
    border: 1px solid #dfe6f5;
    border-radius: 13px;
    background: var(--view-blue-soft);
    color: var(--view-primary-dark);
    font-size: 17px;
}

.user-view-card-header h2 {
    margin: 0 0 5px;
    color: var(--view-title);
    font-size: 17px;
    font-weight: 750;
}

.user-view-card-header p {
    margin: 0;
    color: var(--view-muted);
    font-size: 12px;
    line-height: 1.6;
}

.user-view-body {
    padding: 32px;
}

/* Tabla de información */

.user-detail-table {
    width: 100%;
    margin: 0 !important;
    border: 1px solid var(--view-border);
    border-radius: 14px;
    border-collapse: separate !important;
    border-spacing: 0;
    overflow: hidden;
    background: #fff;
}

.user-detail-table th,
.user-detail-table td {
    padding: 19px 22px !important;
    vertical-align: middle !important;
    border: none !important;
    border-bottom: 1px solid #eef0f6 !important;
    font-size: 13px;
    line-height: 1.7;
}

.user-detail-table th {
    width: 32%;
    background: #f8f9fd;
    color: #65738e;
    font-weight: 750;
}

.user-detail-table td {
    background: #fff;
    color: var(--view-text);
    overflow-wrap: anywhere;
    word-break: break-word;
}

.user-detail-table tr:last-child th,
.user-detail-table tr:last-child td {
    border-bottom: none !important;
}

.user-detail-table tr:hover td {
    background: #fcfcff;
}

.user-detail-table th i {
    display: inline-block;
    width: 22px;
    margin-right: 8px;
    color: var(--view-primary-dark);
    text-align: center;
}

.user-detail-table a {
    color: #7288b5;
    text-decoration: none;
    overflow-wrap: anywhere;
}

.user-detail-table a:hover {
    color: #536b9c;
    text-decoration: underline;
}

/* Identificador */

.user-id-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 43px;
    padding: 6px 12px;
    border: 1px solid #dce5f6;
    border-radius: 9px;
    background: var(--view-blue-soft);
    color: #6279a9;
    font-size: 12px;
    font-weight: 800;
}

/* Insignias de rol */

.user-role-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 8px 13px;
    border: 1px solid transparent;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 750;
    white-space: nowrap;
}

.user-role-admin {
    color: #8b6bac;
    background: var(--view-purple-soft);
    border-color: #ded4f0;
}

.user-role-normal {
    color: #58876b;
    background: var(--view-green-soft);
    border-color: #d1e8d9;
}

/* Acciones inferiores */

.user-view-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 27px;
    padding-top: 24px;
    border-top: 1px solid #edf0f6;
}

.btn-user-delete {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-width: 165px;
    min-height: 45px;
    padding: 0 20px;
    border: 1px solid #f0d4df;
    border-radius: 12px;
    background: var(--view-pink-soft);
    color: #b56d85;
    font-size: 13px;
    font-weight: 750;
    text-decoration: none !important;
    cursor: pointer;
    transition: all .2s ease;
}

.btn-user-delete:hover {
    background: #f3d2df;
    border-color: #e9bdcd;
    color: #a35470;
    transform: translateY(-2px);
    box-shadow: 0 5px 13px rgba(181, 109, 133, .12);
}

.btn-user-back:focus,
.btn-user-edit:focus,
.btn-user-delete:focus {
    outline: 3px solid rgba(135, 155, 197, .22);
    outline-offset: 3px;
}

/* Responsive */

@media (max-width: 900px) {
    .user-view {
        padding: 22px 16px 35px;
    }

    .user-view-body {
        padding: 25px;
    }
}

@media (max-width: 768px) {
    .user-view {
        padding: 18px 10px 30px;
    }

    .user-view-header {
        flex-direction: column;
        align-items: stretch;
        gap: 20px;
        padding: 22px;
        border-radius: 18px;
    }

    .user-view-header-content {
        align-items: flex-start;
        gap: 14px;
    }

    .user-view-header-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 15px;
        font-size: 22px;
    }

    .user-view-header h1 {
        font-size: 23px;
    }

    .user-view-header p {
        font-size: 13px;
    }

    .user-view-header-actions {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        width: 100%;
    }

    .btn-user-back,
    .btn-user-edit {
        width: 100%;
        padding: 11px 10px;
    }

    .user-view-card {
        border-radius: 16px;
    }

    .user-view-card-header {
        padding: 19px 22px;
    }

    .user-view-body {
        padding: 20px;
    }

    .user-detail-table th,
    .user-detail-table td {
        padding: 16px 13px !important;
        font-size: 12px;
    }

    .user-detail-table th {
        width: 40%;
    }

    .user-view-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .btn-user-delete {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .user-view {
        padding: 14px 6px 24px;
    }

    .user-view-header {
        padding: 18px;
    }

    .user-view-header-content {
        gap: 11px;
    }

    .user-view-header-icon {
        width: 45px;
        height: 45px;
        min-width: 45px;
        font-size: 19px;
    }

    .user-view-header h1 {
        font-size: 20px;
    }

    .user-view-header p {
        font-size: 12px;
    }

    .user-view-header-actions {
        grid-template-columns: 1fr;
    }

    .btn-user-back,
    .btn-user-edit {
        width: 100%;
    }

    .user-view-card-header {
        padding: 17px;
    }

    .user-view-card-header h2 {
        font-size: 15px;
    }

    .user-view-body {
        padding: 13px;
    }

    .user-detail-table th,
    .user-detail-table td {
        padding: 13px 9px !important;
        font-size: 11px;
    }

    .user-detail-table th {
        width: 43%;
    }

    .user-detail-table th i {
        width: 16px;
        margin-right: 3px;
    }

    .user-role-badge {
        gap: 5px;
        padding: 6px 8px;
        font-size: 10px;
    }
}
CSS);
?>

<div class="user-view">

    <div class="user-view-header">

        <div class="user-view-header-content">

            <div class="user-view-header-icon">
                <i class="fa-solid fa-user"></i>
            </div>

            <div>
                <h1><?= Html::encode((string) $model->username) ?></h1>
                <p>Información detallada de la cuenta de usuario.</p>
            </div>

        </div>

        <div class="user-view-header-actions">

            <?= Html::a(
                '<i class="fa-solid fa-arrow-left"></i> Volver',
                $urlVolver,
                [
                    'class' => 'btn-user-back',
                    'encode' => false,
                ]
            ) ?>

            <?php if ($esAdmin || $esPropietario): ?>

                <?= Html::a(
                    '<i class="fa-solid fa-pen-to-square"></i> Editar usuario',
                    ['update', 'id' => $model->id],
                    [
                        'class' => 'btn-user-edit',
                        'encode' => false,
                    ]
                ) ?>

            <?php endif; ?>

        </div>

    </div>

    <div class="user-view-card">

        <div class="user-view-card-header">

            <div class="user-view-card-header-icon">
                <i class="fa-solid fa-address-card"></i>
            </div>

            <div>
                <h2>Información del usuario</h2>
                <p>Datos registrados en el sistema.</p>
            </div>

        </div>

        <div class="user-view-body">

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'class' => 'table user-detail-table',
                ],
                'attributes' => [
                    [
                        'attribute' => 'id',
                        'label' => '<i class="fa-solid fa-hashtag"></i> Identificador',
                        'format' => 'raw',
                        'value' => static function ($model) {
                            return '<span class="user-id-badge">'
                                . Html::encode((string) $model->id)
                                . '</span>';
                        },
                    ],
                    [
                        'attribute' => 'username',
                        'label' => '<i class="fa-solid fa-user"></i> Nombre de usuario',
                        'value' => static function ($model) {
                            return $model->username ?: 'No registrado';
                        },
                    ],
                    [
                        'attribute' => 'nombre',
                        'label' => '<i class="fa-solid fa-id-card"></i> Nombres',
                        'value' => static function ($model) {
                            return $model->nombre ?: 'No registrado';
                        },
                    ],
                    [
                        'attribute' => 'apellido',
                        'label' => '<i class="fa-solid fa-address-card"></i> Apellidos',
                        'value' => static function ($model) {
                            return $model->apellido ?: 'No registrado';
                        },
                    ],
                    [
                        'attribute' => 'correo',
                        'label' => '<i class="fa-solid fa-envelope"></i> Correo electrónico',
                        'format' => 'raw',
                        'value' => static function ($model) {
                            if (empty($model->correo)) {
                                return 'No registrado';
                            }

                            return Html::mailto(
                                Html::encode((string) $model->correo),
                                (string) $model->correo
                            );
                        },
                    ],
                    [
                        'attribute' => 'role',
                        'label' => '<i class="fa-solid fa-user-shield"></i> Rol asignado',
                        'format' => 'raw',
                        'value' => static function ($model) {
                            $role = strtolower(trim((string) $model->role));

                            if ($role === 'admin') {
                                return '<span class="user-role-badge user-role-admin">'
                                    . '<i class="fa-solid fa-user-shield"></i> Administrador'
                                    . '</span>';
                            }

                            if ($role === 'user') {
                                return '<span class="user-role-badge user-role-normal">'
                                    . '<i class="fa-solid fa-user-check"></i> Usuario'
                                    . '</span>';
                            }

                            return Html::encode(
                                $role !== '' ? ucfirst($role) : 'Sin rol'
                            );
                        },
                    ],
                ],
                'template' => '<tr><th>{label}</th><td>{value}</td></tr>',
            ]) ?>

            <?php if ($esAdmin): ?>

                <?php if ((int) Yii::$app->user->id !== (int) $model->id): ?>

                    <div class="user-view-actions">

                        <?= Html::a(
                            '<i class="fa-solid fa-trash-can"></i> Eliminar usuario',
                            ['delete', 'id' => $model->id],
                            [
                                'class' => 'btn-user-delete',
                                'encode' => false,
                                'data' => [
                                    'confirm' => '¿Estás seguro de que deseas eliminar este usuario?',
                                    'method' => 'post',
                                ],
                            ]
                        ) ?>

                    </div>

                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>

</div>
