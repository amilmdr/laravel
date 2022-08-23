</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->

<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->

</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
 <!-- plugins:js -->
 <script src="http://laravelpracticeintern.test/assets/vendors/js/vendor.bundle.base.js"></script>
 <!-- endinject -->
 <!-- Plugin js for this page -->
 <script src="http://laravelpracticeintern.test/assets/vendors/chart.js/Chart.min.js"></script>
 <script src="http://laravelpracticeintern.test/assets/vendors/progressbar.js/progressbar.min.js"></script>
 <script src="http://laravelpracticeintern.test/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
 <script src="http://laravelpracticeintern.test/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
 <script src="http://laravelpracticeintern.test/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
 <script src="http://laravelpracticeintern.test/assets/js/jquery.cookie.js" type="text/javascript"></script>
 <!-- End plugin js for this page -->
 <!-- inject:js -->
 <script src="http://laravelpracticeintern.test/assets/js/off-canvas.js"></script>
 <script src="http://laravelpracticeintern.test/assets/js/hoverable-collapse.js"></script>
 <script src="http://laravelpracticeintern.test/assets/js/misc.js"></script>
 <script src="http://laravelpracticeintern.test/assets/js/settings.js"></script>
 <script src="http://laravelpracticeintern.test/assets/js/todolist.js"></script>
 <!-- endinject -->
 <!-- Custom js for this page -->
 <script src="http://laravelpracticeintern.test/assets/js/dashboard.js"></script>
 <!-- End custom js for this page -->
 <script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
<script>
  const slug = document.getElementById('slug');
  const h_slug = document.getElementById('h_slug');

  function create_slug(e) {
      let title = e.value;
      let myReg = new RegExp('^[a-zA-Z0-9_ ]*$');
      let res = myReg.test(e.value);
      let slugger = e.value.toLowerCase().
      replace(/ /g, '-').
      replace(/[^\w-]+/g, '');
      slug.value = slugger;
      h_slug.value = slugger;
  }
</script>
{{-- for delete confromation --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

<script>
  $("document").ready(function(){
    setTimeout(function(){
        $("#message_id").remove();
    }, 5000 );
});
</script>


</body>

</html>