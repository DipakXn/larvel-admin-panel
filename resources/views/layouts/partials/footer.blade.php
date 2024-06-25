<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
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
<script src="{{ asset('dashboard-assets/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('dashboard-assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('dashboard-assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/template.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('dashboard-assets/js/dashboard.js') }}"></script>

 <!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>

<!-- End custom js for this page-->
</body>


</html>