<?php
use yii\helpers\Html;
use app\models\User;


?>

<div class="container-fluid" >
    <!-- MW: Niet inline stylen, dus de stylen verplaatsen naar de CSS -->
    <div class="row" style="margin-bottom: 100px; ">
        <!-- MW: Niet inline stylen, dus de stylen verplaatsen naar de CSS -->
        <div class="col-12" style="margin-bottom: 25px;">
            <h1>Welkom   <?= $name ?> </h1>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-6" >
            <!-- MW: De knoppen niet inline stylen, dus de stylen verplaatsen naar de CSS -->
            <button class="btn a_btn" style="background-color:#002C4F; width:40%; height:30vh; color:white;">
                <h3><?= Html::a('Users beheren', ['/user']) ?></h3>
            </button>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6">
            <!-- MW: De knoppen niet inline stylen, dus de stylen verplaatsen naar de CSS -->
            <button class="btn a_btn" style="background-color: #EB9200; width:40%; height:30vh; color:white;">
                <h3><?= Html::a('Artikelen beheren', ['/blog']) ?></h3>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>Let op!!! Corona uitbraak Nederland</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet auctor dictum. Nullam et lobortis metus, ac viverra odio. Curabitur eget pulvinar libero, nec auctor lacus. Fusce condimentum velit eget rhoncus efficitur. Sed sagittis lorem nec turpis efficitur, sit amet gravida nulla molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pretium faucibus tortor, quis dictum quam lobortis non. Sed congue, massa et lacinia vulputate, sapien massa eleifend sapien, quis elementum purus enim ultricies arcu. Maecenas magna sem, convallis vel lacinia nec, rhoncus ac mi. Ut sit amet velit velit. Etiam mattis dapibus eros at imperdiet. Praesent cursus, tortor quis vestibulum vestibulum, felis tortor scelerisque lacus, vitae commodo felis turpis eget nunc. Suspendisse a metus ullamcorper, dapibus felis at, venenatis velit. Quisque consectetur hendrerit ullamcorper. Donec vitae porta ante. Donec molestie tellus ut fermentum elementum.</p>
            <p>Aliquam at nibh dolor. Aliquam ut molestie neque. Quisque hendrerit luctus massa, ac gravida urna finibus a. Vestibulum eget imperdiet velit. Curabitur placerat vestibulum libero, ut laoreet dolor aliquet sit amet. Cras molestie eu metus non aliquet. Donec sed tincidunt nunc. Integer euismod magna arcu, nec tempor nisi fringilla et. Morbi nibh nunc, malesuada quis ornare vel, bibendum vitae tortor. In efficitur, ipsum interdum pretium consectetur, eros lorem facilisis quam, a viverra tortor augue et elit. Aliquam at lacus pellentesque, dapibus metus sit amet, vulputate neque. Vivamus aliquet odio ac magna commodo, pellentesque molestie mauris vestibulum. Suspendisse quis varius est. Donec vel dolor tempor, fringilla leo ut, blandit lorem.</p>
        </div>
    </div>

    <div class="row">

    </div>
</div>