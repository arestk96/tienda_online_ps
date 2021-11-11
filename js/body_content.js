function body(site_name, opc){
    var cabezera = header(site_name);
    var pie = footer(opc);
    body = document.getElementById("test")
    body.insertAdjacentHTML( 'afterbegin', cabezera );
    body.insertAdjacentHTML( 'beforeend',  pie);
}

function header(site_name){
    var header = `
    <style>
    .fa-1x {
        font-size: 1em;
        color: black;
    }
    </style>
    <header id="main-header">

        <a id="logo-header" href="https://cafe.softbyte.com.mx/">
            <span class="site-name"><a href="https://cafe.softbyte.com.mx" title="Cafe Rsis"><img data-tf-not-load="1" src="https://cafe.softbyte.com.mx/wp-content/uploads/2020/10/Cafe-Rsis.png" alt="Cafe Rsis" title="Cafe Rsis" width="80" height=""></a></span> </span>
        </a> <!-- / #logo-header -->

        <!-- / nav -->
        <nav style="float: right; font-weight: 200px">
            <ul>
                <li><a class="hide" href="https://cafe.softbyte.com.mx/"> <i class="fas fa-home fa-1x"></i> <span>Home</span> </a></li>
                <li><a class="hide" href="../usuarios/usuario.php"> <i class="far fa-user fa-1x"></i> <span>Usuario</span> </a></li>
                <li><a class="hide1" href="../historial/vista_historial.php"> <i class="fas fa-shopping-cart fa-1x"></i> <span>Historial</span> </a></li>
                <li><a class="" href="../productos/productos.php"> <i class="fas fa-store-alt fa-1x"></i> <span>Shop</span> </a></li>
            </ul>
        </nav>

    </header>`;
    return header;
}

function footer(opc){
    if(opc == 0){
        var footer = `
        <footer id="main-footer">
        <nav style="text-align: center">
        <div id="element-with-background-image">
          <table>
                  <tr>
                    <th>Cafe</th>
                    <th>Horarios de operación</th>
                    <th>Contacto</th>
                  </tr>
                  <tr>
                    <td>Estamos emocionados de</td>
                    <td>Lunes – Viernes: 7AM – 7PM</td>
                    <td>Progreso 1589 Monterrey, N.L. , MX</td>

                  </tr>
                  <tr>
                    <td>compartir la historia </td>
                    <td> Sabado – Domingo: 5PM – 2AM</td>
                    <td>8116759834 ventas@cafe.softbyte.com.mx</td>
                  </tr>
                  <tr>
                    <td>que cada grano puede </td>
                  </tr>
                  <tr>
                    <td>contar. ¡Entra y explora con nosotros!</td>
                  </tr>
          </table>
          <div class="one">Creado y diseñado por SoftByte</div><div class="two"><img src="https://cafe.softbyte.com.mx/wp-content/uploads/2020/02/SB.png" width="40" height="40"></div>
</div>
        </nav>
        </footer>`;
    }else{
        var footer =`
        <footer id="main-footerr">
        <nav style="text-align: center">
        <div id="element-with-background-image">
          <table>
                  <tr>
                    <th>Cafe</th>
                    <th>Horarios de operación</th>
                    <th>Contacto</th>
                  </tr>
                  <tr>
                    <td>Estamos emocionados de</td>
                    <td>Lunes – Viernes: 7AM – 7PM</td>
                    <td>Progreso 1589 Monterrey, N.L. , MX</td>

                  </tr>
                  <tr>
                    <td>compartir la historia </td>
                    <td> Sabado – Domingo: 5PM – 2AM</td>
                    <td>8116759834 ventas@cafe.softbyte.com.mx</td>
                  </tr>
                  <tr>
                    <td>que cada grano puede </td>
                  </tr>
                  <tr>
                    <td>contar. ¡Entra y explora con nosotros!</td>
                  </tr>
          </table>
          <div class="one">Creado y diseñado por SoftByte</div><div class="two"><img src="https://cafe.softbyte.com.mx/wp-content/uploads/2020/02/SB.png" width="40" height="40"></div>
</div>
        </nav>
        </footer>`;
    }
    return footer;
}
