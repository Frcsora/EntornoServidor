
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style=" display:flex;width:100vw;justify-content: space-around">
@forelse($productos as $producto)
    <x-producto-card :name="$producto['nombre']" :price="$producto['precio']" :description="$producto['descripcion']"/>
@empty
<h1>No hay productos que mostrar</h1>
@endforelse


</body>
</html>
