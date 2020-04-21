<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li
<?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>
                <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>
            </li>
            <li class="header">Основа</li>
            <li <?=($_SERVER['PHP_SELF']=='/list-stanok.php')?'class="active"':'';?>>
                <a href="list-stanok.php"><i class="fa fa-users"></i><span>Станки</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-nakladnaya.php')?'class="active"':'';?>>
                <a href="list-nakladnaya.php"><i class="fa fa-users"></i><span>Накладная</span></a>
            </li>
        </ul>
    </section>
</aside>