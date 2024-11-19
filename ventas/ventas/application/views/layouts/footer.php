        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> Beta 2.0.0
            </div>
            <strong>&copy;</strong> 
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/template/shortcuts/shortcut.js"></script>
<script src="<?php echo base_url();?>assets/template/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/template/alertifyjs/alertify.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function () {

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    var base_url= "<?php echo base_url();?>";
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //http://localhost/ventas_ci/mantenimiento/productos
                window.location.href = base_url + resp;
            }
        });
    });
    $(".btn-view-producto").on("click", function(){
        var producto = $(this).val(); 
        //alert(cliente);
        var infoproducto = producto.split("*");
        html = "<p><strong>Codigo:  </strong>"+infoproducto[1]+"</p>"
        html += "<p><strong>Nombre:  </strong>"+infoproducto[2]+"</p>"
        html += "<p><strong>Descripcion:  </strong>"+infoproducto[3]+"</p>"
        html += "<p><strong>Precio:  </strong>"+infoproducto[4]+"</p>"
        html += "<p><strong>Stock:  </strong>"+infoproducto[5]+"</p>"
        html += "<p><strong>Categoria:  </strong>"+infoproducto[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });
  
    $(".btn-view-cliente").on("click", function(){
        var cliente = $(this).val(); 
        //alert(cliente);
        var infocliente = cliente.split("*");
        html = "<p><strong>Nombre:</strong>"+infocliente[1]+"</p>"
        html += "<p><strong>Tipo de Cliente:</strong>"+infocliente[2]+"</p>"
        html += "<p><strong>Tipo de Documento:</strong>"+infocliente[3]+"</p>"
        html += "<p><strong>Numero  de Documento:</strong>"+infocliente[4]+"</p>"
        html += "<p><strong>Telefono:</strong>"+infocliente[5]+"</p>"
        html += "<p><strong>Direccion:</strong>"+infocliente[6]+"</p>"
        html += "<p><strong>Telefono:</strong>"+infocliente[7]+"</p>"
        html += "<p><strong>Direccion:</strong>"+infocliente[8]+"</p>"
        $("#modal-clientes .modal-body").html(html);
    });
    $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }
        });

    });
    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "administrador/usuarios/view/",
            type:"POST",
            data:{idusuario:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });
    

 //   $('.sidebar-menu').tree();
 

    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ ",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    $('#example2').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ ",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


