@php

$invoice = DB::table('invoices')->first();
$company = DB::table('companies')->first();

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
        .invoice-box {
		  background-color: #fff;
		  color: #2a2a2a;
		  font-size: 16px;
		  height: auto;
		  line-height: 24px;
		  margin: 0 auto;
		  max-width: 21.5cm;
		}

		.invoice-box table {
		  width: 100%;
		  line-height: inherit;
		  text-align: left;
		}

		.items-table td {
		  padding: 5px;
		  vertical-align: top;
		  border-bottom: 1px solid #eee;
		}

		.items-table th {
		  padding: 5px;
		  background: #eee;
		  border-bottom: 1px solid #ddd;
		  font-weight: bold;
		}

		.items-table .total {
		  border-top: 2px solid #eee;
		  font-weight: bold;
		  text-align: right;
		}

		.w-50 {
		  width: 50%;
		}

		.mt {
		  margin-top: 1cm;
		}

		.bold {
		  font-weight: bold;
		}

		.text-right {
		  text-align: right;
		}

		.text-center {
		  text-align: center;
		}

		.options {
		  padding: 1rem 0;
		  text-align: center;
		}

		.button {
		  border: none;
		  color: #fff;
		  padding: 0.5rem;
		  border-radius: 5px;
		  background-color: #6abe84;
		  text-decoration: none;
		  font-size: 1rem;
		  display: inline-block;
		}

		.button:hover {
		  cursor: pointer;
		}

		@media print {
		  .invoice-box {
		    margin: 0;
		    padding: 0;
		  }

		  .options {
		    display: none;
		  }
		}
		@page {
		  margin: 0.8cm;
		}
    </style>
    
    <title>Purchases | SISFARMACY</title>

</head>
<body>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td class="w-50">
                    {{-- DATOS DE LA EMPRESA --}}
					<img src="{{ url('upload/settings_image/'.$invoice->invoice_logo) }}" alt="">
                </td>

                <td class="text-right">
                    <div><span class="bold">INVOICE</span> {{ $detailsData['0']['purchases']['purchases_reference_number']  }}</div>
                    <div><span class="bold">Date</span>: {{ $detailsData['0']['purchases']['purchases_date_purchase']  }}</div>
                    <div><span class="bold">Status</span>: {{ $detailsData['0']['purchases']['purchases_status']  }}</div>
                </td>
            </tr>
        </table>

        {{-- company information --}}
        <table class="mt" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <div>{{ $company->name }}</div>
                    <div>{{ $company->address }}</div>
                    <div>{{ $company->email }}</div>
                    <div>Phone: {{ $company->phone }}</div>
                </td>
            </tr>
        </table>

        {{-- supplier information --}}
        <div class="mt">
        	<h3>Invoice to:</h3>
            <div><span class="bold">Name:</span> {{ $detailData->suppliers->supplier_name }}</div>
            <div><span class="bold">Identification:</span> {{ $detailData->suppliers->supplier_identification }}</div>
            <div><span class="bold">Name Company:</span> {{ $detailData->suppliers->supplier_name_company }}</div>
            <div><span class="bold">Addres:</span> {{ $detailData->suppliers->supplier_address }}</div>
            <div><span class="bold">Phone:</span> {{ $detailData->suppliers->supplier_phone }}</div>
            <div><span class="bold">Email:</span> {{ $detailData->suppliers->supplier_email }}</div>
        </div>

        {{-- invoice items --}}
        <table class="items-table mt" cellpadding="0" cellspacing="0">
            
            <thead>
                <tr class="heading">
                    <th>Description</th>
                    <th class="text-right">Unit Cost</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>

            @foreach ($detailsData as $key => $detail)

				<tr class="item">
	                <td>{{ $detail['product']['product_name'] }}</td>
	                <td class="text-right">$ {{ number_format($detail->price) }}</td>
	                <td class="text-center">{{ $detail->quantity }}</td>
	                <td class="text-right">$ {{ number_format($detail->price*$detail->quantity) }}</td>
	           	</tr> 

			@endforeach

			@php

			$tax = $detailsData['0']['purchases']['purchases_total'] * $detailsData['0']['purchases']['purchases_tax']/100;

			$total = $detailsData['0']['purchases']['purchases_total'] + $tax;

			$discount = $total * $detailsData['0']['purchases']['purchases_discount']/100;

			@endphp

           	<tr class="total">
	            <td colspan="3">Total: </td>
	            <td colspan="1">$ {{ number_format($detailsData['0']['purchases']['purchases_total']) }}</td>
            </tr>
            <tr class="total">
	            <td colspan="3">Tax: ({{ $detailsData['0']['purchases']['purchases_tax'] }}%)</td>
	            <td colspan="1">$ {{ number_format($tax) }}</td>
            </tr>
            <tr class="total">
	            <td colspan="3">Discount: (%)</td>
	            <td colspan="1">$ {{ number_format($discount) }}</td>
            </tr>
            <tr class="total">
	            <td colspan="3">Grand Total:</td>
	            <td colspan="1" style="color: red">$ {{ number_format($detailsData['0']['purchases']['purchases_grand_total']) }}</td>
            </tr>

        </table>

        <table class="mt">
            <tr>

                <td class="w-50">
                	<p class="bold">Additional Note</p>
                    {{ $detailsData['0']['purchases']['purchases_additional_notes'] }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>