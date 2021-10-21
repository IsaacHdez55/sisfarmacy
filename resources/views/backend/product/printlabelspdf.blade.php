

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>PRODUCT PDF | SISFARMACY</title>

</head>
<body>

	@foreach ($datos['cantity'] as $key => $dato )

	<h1>{{ $dato }}</h1>

	@foreach ($datos['product_id'] as $key => $product)

	@php

		$product = DB::table('products')->where('id',$product)->first();

	@endphp

		{{ $product->product_name }}
		
	@endforeach
		
	@endforeach

	



</body>
</html>