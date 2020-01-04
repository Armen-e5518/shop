<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidbar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Products', 'icon' => 'file-code-o', 'url' => ['/products']],
                    ['label' => 'Categories', 'icon' => 'file-code-o', 'url' => ['/categories']],
                    ['label' => 'Brend', 'icon' => 'file-code-o', 'url' => ['/brend']],
                    ['label' => 'Checkout', 'icon' => 'file-code-o', 'url' => ['/checkout']],
                    ['label' => 'Socsites', 'icon' => 'file-code-o', 'url' => ['/socsites']],
                    ['label' => 'Product comments', 'icon' => 'file-code-o', 'url' => ['/product-comments']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ],
            ]
        ) ?>

    </section>

</aside>
