 <!-- Bootstrap JS -->
 <script src="{{ url('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>
 <!--plugins-->
 <script src="{{ url('dashboard/assets/js/jquery.min.js') }}"></script>
 <script src="{{ url('dashboard/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
 <script src="{{ url('dashboard/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
 <script src="{{ url('dashboard/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
 <script src="{{ url('dashboard/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
 <script src="{{ url('dashboard/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
 <script src="{{ url('dashboard/assets/plugins/chartjs/js/chart.js') }}"></script>
 <script src="{{ url('dashboard/assets/js/index.js') }}"></script>
 <!--app JS-->
 <script src="{{ url('dashboard/assets/js/app.js') }}"></script>
 <script>
     new PerfectScrollbar(".app-container")
 </script>



 <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
 <script src="https://cdn.ckeditor.com/4.16.0/standard-all/plugins/justify/plugin.js"></script>
 <script src="{{ url('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ url('dashboard/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ url('dashboard/assets/js/confirm-popup.js') }}"></script>


 <script>
     var editors = document.getElementsByClassName("ckeditor");
     for (var i = 0; i < editors.length; i++) {
         CKEDITOR.replace(editors[i], {
             extraPlugins: 'justify'
         });
     }
 </script>
@include('dashboard.partials.alert')
 @stack('script')
