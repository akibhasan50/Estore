<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
    
   
            
            <tr class="heading">
                <td>
                    Billing Address
                </td>
                <td>
                   Details
                </td>
                
            </tr>
            
            <tr class="item">
                <td>
                    Name
                </td>
                
                <td>
                   {{$orderinfo->user->name}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Email
                </td>
                
                <td>
                   {{$orderinfo->user->email}}
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                   Phone:
                </td>
                
                <td>
                   {{$orderinfo->user->phone}}
                </td>
            </tr>

             <tr class="heading">
                <td>
                   shipping Address
                </td>
                <td>
                   Details
                </td>
                
            </tr>
            
            <tr class="item">
                <td>
                    Name
                </td>
                
                <td>
                   {{$orderinfo->customer_name}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Email
                </td>
                
                <td>
                   {{$orderinfo->customer_email}}
                </td>
            </tr>
            
            <tr class="item ">
                <td>
                   Address
                </td>
                
                <td>
                    {{$orderinfo->shipping_address}}
                </td>
            </tr>
            <tr class="item ">
                <td>
                   City
                </td>
                
                <td>
                    {{$orderinfo->city}}
                </td>
            </tr>
            <tr class="item last">
                <td>
                   Zip
                </td>
                
                <td>
                    {{$orderinfo->zip}}
                </td>
            </tr>


            <tr class="heading">
                <td>
                   Product name
                </td>
                <td>
                   Product id
                </td>
                <td>
                   Quantity
                </td>
                <td>
                  Total
                </td>
                
            </tr>
             @foreach ($prodinfo as $product)
            <tr class="item">
           
                <td><span>{{$product->product_name}}</span></td>
                  <td ><span>{{$product->product_id}}</span></td>
                  <td>{{$product->quantity}}</td>
                  <td> <span>${{$product->price}}</span></td>
            </tr>
              @endforeach
            
        </table>
    </div>
</body>
</html>