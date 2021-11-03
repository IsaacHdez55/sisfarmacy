<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">

@php

$invoice = DB::table('invoices')->first();
$location = DB::table('locations')->first();

@endphp

<title>SISFARMACY | PRODUCT PDF</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }

    .gray {
        background-color: lightgray
    }

    tr:nth-child(even) {
      background-color: #D6EEEE;
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('backend/img/logo.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>SISFARMACY</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <h3 align="center">LIST OF PRODUCTS</h3>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Code</th>
        <th>Name</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Unit</th>
        <th>Stock</th>
        <th>Sales</th>
        <th>Rack</th>
        <th>Row</th>
        <th>Position</th>
        <th>Purchase Price</th>
        <th>Selling Price</th>
        <th>Expiry Date</th>
      </tr>
    </thead>
    <tbody>
      
      	@foreach ($allData as $key => $product)
        <tr>
      		<th scope="row">{{ $key+1 }}</th>
	        <td align="center">{{ $invoice->prefix }}-{{ $product->product_code }}</td>
	        <td align="center">{{ $product->product_name }}</td>
	        <td align="center">{{ $product->category->category_name}}</td>
	        <td align="center">{{ $product->brand->brand_name }}</td>
	        <td align="center">{{ $product->unit->units_name }}</td>
	        <td align="center">{{ $product->product_stock }}</td>
	        <td align="center">{{ $product->product_sales }}</td>
	        <td align="center">{{ $product->product_rack }}</td>
	        <td align="center">{{ $product->product_row }}</td>
	        <td align="center">{{ $product->product_position }}</td>
	        <td align="center">{{ $location->currency_symbol }}{{ $product->product_purchase_price }}</td>
	        <td align="center">{{ $location->currency_symbol }}{{ $product->product_selling_price }}</td>
	        <td align="center">{{ $product->product_expiration }}</td>
        </tr>
      	@endforeach        
      
    </tbody>
  </table>

</body>
</html>