//	$('.sidebar-menu').tree();

    $('#tbmove').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ ",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    $('#tbconsolid').DataTable({
        
        language: {
            "lengthMenu": "Mostrar _MENU_ ",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
  //  $('.sidebar-menu').tree();

    $("#comprobantes").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#idcomprobante").val(infocomprobante[0]);
            $("#igv").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
            
        }
        else{
            $("#idcomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }
        sumar();
        
    })

    $(document).on("click",".btn-check",function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
        });


    $("#productinfo").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
               autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock+ "*"+ ui.item.tipo;
            $("#productinfo").val(data);
        },
    });

    $("#productinfo" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto1 = data.split("*");
            html = "<label class='col-md-2 control-label'>Nombre:</label><div class='col-md-3'><input type='text' class='form-control' name='p.name[]' value='"+infoproducto1[2]+"' readonly>";
            html += "</div>";
            html += "<label class='col-md-1 control-label'>Codigo:</label><div class='col-md-2'><input type='text' class='form-control' name='p.code[]' value='"+infoproducto1[1]+"' readonly>";
            html += "<input type='hidden' name='idproduct' value='"+infoproducto1[0]+"'>";
            html += "</div>";
            $("#infoproduct").append(html);
            $("#productinfo").val(null);
    }
    });

     $("#customer").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"tools/consolidar/getcustomer",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
               autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.label+ "*"+ ui.item.dui;
            $("#customer").val(data);
        },
    });

    $("#customer" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='text' name='idcustomer' size='5' value='"+infoproducto[0]+"'readonly></td>";
            html += "<td>"+infoproducto[1]+"</td>";
            html += "<td>"+infoproducto[2]+"</td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbcustomer tbody").append(html);
            $("#customer").val(null);
            $("#customer").val(null);
    
    }
    });

    $("#product").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
               autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock+ "*"+ ui.item.tipo;
            $("#product").val(data);
        },
    });

    $("#product" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='text' name='idproducto' size='6' value='"+infoproducto[0]+"'></td>";
            html += "<td><input type='hidden' name='tproducto[]' value='"+infoproducto[5]+"'>"+infoproducto[2]+"</td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            $("#product").val(null);
            sumar();
            $("#product").val(null);
    
    }
    });

    $("#cotizador").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"movimientos/ventas/getcotizados",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
               autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.public+ "*"+ ui.item.tienda+ "*"+ ui.item.bono+ "*"+ ui.item.colegio+ "*"+ ui.item.stock;
            $("#product").val(data);
        },
    });

    $("#cotizador" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td>"+infoproducto[0]+"</td>";
            html += "<td>"+infoproducto[1]+"</td>";
            html += "<td>"+infoproducto[2]+"</td>";
            html += "<td>"+infoproducto[3]+"</td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td>"+infoproducto[5]+"</td>";
            html += "<td>"+infoproducto[6]+"</td>";
            html += "<td>"+infoproducto[7]+"</td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button> <button type='button' value='"+infoproducto[0]+"' class='btn bg-navy btn-print-barcode'><span class='fa fa-barcode'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            $("#cotizador").val(null);
    }
    });
    
    
    //CLIENTES MODIFICAR DASHBOARD
    
    $("#clientest").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"mantenimiento/clientes/getclientes",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
               autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.nombre;

            $("#clientest").val(data);
        },
    });

    $("#clientest" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td>"+infoproducto[0]+"</td>";
            html += "<td>"+infoproducto[1]+"</td>";
            html += "<td>"+infoproducto[2]+"</td>";

            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button> <button type='button' value='"+infoproducto[0]+"' class='btn bg-navy btn-print-barcode'><span class='fa fa-barcode'></span></button></td>";
            html += "</tr>";
            $("#tbclientes tbody").append(html);
            $("#clientest").val(null);
    }
    });
    
    
    
    //FIN CLIENTES DASHBOARD

    $("#producto").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
	           autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock+ "*"+ ui.item.tipo;
            $("#producto").val(data);
        },
    });

    $("#producto" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
            html += "<td><input type='hidden' name='tproducto[]' value='"+infoproducto[5]+"'>"+infoproducto[2]+"</td>";
            //html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
            html += "<td><input type='text' name='precios[]' size='6' value='"+infoproducto[3]+"' class='precios' readonly></td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td><input type='text' name='cantidades[]' size='4' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            $("#producto").val(null);
            sumar();
            $("#producto").val(null);
	
    }
    });

    //Inicia el llamado a los productos de mayoreo

    $("#producto2").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos2",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
               autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock+ "*"+ ui.item.tipo;
            $("#producto2").val(data);
        },
    });

    $("#producto2" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
            html += "<td><input type='hidden' name='tproducto[]' value='"+infoproducto[5]+"'>"+infoproducto[2]+"</td>";
            //html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
            html += "<td><input type='text' name='precios[]' size='6' value='"+infoproducto[3]+"' class='precios' readonly></td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td><input type='text' name='cantidades[]' size='4' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            $("#producto2").val(null);
            sumar();
            $("#producto2").val(null);
    
    }
    });

   //Finaliza el llamado de los productos de mayoreo 
    //Inicia el llamado a los productos de mayoreo

    $("#producto3").autocomplete({

        source:function(request, response){
            
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos3",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
            },
       //minLength:8,
               autoFocus: true,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock+ "*"+ ui.item.tipo;
            $("#producto3").val(data);
        },
    });

    $("#producto3" ).on( "keyup", function( event ) {
            
            if (event.keyCode == $.ui.keyCode.ENTER) {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
            html += "<td><input type='hidden' name='tproducto[]' value='"+infoproducto[5]+"'>"+infoproducto[2]+"</td>";
            //html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
            html += "<td><input type='text' name='precios[]' size='6' value='"+infoproducto[3]+"' class='precios' readonly></td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td><input type='text' name='cantidades[]' size='4' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            $("#producto3").val(null);
            sumar();
            $("#producto3").val(null);
    
    }
    });

   //Finaliza el llamado de los productos de mayoreo 

    $(document).on("click",".btn-remove-producto", function(){
        $(this).closest("tr").remove();
        sumar();
    });

    $(document).on("click",".btn-updateprice", function(){
        estado();
    });

    $(document).on("keyup"," input.costo", function(){
        costo = $(this).val();
        publico = costo * (1.40);
        tienda = costo * (1.20);
        bono = costo * (1.40);
        colegio = costo * (1.20);
        $("input[name=precio]").val(publico.toFixed(2));
        $("input[name=precio1]").val(tienda.toFixed(2));
        $("input[name=precio2]").val(bono.toFixed(2));
        $("input[name=precio3]").val(colegio.toFixed(2));
    

    });


    $(document).on("keyup","#tbventas input.cantidades", function(){
        cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(2)").children("input").val();
        importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe.toFixed(2));
        sumar();
    });

    $(document).on("keyup","#tbventas input.precios", function(){
        precio = $(this).val();
        cantidad = $(this).closest("tr").find("td:eq(4)").children("input").val();
        importe1 = precio * cantidad;
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe1.toFixed(2));
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe1.toFixed(2));
        sumar();
    });

    function estado() {
        $("#tbventas input.precios").removeAttr("readonly"); 
             
    };


    $(document).on("click",".btn-abrircaja",function(){
        $.ajax({
            url: base_url + "reportes/cajas/open_drawer",
            type:"POST",
            dataType:"html",
            success:function(data, textStatus, jqXHR){
            refresh();   
        }
        });
    });

    $(document).on("click",".btn-refresh",function(){
        refrescar();   
    });


    $(document).on("click",".btn-save_ch",function(){
         $.ajax({                        
           type: "POST",                 
           url: base_url + "mantenimiento/bancos/regcheck",                  
           data:$("#formcheck").serialize(),
           success:function(data, textStatus, jqXHR){
            $("#modal-check").modal('hide');
            $("#modal-default .modal-body").html(data);
           }
         });
    });

    $(document).on("click",".btn-reg_check",function(){
        ch_id = $(this).val();   
        $.ajax({
            url: base_url + "mantenimiento/bancos/add",
            type:"POST",
            dataType:"html",
            data:{id:ch_id},
            success:function(data, textStatus, jqXHR){
            $("#modal-check .modal-body").html(data);
        }
        });
    });


    $(document).on("click",".btn-view-venta1",function(){
        valor_id = $(this).val();   
        $.ajax({
            url: base_url + "reportes/ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data, textStatus, jqXHR){
            $("#modal-default .modal-body").html(data);
        }
        });
    });


 /*   $(document).on("click",".btn-print",function(){
      print1 = $(this).val(); 
      var efectivo = efectivo1;
      $.ajax({
     url: base_url + "movimientos/ventas/impri",
            type:"POST",
            dataType:"html",
            data:{id:print1, efectivo:efectivo},
            success:function(data, textStatus, jqXHR){
            console.log(data);
            swal({
            title: "Completado!",
            text: "",
            icon: "success",
            buttons: false,
            });
            refresh();
            
            }
    });
    }); */

    $(document).on("click",".btn-print-barcode",function(){
      id = $(this).val(); 
      efectivo = prompt("INGRESE", "0.00");
      $.ajax({
      url: base_url + "mantenimiento/productos/printbarcode",
            type:"POST",
            dataType:"html",
            data:{id:id, efectivo:efectivo},
            success:function(data){
            location.reload(true);
            console.log(data);
            }
    });
    });

    $(document).on("click",".btn-view-venta",function(){
        valor_id = $(this).val();
        efectivo1 = prompt("INGRESE EL PAGO", "0.00");
        $.ajax({
            url: base_url + "movimientos/ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id, efectivo:efectivo1},
            success:function(data, textStatus, jqXHR){
            $("#modal-default .modal-body").html(data);
            
        }
        });
    });

    $(document).on("click",".btn-ticket",function(){
      print1 = $(this).val(); 
      var efectivo = efectivo1;
      $.ajax({
     url: base_url + "movimientos/ventas/ticket",
            type:"POST",
            dataType:"html",
            data:{id:print1, efectivo:efectivo},
            success:function(data, textStatus, jqXHR){
            console.log(data);
            swal({
            title: "Completado!",
            text: "Cobro Realizado",
            icon: "success",
            buttons: false,
            });
            refresh();
            
            }
    });
    });

     $(document).on("click",".btn-print-fact1",function(){
      print2 = $(this).val(); 
      $.ajax({
     url: base_url + "movimientos/ventas/fact1",
       type:"POST",
            dataType:"html",
            data:{id:print2},
            success:function(data){
            location.reload(true);
            console.log(data);
            }
    });
    });

    $(document).on("click",".btn-print-fact2",function(){
      print3 = $(this).val();   
        $.ajax({
     url: base_url + "movimientos/ventas/fact2",
       type:"POST",
            dataType:"html",
            data:{id:print3},
            success:function(data){
            location.reload(true);
            console.log(data);
            }
    });
    });
    });

    $(document).on("click",".btn-sum-mov",function(){
      suma_utilidad();   
       
    });
    

