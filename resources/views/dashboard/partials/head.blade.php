<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ url('dashboard/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ url('dashboard/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ url('dashboard/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ url('dashboard/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ url('dashboard/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ url('dashboard/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ url('dashboard/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ url('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ url('dashboard/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/header-colors.css') }}" />
    <link href="{{ url('dashboard/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/confirm-popup.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.26/sweetalert2.css" integrity="sha512-eRBMRR/qeSlGYAb6a7UVwNFgXHRXa62u20w4veTi9suM2AkgkJpjcU5J8UVcoRCw0MS096e3n716Qe9Bf14EyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    @stack('style')
    <style>
        .error-validation{
            color: #f00;
            font-size:13px;
            margin-top: 5px;

        }
        .error-input{
            border:1px solid #f00;
        }
        .swal2-confirm {
            margin-left:10px !important;
        }
    </style>
    <title>{{ __('translation.Delivery Express') }}</title>
</head>
