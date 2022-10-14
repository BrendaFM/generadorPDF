<!-- página 2 del informe -->
<!-- nuestro reporte no lleva page -->
<page>
    <page_header>
        <p>SENATI - Chincha</p>
    </page_header>
    <page_footer>
        <p>Ingeniería de Software - [[page_cu]]</p>
    </page_footer>

    <ul>
        <?php foreach($programas as $programa): ?>
            <li><?= $programa?></li>
        <?php endforeach?>
    </ul>
</page>