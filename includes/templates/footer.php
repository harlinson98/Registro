<footer class="site-footer">
  <div class="contenedor clearfix">
    <div class="footer-informacion">
      <h3>sobre <span> Conferencia</span> </h3>
      <p>En los mercados de valores, el trading instrumentos financieros con el objetivo de obtener un beneficio.      </p>
    </div>
    <div class="ultimas-tweets">
        <h3>Ultimos<span>Tweets</span> </h3>
        <ul>
          <li>En los mercados de valores, el trading instrumentos financieros con el objetivo de obtener un beneficio.</li>
          <li>En los mercados de valores, el trading instrumentos financieros con el objetivo de obtener un beneficio.</li>
          <li>En los mercados de valores, el trading instrumentos financieros con el objetivo de obtener un beneficio.</li>
        </ul>

    </div>
    <div class="menu">
        <h3>Redes<span>sociales</span> </h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-telegram"></i></a>
        </nav>
    </div>
  </div>
  <p class="copyright">Todos los derechos Reservados TRADINGSHOW 2019</p>
</footer>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>

  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina= str_replace(".php", "", $archivo);
       if($pagina == 'invitados' || $pagina == 'index'){
       echo '<script src="js/jquery.colorbox-min.js"></script>';
     }else if($pagina == 'conferencia'){
       echo '<script src="js/lightbox.js"></script>';
     }
  ?>


  
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us18.list-manage.com","uuid":"a2d3f4ca7772b6a779624c4ce","lid":"d966c6537b","uniqueMethods":true}) })</script>
</body>

</html>
