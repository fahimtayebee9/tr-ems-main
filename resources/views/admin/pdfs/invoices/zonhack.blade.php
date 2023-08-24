<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zonhack HTML</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet"> --}}
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        @font-face {
            font-family: "Lily-Script-One";
            src: url({{ public_path('/storage/uploads/fonts/LilyScriptOne-Regular.ttf') }}) format("truetype");
        }
    </style>
</head>
<body style="margin: 0!important; padding: 0!important;">
    <table style="border-collapse: collapse;width: 100%; padding-top: 40px;">
        <tr>
            <td width="100px" style="position: relative; width: 80px;">
                <div class="invoice-number-container" style="position: absolute;
                        width: 300px;
                        font-size: 24px;
                        font-family: {{$pdfTheme->font_family}};
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%) rotate(-90deg);
                        display: block;
                        margin: 0;
                        text-align: center;">
                    <h2 style="font-size: 24px;">
                        INVOICE 
                        <span style="font-size: 24px;font-weight: 700;color: {{ $pdfTheme->theme_color}};">
                            #{{$invoice->invoice_number}}
                        </span>
                    </h2>
                </div>
            </td>
            <td>
                <table style="border-collapse: collapse;width: 100%; margin-bottom: 50px; padding-right: 35px;">
                    <tr>
                        <td style="text-align: left;">
                            @if ($pdfTheme->slug == 'zonhack')
                                <p class="inv-info company-name" style="font-size: 34px;color: {{$pdfTheme->theme_color}};font-weight: 700;">ZonHack</p>
                                <p class="inv-info company-address" style="font-size: {{$pdfTheme->font_size}};
                                        font-family: {{$pdfTheme->font_family}};
                                        margin: 0;
                                        margin-bottom: 5px;">Dhaka, Bangladesh</p>
                                <p class="inv-info company-email">info@zonhack.com</p>
                            @elseif ($pdfTheme->slug == 'nudawn')
                                <p class="inv-info company-name" style="font-size: 34px;color: {{$pdfTheme->theme_color}};font-weight: 700;">NuDawn</p>
                                <p class="inv-info company-address">Dhaka, Bangladesh</p>
                                <p class="inv-info company-email">info@nudawn.com</p>
                            @elseif ($pdfTheme->name == 'Tech Rajshahi')
                                <p class="inv-info company-name">Tech Rajshahi</p>
                                <p class="inv-info company-address">Dhaka, Bangladesh</p>
                                <p class="inv-info company-email">info@techrajshahi.com</p>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            @if ($pdfTheme->slug == 'zonhack')
                                <img src="https://zonhack.com/wp-content/uploads/2021/04/Zonhack-Logo-1.png" alt="Zonhack Logo" 
                                    style="width: 240px;">
                            @elseif ($pdfTheme->slug == 'nudawn')
                                <img src="https://nudawnecommerce.com/wp-content/uploads/2021/12/horizontal-logo-and-nu-dawn-1.webp" alt="NuDawn Logo" 
                                    style="width: 240px;">
                            @elseif ($pdfTheme->slug == 'tech-rajshahi')
                                <img src="https://techrajshahi.com/wp-content/uploads/2021/04/Tech-Rajshahi-Logo-1.png" alt="Tech Rajshahi Logo" 
                                    style="width: 240px;">
                            @endif
                        </td>
                    </tr>
                </table>

                <table style="border-collapse: collapse;width: 100%; margin-bottom: 35px; padding-right: 35px;">
                    <tr>
                        <td>
                            <h4 style="display: inline-block; font-size: 18px;margin: 0; margin-bottom: 5px; font-family: {{$pdfTheme->font_family}}; 
                                padding-bottom: 5px; border-bottom: 1px solid {{$pdfTheme->font_color}};">Bill TO,</h4>
                            <p style="font-size: 16px;margin: 0; margin-bottom: 5px; font-family: {{$pdfTheme->font_family}};" class="company-name">
                                {{$invoice->clientInfo->account_name}}
                            </p>
                            <p style="font-size: 16px;margin: 0; margin-bottom: 5px; font-family: {{$pdfTheme->font_family}};" class="company-owner">
                                Attention: {{ $invoice->client_name }}
                            </p>
                            <p style="font-size: 16px;margin: 0; margin-bottom: 5px; font-family: {{$pdfTheme->font_family}};" class="company-address">
                                Address: {{ $invoice->client_address }}
                            </p>
                            <p style="font-size: 16px;margin: 0; margin-bottom: 5px; font-family: {{$pdfTheme->font_family}};" class="company-phone">
                                Phone: {{ $invoice->client_phone }}
                            </p>
                            <p style="font-size: 16px;margin: 0; margin-bottom: 5px; font-family: {{$pdfTheme->font_family}};" class="company-email">
                                Email: {{ $invoice->client_email }}
                            </p>
                        </td>
                        <td>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="margin-bottom: 15px; font-size: 18px;font-family: {{$pdfTheme->font_family}}; font-weight: 600;">Invoice Date</td>
                                    <td style="font-size: 18px;font-family: {{$pdfTheme->font_family}}; font-weight: 600; margin: 0;">:</td>
                                    <td style="font-size: 18px;font-family: {{$pdfTheme->font_family}}; font-weight: 600; margin: 0;">
                                        {{ date('d/m/Y', strtotime($invoice->invoice_date)) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 18px;font-family: {{$pdfTheme->font_family}}; font-weight: 600;">Due Date:</td>
                                    <td style="font-size: 18px;font-family: {{$pdfTheme->font_family}}; font-weight: 600; margin: 0;">:</td>
                                    <td style="font-size: 18px;font-family: {{$pdfTheme->font_family}}; font-weight: 600; margin: 0;">
                                        {{ date('d/m/Y', strtotime($invoice->due_date)) }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <table style="border-collapse: collapse;width: 100%; margin-bottom: 50px; padding-right: 35px;">
                    <tr>
                        <td colspan="2">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr>
                                        <th style="color: #fff;padding: 10px 15px;background-color: {{$pdfTheme->theme_color}}; font-size: 18px; font-family: {{$pdfTheme->font_family}}; font-weight: 600; text-align: left;" width="5%">#</th>
                                        <th style="color: #fff;padding: 10px 15px;background-color: {{$pdfTheme->theme_color}}; font-size: 18px; font-family: {{$pdfTheme->font_family}}; font-weight: 600; text-align: left;" width="45%">Item</th>
                                        <th style="color: #fff;padding: 10px 15px;background-color: {{$pdfTheme->theme_color}}; font-size: 18px; font-family: {{$pdfTheme->font_family}}; font-weight: 600; text-align: center;" width="10%">Quantity</th>
                                        <th style="color: #fff;padding: 10px 15px;background-color: {{$pdfTheme->theme_color}}; font-size: 18px; font-family: {{$pdfTheme->font_family}}; font-weight: 600; text-align: right;" width="20%">Price</th>
                                        <th style="color: #fff;padding: 10px 15px;background-color: {{$pdfTheme->theme_color}}; font-size: 18px; font-family: {{$pdfTheme->font_family}}; font-weight: 600; text-align: right;" width="20%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->invoiceItems as $item)
                                    <tr>
                                        <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: left;" width="5%">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: left;" width="35%">
                                            {{ $item->item_name }}
                                            <br>
                                            <small style="font-size: 14px; font-family: {{$pdfTheme->font_family}};">{{ $item->item_description }}</small>
                                        </td>
                                        <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: center;" width="10%">
                                            {{ $item->quantity }}
                                        </td>
                                        <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="25%">
                                            ${{ $item->unit_price }}
                                        </td>
                                        <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="25%">
                                            ${{ $item->total }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <h1 style="font-family: Lily-Script-One; font-size: 48px; color: {{$pdfTheme->theme_color}};">
                                                Thank You
                                            </h1>
                                        </td>
                                        <td colspan="3">
                                            <table style="width: 100%; padding: 0px; margin: 0px;">
                                                <tr>
                                                    <td style="text-align: right;">SUBTOTAL</td>
                                                    <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="15%">
                                                        ${{ $invoice->total_payable }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">DISCOUNT</td>
                                                    <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="15%">
                                                        ${{ $invoice->discount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">SUBTOTAL (WITHOUT DISCOUNT)</td>
                                                    <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="15%">
                                                        ${{ $invoice->total_payable - $invoice->discount }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">ADVANCED DEPOSIT</td>
                                                    <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="15%">
                                                        ${{ ($invoice->advanced_payment == null) ? 0 : $invoice->advanced_payment }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">TAX</td>
                                                    <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="15%">
                                                        ${{ $invoice->tax }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">SHIPPING/HANDLING</td>
                                                    <td style="border-bottom: 1px solid {{$pdfTheme->font_color}}; padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="15%">
                                                        ${{ $invoice->shipping }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; border-top: 1px solid {{$pdfTheme->font_color}};">TOTAL</td>
                                                    <td style="border-top: 1px solid {{$pdfTheme->font_color}};padding: 8px 15px; font-size: {{$pdfTheme->font_size}}; font-family: {{$pdfTheme->font_family}}; text-align: right;" width="15%">
                                                        ${{ $invoice->total_payable - $invoice->discount + $invoice->tax + $invoice->shipping - $invoice->advanced_payment }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                </table>

                <table style="border-collapse: collapse;width: 100%; padding-right: 35px;">
                    <tr>
                        <td>
                            <h3>Payment Method</h3>
                            <p>Bank Transfer</p>
                        </td>
                        <td>
                            <h3>Notes</h3>
                            <p>Thank you for your business!</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>