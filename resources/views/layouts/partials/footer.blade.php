<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright © 2024 All Rights Reserved</p>
			</div>
		</div> <!--**********************************
            Footer end
        ***********************************-->
	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->

    @yield('scripts')
    
	<!-- Required vendors -->
	<script> var enableSupportButton = '1'</script>
	<script> var asset_url = 'assets/'</script>

	<script src="{{ asset('assets/vendor/global/global.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}" type="text/javascript"></script>
    // <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="https://dompet.dexignlab.com/xhtml/page-error-404.html" type="text/javascript"></script>
    <!-- <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}" type="text/javascript"></script> -->
	<script src="{{ asset('assets/vendor/chart-js/chart.bundle.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/wnumb/wNumb.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/dlabnav-init.js') }}" type="text/javascript"></script>

    <script>
    $(document).ready(function() {
        $('.logout-link').on('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });
    });
</script>

	 <!-- jQuery -->
	 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

<script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                paging: true,
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                searching: true,
                ordering: true,
                info: true,
                
                dom: 'B<"row"<"col-sm-6"l><"col-sm-6"f>>rtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ],
                
                language: {
                    search: "Search in table:",
                    lengthMenu: "Show _MENU_ entries",
                    zeroRecords: "No matching records found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        });
    </script>




@notifyJs

</body>

</html>