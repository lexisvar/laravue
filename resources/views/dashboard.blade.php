@include('partials.head')

@include('partials.header')

@include('partials.sidebar')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->


        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Inicio
            <small>Clientes</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="note note-info">
            @foreach( $clientes as $cliente )
                {{$cliente['nombre']}}
            @endforeach
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
@include('partials.footer');