function generarnumero(numero){
    if (numero>= 99999 && numero< 999999) {
        return Number(numero)+1;
    }
    if (numero>= 9999 && numero< 99999) {
        return "0" + (Number(numero)+1);
    }
    if (numero>= 999 && numero< 9999) {
        return "00" + (Number(numero)+1);
    }
    if (numero>= 99 && numero< 999) {
        return "000" + (Number(numero)+1);
    }
    if (numero>= 9 && numero< 99) {
        return "0000" + (Number(numero)+1);
    }
    if (numero < 9 ){
        return "00000" + (Number(numero)+1);
    }
}

function refresh() {

    setTimeout(function () {
        location.reload()
    }, 800);
}

function refrescar() {

    setTimeout(function () {
        location.reload()
    }, 100);
}


function sumar(){
    subtotal = 0;
    $("#tbventas tbody tr").each(function(){
    subtotal = subtotal + Number($(this).find("td:eq(5)").text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    porcentaje = $("#igv").val();
    igv = subtotal * (porcentaje/100);
    $("input[name=igv]").val(igv.toFixed(2));
    descuento = $("input[name=descuento]").val();
    total = subtotal + igv - descuento;
    $("input[name=total]").val(total.toFixed(2));
    }

$(document).on("click",".btn-ctotal",function(){
      ctotal();   
       
    });

function ctotal(){
    subtotal = 0;
    $("#tbconsolid tbody tr").each(function(){
    subtotal = subtotal + Number($(this).find("td:eq(4)").text());
    });
    $("input[name=ctotal]").val(subtotal.toFixed(2));
    }

function generarprecios(cost){
    cost = costo;
    publico = costo * (1.40);
    tienda = costo * (1.20);
    bono = costo * (1.40);
    colegio = costo * (1.20);
    $("input[name=precio]").val(publico.toFixed(2));
    $("input[name=precio1]").val(tienda.toFixed(2));
    $("input[name=precio2]").val(bono.toFixed(2));
    $("input[name=precio3]").val(colegio.toFixed(2));
    }

function suma_utilidad(){
    t_costo = 0;
    t_cant = 0;
    t_venta = 0;
    $("#utility tbody tr").each(function(){
    t_venta = t_venta + Number($(this).find("td:eq(3)").text());
    });
    $("#utility tbody tr").each(function(){
    t_cant = t_cant + Number($(this).find("td:eq(2)").text());
    });
    costo = $("input[name=costo]").val();
    tcosto = t_cant * costo;
    ubruta = t_venta - tcosto; 
    $("input[name=vendido]").val(t_venta.toFixed(2));
    $("input[name=tcant]").val(t_cant.toFixed());
    $("input[name=costos]").val(tcosto.toFixed(2));
    $("input[name=bruta]").val(ubruta.toFixed(2));    
    } 

let buys = document.getElementById('tbconsolid');
let cboxAll = buys.querySelector('thead input[type="checkbox"]');
let cboxes = buys.querySelectorAll('tbody input[type="checkbox"]');
let totalOutput = document.getElementById('ctotal');
let total1 = 0;

[].forEach.call(cboxes, function (cbox) {
  cbox.addEventListener('change', handleRowSelect);
});

cboxAll.addEventListener('change', function () {
  [].forEach.call(cboxes, function (cbox) {
    //cbox.checked = cboxAll.checked;
    cbox.click();
  });
});

function handleRowSelect (e) {
  let row = e.target.parentNode.parentNode;
  let qty = row.querySelector('td:nth-child(2)').textContent;
  let price = row.querySelector('td:nth-child(4)').textContent;
  let cost = Number(qty) * Number(price);
  
  if (e.target.checked) {
    total1 += cost;
  } else {
    total1 -= cost;
  }
  
  total1 = Number(total1.toFixed(2));
  totalOutput.value = total1.toFixed(2);
}

</script>
</body>
</html>
