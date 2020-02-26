<?php 
require 'php/conherramientas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
    <link rel="stylesheet" href="css/hamburgers.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="shortcut icon" href="imagenes/icon.png" />
<base href="https://demos.telerik.com/kendo-ui/grid/graphql">
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.1.219/styles/kendo.default-v2.min.css" />
    <script src="https://kendo.cdn.telerik.com/2020.1.219/js/jquery.min.js"></script>   
    <script src="https://kendo.cdn.telerik.com/2020.1.219/js/kendo.all.min.js"></script>
</head>
<body>
  <h1>Productos comprados</h1>
  <button onclick="carrito();" class="btn btn-success">Carrito</button>
<div id="container">

            <div id="grid"></div>
            
            <script>
                $(document).ready(function () {
                    var crudServiceBaseUrl = "https://demos.telerik.com/kendo-ui/service",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read: {
                                    url: crudServiceBaseUrl + "/Products",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/Products/Update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/Products/Destroy",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/Products/Create",
                                    dataType: "jsonp"
                                },
                                parameterMap: function (options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return { models: kendo.stringify(options.models) };
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                model: {
                                    id: "ProductID",
                                    fields: {
                                        ProductID: { editable: false, nullable: true },
                                        ProductName: {
                                            validation: {
                                                required: true,
                                                productnamevalidation: function (input) {
                                                    if (input.is("[name='ProductName']") && input.val() != "") {
                                                        input.attr("data-productnamevalidation-msg", "Product Name should start with capital letter");
                                                        return /^[A-Z]/.test(input.val());
                                                    }

                                                    return true;
                                                }
                                            }
                                        },
                                        UnitPrice: { type: "number", validation: { required: true, min: 1} },
                                        Discontinued: { type: "boolean" },
                                        UnitsInStock: { type: "number", validation: { min: 0, required: true} }
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        height: 550,
                        toolbar: ["create"],
                        columns: [
                            "ProductName",
                            { field: "UnitPrice", title: "Precio$", format: "{0:c}", width: "120px" },
                            { field: "UnitsInStock", title: "Existencia", width: "120px" },
                            { field: "UnitPrice", title: "Total$", width: "120px" },
                            { field: "Discontinued", width: "120px" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "250px"}],
                        editable: "inline"
                    });
                });

            </script>
            <script type="text/javascript">
            function home(){
                header('Location:herramientas.php');
                }
                </script>

        </div>

    
  </div>  
</body>
</html>