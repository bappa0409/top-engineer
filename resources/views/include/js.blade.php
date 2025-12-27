
<!--begin::Jquery-->
<script src="{{asset('assets/admin/plugins/jquery/jquery-3.6.3.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.js') }}"></script>
<!--end::Jquery-->

<!--begin::Datatables-->
<script src="{{asset('assets/admin/plugins/datatables/datatables.js')}}"></script>
<!--end::Datatables-->

<!--begin::Select2 & Sweet Alert-->
<script src="{{asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.js')}}"></script>
<!--end::Select2 & Sweet Alert-->

<!--Start Date Time Picker With Moment-->
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!--End Date Time Picker-->

<script src="{{asset('assets/admin/js/app.js')}}?v_{{date("h_i")}}"></script>


<!--begin::Custom-->
<script src="{{asset('assets/admin/js/custom.js')}}?v_{{date("h_i")}}"></script>
<!--end::Custom-->