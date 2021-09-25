<?php
    $menuItems =
        [
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],

                     [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'User / Group',
                        'icon' => 'users',
                        'url' => '#',
                        'id' => 'user-group',
                        'items' => [
                    ['label' => 'App. Route', 'icon' => 'routes', 'url' => ['/route/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' => 'account-multiple', 'url' => ['/role/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => 'account-plus', 'url' => ['/user/'], 'visible' => !Yii::$app->user->isGuest],
                   ], ],

                ];


if (!Yii::$app->user->isGuest) {
    if (Yii::$app->user->identity->username !== 'admin') {
        $menuItems = Mimin::filterMenu($menuItems);
    }
}
?>   
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
  <li class="nav-item nav-profile">
    <a href="#" class="nav-link">
      <div class="nav-profile-image">
        <span class="login-status online"></span>
        <!--change to offline or busy as needed-->
      </div>
      <div class="nav-profile-text d-flex flex-column">
        <span class="font-weight-bold mb-2"><?=Yii::$app->user->identity->username?></span>
      </div>
      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
  </li>
  
  <?php echo app\widgets\Menu::widget(
    [
                'items' => $menuItems,
            ]

            //Menus::menuItems()
); ?>
</ul>
</nav>
