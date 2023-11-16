<footer class="main-footer">
         <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
         </div>
         <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
         reserved.
      </footer>
   </div>
   <script src="/PhamQuocDuy_2122110045/public/jquery/jquery-3.7.0.min.js"></script>
   <script src="/PhamQuocDuy_2122110045/public/datatables/js/dataTables.min.js"></script>
   <script src="/PhamQuocDuy_2122110045/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="/PhamQuocDuy_2122110045/public/dist/js/adminlte.min.js"></script>
   <script src="/PhamQuocDuy_2122110045/public/dist/js/phamquocduy_2122110045.js"></script>
   <script>
      $(document).ready(function () {
         $('#mytable').DataTable();
      });
   </script>
   <script>
        var count = 3;

        function updateCountdown() {
            document.getElementById("countdown").innerHTML = count;
        }

        function countdown() {
            updateCountdown();
            if (count > 0) {
                count--;
                setTimeout(countdown, 1000);
            } else {
                window.location.href = "index.php";
            }
        }

        countdown();
    </script>
   </body>

</html>